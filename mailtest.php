<?php
// ─── TEMPORARY diagnostic — DELETE this file once the form works ──────────────
// Visit this file directly in your browser (e.g. https://your-site/mailtest.php)
// to test whether PHP mail() works on this server.
header('Content-Type: text/plain; charset=UTF-8');

$to      = 'kimsinton@gmail.com';
$host    = preg_replace('/^www\./', '', $_SERVER['HTTP_HOST'] ?? 'localhost');
$from    = 'noreply@' . $host;
$subject = 'Pair mail() test — ' . date('H:i:s');
$body    = "This is a test message sent by mailtest.php at " . date('c') . ".\n"
         . "If you received this, PHP mail() is delivering from this server.\n";
$headers = 'From: Website <' . $from . ">\r\n"
         . "Content-Type: text/plain; charset=UTF-8";

$ok = mail($to, $subject, $body, $headers, '-f' . $from);

echo "==== PHP mail() diagnostic ====\n\n";
echo "mail() returned : " . var_export($ok, true) . "\n";
echo "Sent to         : " . $to . "\n";
echo "From            : " . $from . "\n";
echo "Server host     : " . ($_SERVER['SERVER_NAME'] ?? 'unknown') . "\n";
echo "sendmail_path   : " . (ini_get('sendmail_path') ?: '(not set)') . "\n";
echo "PHP version     : " . phpversion() . "\n\n";

if ($ok) {
    echo "RESULT: mail() accepted the message (returned true).\n";
    echo "  -> Now check your Gmail INBOX **and SPAM/All Mail**.\n";
    echo "  -> If it's only in spam (or missing), it's a deliverability issue:\n";
    echo "     add your domain's SPF record for Pair, or ask Pair support to confirm.\n";
} else {
    echo "RESULT: mail() returned FALSE — the server refused to queue the message.\n";
    echo "  -> PHP mail()/sendmail may be disabled on this account.\n";
    echo "     Contact Pair support and ask if mail() is enabled for your plan.\n";
}
echo "\n(Remember to delete mailtest.php when you're done.)\n";
