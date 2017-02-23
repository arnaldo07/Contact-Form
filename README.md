# Contact-Form
Just a simple contact form developed in PHP with Form validation. 

## Download
You can download or check all the lastest version here on GitHub.

## Requirements
PHP >=5.4

## Usage
Open the [config.php](https://github.com/arnaldo07/Contact-Form/blob/master/includes/config.php) file and fill your informations at the constants definitions.

```PHP
<?php
/**
 * Configures basic constants and paths
 * @package Contact-form
 * @link https://github.com/arnaldo07/contact-form    The github project
 * @author Arnaldo Govene <arnaldo.govene@outlook.com>
 * @copyright 2017 Arnaldo Govene
 * @license GNL
 * **/
 
//Define Mail constants
 defined('MAIL_HOST') ? null : define ("MAIL_HOST", ""); // Host port. If is gmail set: smtp.gmail.com
 defined('MAIL_PORT') ? null : define ("MAIL_PORT", ""); // Mail port. If is gmail set: 587
 defined('SMTP_AUTH') ? null : define ("SMTP_AUTH", "true"); // If want to authenticate. Its always a good practise set TRUE.
 defined('MAIL_USER') ? null : define ("MAIL_USER", ""); // A valid email with same domain where the form is hosted. 
 defined('MAIL_PASS') ? null : define ("MAIL_PASS", ""); // Password of that email
 //recepient e-mail
 defined('RECIPIENT')? null : define ("RECIPIENT", ""); // Email to receive emails via the form.
 
 ?>
```

## Debug
To debug or wether is to check something going wrong with the email not sending. You can go to [mailer.php] (https://github.com/arnaldo07/Contact-Form/blob/master/includes/mailer.php) file and follow the instructions bellow.
```PHP
    $mail->SMTPDebug        = "FALSE"; // To turn on debug mode set it to 02.
```


