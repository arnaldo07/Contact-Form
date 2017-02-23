<?php
/**
* Sends emails
* @package Contact Form
* @link https://github.com/arnaldo07/contact-form    The github project
* @author Arnaldo Govene <arnaldo.govene@outlook.com>
* @copyright 2017 Arnaldo Govene
* @license GNL
* **/

//Initialize
require_once("initialize.php");
class Mailer{
  /**
  * Sends email
  *
  * @param string    $to_name    Email recepient name
  * @param string    $to         Recepient email
  * @param string    $subject    Email subject
  * @param string    $message    The email content
  * @param strong    $from_name  Sender email
  * @param string    $FROM       Sender email
  * @access public
  * @return boolean
  * **/
  public static function sendmail($to_name, $to, $subject, $message, $from_name, $from){
    $mail    = new PHPMailer();
    $mail->IsSMTP();
    $mail->Host             = MAIL_HOST;
    $mail->Port             = MAIL_PORT;
    $mail->SMTPAuth         = SMTP_AUTH;
    $mail->Username         = MAIL_USER;
    $mail->Password         = MAIL_PASS;
    $mail->SMTPSecure       = "tls";
    $mail->IsHTML(true);
    $mail->SMTPDebug        = "FALSE";
    $mail->Debugoutput      = 'html';
    $mail->CharSet = "UTF-8";

    $mail->addCustomHeader("From: {$from}");
    $mail->setFrom ($from, $from_name);
    $mail->addReplyTo($from, $from_name);
    $mail->addAddress($to, $to_name);
    $mail->Subject          = $subject;
    $mail->MsgHTML($message);

    //Disable peer verification
    $mail->SMTPOptions = array(
      'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
      )
    );

    //$mail->setLanguage('pt', SITE_ROOT.DS.'includes'.DS.'phpmailer'.DS.'phpmailer.lang-pt.php');
    if($mail->send()){
      return true;
    } else {
      return false;
    }
  }
}
$mailer = new Mailer();
?>
