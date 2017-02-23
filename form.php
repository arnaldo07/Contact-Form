<?php
/**
* Contact form that sends email to a predefined recepient email
* @package Contact-form
* @link https://github.com/arnaldo07/contact-form    The github project
* @author Arnaldo Govene <arnaldo.govene@outlook.com>
* @copyright 2017 Arnaldo Govene
* @license GNL
* **/

//Require PHPMailer Autoloader
require_once('includes/initialize.php');

//form is submitted
if(isset($_POST['submit-message'])){
  //Get post data
  $first_name   = $_POST['first-name'];
  $last_name    = $_POST['last-name'];
  $email        = $_POST['email'];
  $subject      = $_POST['subject'];
  $message      = $_POST['message'];

  //Validate post first name
  if(!preg_match('/^[A-Za-z]/', $first_name) || empty($first_name) || strlen($first_name)>24 || strlen($first_name)<2 ){
    $first_name_error       = "nome";
  } else {
    $first_name_error       = "";
  }
  //Validate post surname
  if(!preg_match('/^[A-Za-z]/', $last_name) || empty($last_name) || strlen($last_name)>24 || strlen($last_name)<2 ){
    $last_name_error       = "apelido";
  } else {
    $last_name_error       = "";
  }
  //Validate email
  if(!filter_var($email, FILTER_VALIDATE_EMAIL) || empty($email) || strlen($email)>50  ){
    $email_error       = "E-mails devem ter o formato <i>nome@exemplo.com</i>.";
  } else {
    $email_error       = "";
  }
  //Validate subject
  if( empty($subject)){
    $subject_error       = "Por favor, insira um assunto.";
  } else {
    $subject_error       = "";
  }
  //Validate message
  if( empty($message)){
    $message_error       = "Este campo não deve estar vazio.";
  } else {
    $message_error       = "";
  }
  //Check for errors
  if(empty($first_name_error) & empty($last_name_error) & empty($email_error) & empty($message_error)){
    //As there's no errors send email
    $to_name = "Me"; // Set you email
    $message  = $_POST['message']; //post message
    $message .= "<p>**********Contact Form**********</p>";
    $message .= "Sender Name: {$first_name} {$last_name} <br>";
    $message .= "Sender Email: {$email}";

    if(Mailer::sendmail($to_name, RECIPIENT, $subject, $message, $first_name." ".$last_name, $email)){//RECIPIENT is constant defined in the config.php
      //Return message
      $report = "<span class='sent'>Sua mensagem foi enviada com sucesso.</span>" ;
      $first_name   = "";
      $last_name    = "";
      $email        = "";
      $subject      = "";
      $message      = "";
    } else {
      //Return message to inputs
      $message  = $_POST['message'];
      //Else return message
      $report = "<span class='error'>Sua mensagem não foi enviada. Tente novamente.</span>";
    }
  } else{
    //
  }
}else {
  //If don't submit return null
  $first_name   = "";
  $last_name    = "";
  $email        = "";
  $phone        = "";
  $subject      = "";
  $message      = "";
}
?>

<form class="send-msg-form" method="post" action="form.php">
  <p  class="report"><?php if(!empty($report)){echo $report; } ?></p>
  <p>
    <input class="first-name-input text-input name-input" type="text" name="first-name" placeholder="Primeiro nome" value="<?php echo htmlentities($first_name); ?>">
    <input class="last-name-input text-input name-input" type="text" name="last-name" placeholder="Apelido" value="<?php echo htmlentities($last_name); ?>">
    <?php
    //Dispaying error messages for name and surnam
    if(!(empty($first_name_error)) & !(empty($last_name_error))  ){
      echo output_message("<P class='error-message error-msg'> <span> O {$first_name_error} e ou {$last_name_error} que inseriu são inválidos.</span></P>");
    } elseif (!empty($first_name_error))     {
      echo output_message("<P class='error-message error-msg'> <span> O {$first_name_error} que inseriu é inválido.</span></P>");
    }  elseif (!empty($last_name_error)) {
      echo output_message("<P class='error-message error-msg'> <span> O {$last_name_error} que inseriu é inválido.</span></P>");
    }
    ?>
  </p>
  <p>
    <input class="email-input text-input full-width-input" type="text" name="email" placeholder="E-mail" value="<?php echo htmlentities($email); ?>">
    <?php
    //Echo error messages
    if(!empty($email_error)) { echo "<P class='error-message error-msg'> <span>".output_message($email_error)."</span></P>"; }?>
  </p>
</p>
</p>

<p>
  <input class="subject-input text-input full-width-input" type="text" name="subject" placeholder="Asssunto" value="<?php echo htmlentities($subject); ?>">
  <?php
  //Echo error messages
  if(!empty($suject_error)) { echo "<P class='error-message error-msg'> <span>".output_message($subject_error)."</span></P>"; }?>
</p>
</p>
<p>
  <textarea class="message-input text-input full-width-input"  name="message" placeholder="Digite a sua mensagem..."><?php echo htmlentities($message); ?></textarea>
  <?php
  //Echo error messages
  if(!empty($message_error)) { echo "<P class='error-message error-msg'> <span>".output_message($message_error)."</span></P>"; }?>
</p>
</p>
<p>
  <input class="submit-message submit full-width-input" type="submit" name="submit-message"  value="Enviar">
</form>
