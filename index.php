<?php

/*
	SQLBoon Database Manager
	version 0.0.4 (non-functional)
	May 4, 2014
*/

// Start the session
session_start(); 

// Define a static keyword for referencing the current working directory. Makes it easier to support subdirectory structures.
define('ROOT_DIR', getcwd().'/');
// Define a variable name as the value of 1 so we can check if potentially unsafe code is actually accessed within this index.php controller.
define('IN_BOON', 1);
// Specify that the server should show you all PHP errors.  Good for debugging.  Disable/remove for production sites.
error_reporting(E_ALL);

// Load settings file for system customization. This file instantiates many important variables within a settings array.
require (ROOT_DIR.'settings.php');

// Load the required libraries used by the site.
// url.php handles the beautified URLs and outputs an array of arguments to a function called within index.php.
require (ROOT_DIR.'libraries/url.php');
init_path();

// Make sure the settings array and other important variables are available to everything within index.php.
global $settings, $message;
// Set message variable to a blank message.  This is important for instantiation before concatenating message strings within each model.
$message = '';

// Load the appropriate model/view for the current URL.
// Note: some pages are plain HTML and only require a view or template file without the need of a logic/model file.
if (file_exists(ROOT_DIR.'system/'.arg(0).'.php')) {
	include_once(ROOT_DIR.'system/'.arg(0).'.php');
	//For additional security through obscurity, you could add a set of numbers/letters to the file names for all system files.
	//Example: include_once(ROOT_DIR.'system/'.arg(0).'55r1sa259535b.php');
	//However, this system will be secure enough to not need to rely on obscurity at all.
} else if (file_exists(ROOT_DIR.'pages/'.arg(0).'.php')) {
	include_once(ROOT_DIR.'pages/'.arg(0).'.php');
} else {
	include_once(ROOT_DIR.'system/errorhandling/404error.php');
}

// End cap should be fine for index.php, but it is not necessary.  Do not add an end cap in the system/model files.
?>
