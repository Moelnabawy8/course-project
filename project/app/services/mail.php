<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
require 'vendor/autoload.php';

class Mail {
    private $emailto;
    private $subject;
    private $body;

    public function __construct($emailto, $subject, $body) {
        $this->emailto = $emailto;
        $this->subject = $subject;
        $this->body = $body;
    }

    public function send() {
        $mail = new PHPMailer(true);

        try {
            // Server settings
            $mail->SMTPDebug = 0; // Production: use 0, for testing: use SMTP::DEBUG_SERVER
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'moelnabawy8@gmail.com';
            $mail->Password   = 'atzj ivqf goxe fipz'; // ❗ يفضل حفظه في ملف config خارجي
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port       = 465;

            // Email content
            $mail->setFrom('moelnabawy8@gmail.com', 'project');
            $mail->addAddress($this->emailto);
            $mail->isHTML(true);
            $mail->Subject = $this->subject;
            $mail->Body    = $this->body;

            $mail->send();
            return true;
        } catch (Exception $e) {
            echo "Mailer Error: {$mail->ErrorInfo}";
            return false;
        }
    }
}
?>
