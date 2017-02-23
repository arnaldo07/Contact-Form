<?php
/**
* Initializes all files and libraries
* @package Contact Form
* @link https://github.com/arnaldo07/contact-form    The github project
* @author Arnaldo Govene <arnaldo.govene@outlook.com>
* @copyright 2017 Arnaldo Govene
* @license GNL
* **/

// Define them as absolute paths to make sure that require_once works as expected

// DIRECTORY_SEPARATOR is a PHP pre-defined constant
// (\ for Windows, / for Unix)
defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
//Library path (includes folder )
defined('LIB_PATH') ? null :  define('LIB_PATH', dirname(__FILE__));
// load config file first
require_once(LIB_PATH.DS.'config.php');
require_once(LIB_PATH.DS.'functions.php');
//require mailer
require_once(LIB_PATH.DS.'mailer.php');
//load phpmailer
require_once(LIB_PATH.DS.'PHPMailer'.DS.'PHPMailerAutoload.php');
?>
