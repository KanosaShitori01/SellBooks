<?php 
// PHP mailer
include "../PHPMailer/src/PHPMailer.php";
include "../PHPMailer/src/Exception.php";
include "../PHPMailer/src/OAuth.php";
include "../PHPMailer/src/POP3.php";
include "../PHPMailer/src/SMTP.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
$code = rand(999999, 111111);

function sendCodeMail($gmail_to, $code){
$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
    try {
        //Server settings
        $mail->SMTPDebug = 0;                                 // Enable verbose debug output
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'tranchauqn9@gmail.com';                 // SMTP username
        $mail->Password = 'sxcmggxcigpfxooa';                           // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                    // TCP port to connect to
    
        //Recipients
        $mail->setFrom('tranchauqn9@gmail.com', 'Kinh Sach Kim Quy');
        $mail->addAddress(''.$gmail_to, 'Guest');     // Add a recipient
        // $mail->addAddress('ellen@example.com');               // Name is optional
        // $mail->addReplyTo('info@example.com', 'Information');
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');
    
        // Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
    
        // Content
        // $mail->isHTML(true);              
        $list = rand(99, 11);                    // Set email format to HTML
        $mail->Subject = "ACCOUT VERIFICATION CODE KINHSACHKIMQUY #$list";
        $mail->Body    = "Mã xác nhận : $code";
        // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
        $mail->send();
        return "YES";
    } catch (Exception $e) {
        return 'Message could not be sent. Mailer Error: '. $mail->ErrorInfo;
    }
}

?>