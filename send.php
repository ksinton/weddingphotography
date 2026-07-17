<?php
// ─── Contact form handler ─────────────────────────────────────────────────────
// Receives the inquiry form from contact.php, filters spam, and emails Kim.

// Only accept POST submissions.
if (($_SERVER['REQUEST_METHOD'] ?? '') !== 'POST') {
    header('Location: contact.php');
    exit;
}

// ── Spam trap: honeypot ──
// The "website" field is hidden from real users. If it's filled, it's a bot.
// Pretend success so the bot moves on, but send nothing.
if (!empty($_POST['website'])) {
    header('Location: thank-you.php');
    exit;
}

// ── Collect + trim input ──
$name     = trim($_POST['name'] ?? '');
$email    = trim($_POST['email'] ?? '');
$date     = trim($_POST['date'] ?? '');
$location = trim($_POST['location'] ?? '');
$message  = trim($_POST['message'] ?? '');

// ── Server-side validation ──
$valid = true;
if ($name === '')                                                $valid = false;
if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) $valid = false;
if ($message === '')                                             $valid = false;
// Header-injection guard: reject newlines in the fields used in headers.
if (preg_match('/[\r\n]/', $name . $email))                      $valid = false;

if (!$valid) {
    header('Location: contact.php?error=1');
    exit;
}

// ── Build the email ──
$to      = 'kimsinton@gmail.com';
$subject = 'New wedding inquiry from ' . $name;

$body  = "You have a new inquiry from your website:\n\n";
$body .= "Name:            " . $name . "\n";
$body .= "Email:           " . $email . "\n";
$body .= "Event date:      " . ($date !== ''     ? $date     : 'Not provided') . "\n";
$body .= "Location/venue:  " . ($location !== '' ? $location : 'Not provided') . "\n\n";
$body .= "Message:\n" . $message . "\n";

// The From address must be on the SAME domain the site is served from, or the
// host's mail server (and Gmail) may reject or spam-file it. We build it from the
// current host so it works on ksinton.pairserver.com now and kimsinton.com later.
$host = preg_replace('/^www\./', '', $_SERVER['HTTP_HOST'] ?? 'localhost');
$from = 'noreply@' . $host;

$headers  = 'From: Kim Sinton Website <' . $from . ">\r\n";
$headers .= 'Reply-To: ' . $email . "\r\n";
$headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
$headers .= 'X-Mailer: PHP/' . phpversion();

// The 5th arg sets the envelope sender (Return-Path), which improves deliverability.
$sent = @mail($to, $subject, $body, $headers, '-f' . $from);

// Log the outcome to the server error log for troubleshooting.
error_log('[contact-form] mail() to ' . $to . ' from ' . $from . ' returned ' . var_export($sent, true));

if ($sent) {
    header('Location: thank-you.php');
    exit;
}

// mail() failed on the server.
header('Location: contact.php?error=send');
exit;
