<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require_once('../app/vendor/autoload.php');

class Mail {

   public function sendMail($data = []){
        
        $mail = new PHPMailer(true);                              
        try {
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'luis.rainmaker@gmail.com';                 // SMTP username
            $mail->Password = 'Damagedonelpq09!';                           // SMTP password
            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                                    // TCP port to connect to

            //Recipients
            $mail->setFrom('luis.rainmaker@gmail.com', 'Luis');
            $mail->addAddress('luis.rainmaker@gmail.com', 'Luis');     // Add a recipient              // Name is optional
            $mail->addReplyTo($data['email']);
           
            //Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = $data['subject'];
            $mail->Body    = $data['message'];
            $mail->AltBody = $data['message'];

            $mail->send();
            return true;
        } catch (Exception $e) {
            return 'Message could not be sent. '. 'Mailer Error: ' . $mail->ErrorInfo;
            
        } 
   }

   public function sendRecoveryPassMail($data = []){
    $mail = new PHPMailer(true);                              
    try {
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'luis.rainmaker@gmail.com';                 // SMTP username
        $mail->Password = 'Damagedonelpq09!';                           // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                    // TCP port to connect to

        
        //Recipients
        $mail->setFrom('luis.rainmaker@gmail.com', 'Luis');
        $mail->addAddress($data['email']);     // Add a recipient              // Name is optional
        $mail->addReplyTo('noreply@gmail.com');
       
        //Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Password Recovery';
        $root_url = URLROOT;
        $token = $data['token'];
        $link = "<a href=\"$root_url/users/recover/$token\"> $root_url/users/recover/$token </a><p>";
        
        $mail->Body    = 'Here is your link for password reset: ' . $link;
        $mail->AltBody = 'here is your link for password reset: ' . strip_tags($link);

        $mail->send();
        return true;
    } catch (Exception $e) {
        die('Message could not be sent. '. 'Mailer Error: ' . $mail->ErrorInfo);
    } 
   }
}


?>