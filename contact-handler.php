<?php
// Import PHPMailer classes
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load Composer autoloader
require 'vendor/autoload.php';

// Load email configuration
$emailConfig = require 'email-config.php';

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');

// Handle preflight requests
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

// Only accept POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Method not allowed']);
    exit();
}

// Get JSON input
$input = file_get_contents('php://input');
$data = json_decode($input, true);

// Validate required fields
$name = isset($data['name']) ? trim($data['name']) : '';
$email = isset($data['email']) ? trim($data['email']) : '';
$message = isset($data['message']) ? trim($data['message']) : '';
$ipAddress = isset($data['ipAddress']) ? trim($data['ipAddress']) : '';

if (empty($name) || empty($message) || empty($ipAddress)) {
    http_response_code(400);
    echo json_encode([
        'success' => false,
        'message' => 'Name, Message, and IP Address are required fields'
    ]);
    exit();
}

try {
    // Create PHPMailer instance
    $mail = new PHPMailer(true);
    
    // Server settings
    if ($emailConfig['use_smtp']) {
        $mail->isSMTP();
        $mail->Host = $emailConfig['smtp_host'];
        $mail->SMTPAuth = true;
        $mail->Username = $emailConfig['smtp_username'];
        $mail->Password = $emailConfig['smtp_password'];
        $mail->SMTPSecure = $emailConfig['smtp_secure'];
        $mail->Port = $emailConfig['smtp_port'];
    } else {
        $mail->isMail(); // Use PHP mail() function (default di shared hosting)
    }
    
    // Recipients
    $mail->setFrom($emailConfig['from_email'], $emailConfig['from_name']);
    $mail->addAddress($emailConfig['to_email']);
    if (!empty($email)) {
        $mail->addReplyTo($email, $name);
    } else {
        $mail->addReplyTo($emailConfig['reply_to_email']);
    }
    
    // Content
    $mail->isHTML(true);
    $mail->CharSet = 'UTF-8';
    $mail->Subject = 'Contact Form Submission from ' . $name;
    
    // Build email body
    $mail->Body = "
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset='UTF-8'>
        <style>
            body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
            .container { max-width: 600px; margin: 0 auto; padding: 20px; }
            h2 { color: #c69c6d; border-bottom: 2px solid #c69c6d; padding-bottom: 10px; }
            .field { margin: 15px 0; }
            .label { font-weight: bold; color: #555; }
            .value { margin-top: 5px; padding: 10px; background: #f5f5f5; border-left: 3px solid #c69c6d; }
            .footer { margin-top: 30px; padding-top: 20px; border-top: 1px solid #ddd; font-size: 12px; color: #888; }
        </style>
    </head>
    <body>
        <div class='container'>
            <h2>New Contact Form Submission</h2>
            
            <div class='field'>
                <div class='label'>Name:</div>
                <div class='value'>" . htmlspecialchars($name) . "</div>
            </div>
            
            <div class='field'>
                <div class='label'>Email:</div>
                <div class='value'>" . (empty($email) ? 'Not provided' : htmlspecialchars($email)) . "</div>
            </div>
            
            <div class='field'>
                <div class='label'>IP Address:</div>
                <div class='value'>" . htmlspecialchars($ipAddress) . "</div>
            </div>
            
            <div class='field'>
                <div class='label'>Message:</div>
                <div class='value'>" . nl2br(htmlspecialchars($message)) . "</div>
            </div>
            
            <div class='footer'>
                This email was sent from the contact form on PT Eliazer Nahor Pratama website.
            </div>
        </div>
    </body>
    </html>
    ";
    
    // Plain text version for email clients that don't support HTML
    $mail->AltBody = "New Contact Form Submission\n\n" .
                     "Name: $name\n" .
                     "Email: " . (empty($email) ? 'Not provided' : $email) . "\n" .
                     "IP Address: $ipAddress\n\n" .
                     "Message:\n$message\n\n" .
                     "This email was sent from the contact form on PT Eliazer Nahor Pratama website.";
    
    // Send email
    $mail->send();
    
    http_response_code(200);
    echo json_encode([
        'success' => true,
        'message' => 'Email sent successfully'
    ]);
    
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'message' => 'Failed to send email. Please try again later.',
        'debug' => $mail->ErrorInfo // Remove this line in production
    ]);
}
?>
