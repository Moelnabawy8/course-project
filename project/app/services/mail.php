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
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                       //Set the SMTP server to send through
            $mail->SMTPAuth   =  true;                                   //Enable SMTP authentication
            $mail->Username   = 'moelnabawy8@gmail.com';                //SMTP username
            $mail->Password   = 'atzj ivqf goxe fipz
';                         //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            // Email content
            $mail->setFrom('moelnabawy8@gmail.com', 'project');
            $mail->addAddress($this->emailto);
            $mail->isHTML(true);
            $mail->Subject = $this->subject;
            $mail->Body    = $this->body;

            $mail->send();
            return true;
        } catch (Exception $e) {
            // ممكن تطبع الخطأ أثناء التطوير:
            // echo "Mailer Error: {$mail->ErrorInfo}";
            return false;
        }
    }
}
?>
