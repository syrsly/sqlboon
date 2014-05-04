<?php 

// Include this file to generate the site-wide header code.

/* How this fits in the MVC (model, view, controller) pattern:
	This is kind of a view inside a model inside a view.
	The controller is the index.php file, which loads a model based on the URL given.
	Then, the model loads the view or views based on the controller's settings variables. */

global $settings;
	
echo '<!DOCTYPE html>
<html lang="en">
<head>
	<title>'.$settings['title'].'</title>
	<meta http-equiv="Content-Type" content="text/html; charset=windows-1252" />
	<meta name="description" content="'.$settings['description'].'" />';

/* End cap is not necessary.
I advise against using the end cap on nested code,
but you technically could do so as long as the code is run after any header information. */
