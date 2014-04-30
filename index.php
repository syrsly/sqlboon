<?php
// Start the session
session_start(); 

// Define a static keyword for referencing the current working directory. Makes it easier to support subdirectory structures.
define('ROOT_DIR', getcwd());
// Define a variable name as the value of 1 so we can check if potentially unsafe code is actually accessed within this index.php controller.
define('IN_BOON', 1);
// Specify that the server should show you all PHP errors.  Good for debugging.  Disable/remove for production sites.
error_reporting(E_ALL);

// Load settings file for system customization. This file instantiates many important variables within a settings array.
require (ROOT_DIR.'settings.php');

// Load the required libraries used by the site.
// url.php handles the beautified URLs and outputs an array of arguments to a function called within index.php.
require (ROOT_DIR.'libraries/url.php');

// Make sure the settings array and other important variables are available to everything within index.php.
global $settings, $message;
// Set message variable to a blank message.  This is important for instantiation before concatenating message strings within each model.
$message = '';

// Load the appropriate model for the current URL.
if (file_exists(arg(0))) {
	include_once('system/'.arg(0).'.php');
} else {
	include_once('errorhandling/404error.php');
}

// End cap should be fine for index.php, but it is not necessary.  Do not add an end cap in the system/model files.
?>
