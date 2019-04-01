<?php 
if(isset($_POST['email'])) {
 
    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "toan.m.nguyen0592@gmail.com";
    $email_subject = "Message From Website";
 
    function died($error) {
        // your error code can go here
        echo "Sorry, there is a problem with the submission.";
        echo "Some errors have occured.<br /><br />";
        echo $error."<br /><br />";
        echo "Please go back and fix these errors.<br /><br />";
        die();
    }
 
 
    // validation expected data exists
    if(!isset($_POST['fullname']) ||
        !isset($_POST['phone']) ||
        !isset($_POST['email']) ||
        !isset($_POST['message'])) {
        died('Sorry, there is a problem with the submission.');       
    }

    $fullname = $_POST['fullname']; // required
    $telephone = $_POST['phone']; // not required
    $email= $_POST['email']; // required
    $comments = $_POST['message']; // required
 
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';

    if(!preg_match($email_exp,$email)) {
        $error_message .= 'This email is not a valid email.<br />';
      }
     
        $string_exp = "/^[A-Za-z .'-]+$/";
     
      if(!preg_match($string_exp,$fullname)) {
        $error_message .= 'This name is not a valid name.<br />';
      }
     
      if(strlen($message) < 2) {
        $error_message .= 'This is not considered as a message.<br />';
      }
     
      if(strlen($error_message) > 0) {
        died($error_message);
      }
     
        $email_message = "Form details below.\n\n";
     
         
        function clean_string($string) {
          $bad = array("content-type","bcc:","to:","cc:","href");
          return str_replace($bad,"",$string);
        }
     
         
     
        $email_message .= "Name: ".clean_string($fullname)."\n";
        $email_message .= "Email: ".clean_string($email)."\n";
        $email_message .= "Phone Number: ".clean_string($phone)."\n";
        $email_message .= "Message: ".clean_string($phone)."\n";
     
    // create email headers
    $headers = 'From: '.$email."\r\n".
    'Reply-To: '.$email."\r\n" .
    'X-Mailer: PHP/' . phpversion();
    @mail($email_to, $email_subject, $email_message, $headers);  
    ?>
     
    <!-- include your own success html here -->
     
    Thank you for your message! I will be in touch with you as soon as possible.

<?php
}
?>