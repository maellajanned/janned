<?php
​
if(isset($_POST['email'])) {
​
​
​
    // EDIT THE 2 LINES BELOW AS REQUIRED
​
    $email_to = "jeanne.ngassa@gmail.com";
​
    $email_subject = "Contact en savoir plus";
​
​
​
​
​
    function died($error) {
​
        // your error code can go here
​
        echo "Nous sommes désolés , mais il y a une erreur trouvé avec la forme que vous avez soumis. ";
​
        echo "Ces erreurs apparaissent ci-dessous.<br /><br />";
​
        echo $error."<br /><br />";
​
        echo "Veuillez revenir en arrière et corriger ces erreurs.<br /><br />";
​
        die();
​
    }
​
​
​
    // validation expected data exists
​
    if(!isset($_POST['nom']) ||
​
        !isset($_POST['prenom']) ||
​
        !isset($_POST['email']) ||
​
        !isset($_POST['message'])) {
​
        died('Nous sommes désolés , mais il semble y avoir un problème avec la forme que vous avez soumis.');
​
    }
​
​
​
    $name = $_POST['nom']; // required
​
    $surname = $_POST['prenom']; // required
​
    $email = $_POST['email']; // required
​
    $message = $_POST['message']; // required
​
​
​
    $error_message = "";
​
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
​
  if(!preg_match($email_exp,$email)) {
​
    $error_message .= 'Le e-mail que vous avez entré ne semble pas être valide
.<br />';
​
  }
​
    $string_exp = "/^[A-Za-z .'-]+$/";
​
  if(!preg_match($string_exp,$name)) {
​
    $error_message .= 'Le Nom que vous avez entré ne semble pas être valide.<br />';
​
  }
​
  if(!preg_match($string_exp,$surname)) {
​
    $error_message .= 'Le Prénom que vous avez entré ne semble pas être valide.<br />';
​
  }
​
  if(strlen($message) < 2) {
​
    $error_message .= 'Le message que vous avez entré ne semble pas être valide..<br />';
​
  }
​
  if(strlen($error_message) > 0) {
​
    died($error_message);
​
  }
​
    $email_message = "Form details below.\n\n";
​
​
​
    function clean_string($string) {
​
      $bad = array("content-type","bcc:","to:","cc:","href");
​
      return str_replace($bad,"",$string);
​
    }
​
​
​
    $email_message .= "Nom: ".clean_string($name)."\n";
​
    $email_message .= "Prénom: ".clean_string($surname)."\n";
​
    $email_message .= "Email: ".clean_string($email)."\n";
​
    $email_message .= " ".clean_string($message)."\n";
​
​
​
​
​
// create email headers
​
$headers = 'From: '.$email."\r\n".
​
'Reply-To: '.$email."\r\n" .
​
'X-Mailer: PHP/' . phpversion();
​
@mail($email_to, $email_subject, $email_message, $headers);
​
?>
​

​
​
​
<?php
​

​
?>
