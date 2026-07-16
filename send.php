<?php
// ─── Contact form handler ─────────────────────────────────────────────────────
// Receives the inquiry form from contact.php, filters spam, and emails Kim.

// Only accept POST submissions.
if (($_SERVER['REQUEST_METHOD'] ?? '') !== 'POST') {
    header('Location: contact.php');
    exit;
}

// ── Spam trap 1: honeypot ──
// The "website" field is hidden from real users. If it's filled, it's a bot.
// Pretend success so the bot moves on, but send nothing.
if (!empty($_POST['website'])) {
    header('Location: thank-you.php');
    exit;
}

// ── Spam trap 2: timing ──
// Legit users take a few seconds to fill the form. Bots submit instantly.
// form_started is set by JavaScript to Date.now() (milliseconds).
if (!empty($_POST['form_started']) && is_numeric($_POST['form_started'])) {
    $elapsed = time() - ((int) $_POST['form_started'] / 1000);
    if ($elapsed < 3) {
        header('Location: thank-you.php');
        exit;
    }
}

// ── Collect + trim input ──
$name     = trim($_POST['name'] ?? '');
$email    = trim($_POST['email'] ?? '');
$date     = trim($_POST['date'] ?? '');
$location = trim($_POST['location'] ?? '');
$message  = trim($_POST['message'] ?? '');

// ── Server-side validation ──
$valid = true;
if ($name === '')                                   $valid = false;
if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) $valid = false;
if ($message === '')                                $valid = false;
// Header-injection guard: reject newlines in the fields used in headers.
if (preg_match('/[\r\n]/', $name . $email))         $valid = false;

if (!$valid) {
    header('Location: contact.php?error=1');
    exit;
}

// ── Build and send the email ──
$to      = 'kimsinton@gmail.com';
$subject = 'New wedding inquiry from ' . $name;

$body  = "You have a new inquiry from your website:\n\n";
$body .= "Name:            " . $name . "\n";
$body .= "Email:           " . $email . "\n";
$body .= "Event date:      " . ($date !== ''     ? $date     : 'Not provided') . "\n";
$body .= "Location/venue:  " . ($location !== '' ? $location : 'Not provided') . "\n\n";
$body .= "Message:\n" . $message . "\n";

// From must be a domain address for good deliverability; Reply-To is the visitor
// so you can reply straight from your inbox.
$from    = 'noreply@kimsinton.com';
$headers  = 'From: Kim Sinton Website <' . $from . ">\r\n";
$headers .= 'Reply-To: ' . $email . "\r\n";
$headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
$headers .= 'X-Mailer: PHP/' . phpversion();

$sent = @mail($to, $subject, $body, $headers);

if ($sent) {
    header('Location: thank-you.php');
    exit;
}

// mail() failed on the server.
header('Location: contact.php?error=send');
exit;
