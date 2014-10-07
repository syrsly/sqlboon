<?php

/*
	SQLBoon Database Manager
	version 0.0.8
	October 7, 2014
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
// Make sure the settings array and other important variables are available to everything within index.php.
global $settings, $message, $content;
// Set content variable to a blank message.  This is important for instantiation before concatenating content strings within each model.
$content = '';
// Set message variable to a blank message.  This is important for instantiation before concatenating message strings within each model.
$message = '';

//Check if base_directory string is empty and if it is, set it to a forward slash.
//Otherwise, base_directory string has a value already and simply needs to have the beginning and end slashes added.
if ($settings['base_directory'] !== '') {
	$settings['base_directory'] = '/'.$settings['base_directory'].'/';
} else {
	$settings['base_directory'] = '/';
}


// Load the required libraries used by the site.
// url.php handles the beautified URLs and outputs an array of arguments to a function called within index.php.
require (ROOT_DIR.'libraries/url.php');
init_path();

// Load the appropriate model/view for the current URL.  The model will load first, then the view.
if (file_exists(ROOT_DIR.'pages/'.arg(0).'.php')) {
	include_once(ROOT_DIR.'system/common.php');
	include_once(ROOT_DIR.'pagedata/'.arg(0).'.php');
	include_once(ROOT_DIR.'pages/'.arg(0).'.php');
} else {
	// 404 error page, could also store records of every 404 error that happens if wanted but this is not a CMS, just a database backup manager.
	include_once(ROOT_DIR.'system/errorhandling/404error.php');
}

// End cap should be fine for index.php, but it is not necessary.  Do not add an end cap in the system/model files.
?>
