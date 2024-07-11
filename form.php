<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';
?>



<?php


if (isset($_POST["submit"])) {
      $fullname = $_POST["fullname"];
      $company = $_POST["company"];
      $project = $_POST["project"];
      $email = $_POST["email"];
      $email2 = $_POST["email2"];
      $mail = new PHPMailer(true);

      try {
          //Server settings
          // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
          $mail->isSMTP(); //Send using SMTP
          $mail->Host = "smtp.gmail.com"; //Set the SMTP server to send through
          $mail->SMTPAuth = true; //Enable SMTP authentication
          $mail->Username = "rissgroups@gmail.com"; //SMTP username
          $mail->Password = "izduvesfaikgdavt"; //SMTP password
          $mail->SMTPSecure = "ssl"; //Enable implicit TLS encryption
          $mail->Port = 465; //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

          // Recipients
          $mail->setFrom($email, $fullname); // Set your preferred "from" email and name
          $mail->addAddress("lxshrills@gmail.com", "Digital Shapping"); // Recipient's email and name (You can change this)
          $mail->addReplyTo($email, $fullname);

          //Content
          $mail->isHTML(true);
          // Update the message to include the user's email
          $message = "<b>Name:</b>  $fullname <br> <b>Email:</b>  $email\n\n <b>Contact-option 2:</b>  $email2\n\n <br> <b>Subject:</b>  $project  <br> <b>Company:</b>  $company"; //Set email format to HTML
          $mail->Subject = $project;
          $mail->Body = $message;
          // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

          $mail->send();
          
          echo 
          "
          <script>
         
          document.location.href = './index.html';
         </script>
          ";
      } catch (Exception $e) {
   
          echo "
          
          <script>
          alert('Message could not be sent. Mailer Error: {$mail->ErrorInfo}');
          document.location.href = './index.html';
         </script>
          
          
          
          
          ";
      }
  }
?>