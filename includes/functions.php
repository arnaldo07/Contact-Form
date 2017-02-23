<?php
/**
* All functions here
* @package Contact-form
* @link https://github.com/arnaldo07/contact-form    The github project
* @author Arnaldo Govene <arnaldo.govene@outlook.com>
* @copyright 2017 Arnaldo Govene
* @license GNL
* **/

/**
 * Redirects to @location
 * @param string  $location   The location to redirect to
 * **/
function redirect_to($location = NULL){
  if ($location !=NULL){
    header("location: {$location}");
    exit;
  }
}

/**
 * Output a message
 * @param  string    $message    The message to output
 * @return string
 * **/
function output_message($message=""){
  if (!empty($message)){
    return $message;
  } else {
    return $message = "";
  }
}

/**
 * Autolaad classes
 * @param string    $class_name   The class name to be autoloaded
 * **/
function __autoload($class_name){
  $class  = strtolower($class_name);
  $path   = "{$class_name}.php";
  if(file_exists($path)){
    require_once($path);
  } else {
    require_once("initialize.php");
  }
}

/**
* Gets current directory
* @return string
*/
function current_dir(){
  $url = $_SERVER['REQUEST_URI']; //returns the current URL
  $parts = explode('/',$url);
  $dir = $_SERVER['SERVER_NAME'];
  for ($i = 0; $i < count($parts) - 1; $i++) {
    $dir .= $parts[$i] . "/";
  }
  return $dir;
}

?>
