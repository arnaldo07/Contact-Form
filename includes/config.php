 <?php
 /**
 * Configures basic constants and paths
 * @package Contact-form
 * @link https://github.com/arnaldo07/contact-form    The github project
 * @author Arnaldo Govene <arnaldo.govene@outlook.com>
 * @copyright 2017 Arnaldo Govene
 * @license GNL
 * **/

 //Define Mail constats
 defined('MAIL_HOST') ? null : define ("MAIL_HOST", "");//  host port if gmail set: smtp.gmail.com
 defined('MAIL_PORT') ? null : define ("MAIL_PORT", ""); //mail port if gmail: 587
 defined('SMTP_AUTH') ? null : define ("SMTP_AUTH", "true");
 defined('MAIL_USER') ? null : define ("MAIL_USER", ""); //user email
 defined('MAIL_PASS') ? null : define ("MAIL_PASS", ""); //Password
//recepient e-mail
defined('RECIPIENT')? null : define ("RECIPIENT", ""); //RECIPIENT email
?>
