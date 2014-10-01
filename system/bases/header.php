<?php 

// Include this file to generate the site-wide header code.

/* How this fits in the MVC (model, view, controller) pattern:
	This is kind of a view inside a model inside a view.
	The controller is the index.php file, which loads a model based on the URL given.
	Then, the model loads the view or views based on the controller's settings variables. */

global $title, $settings;
	
$siteMenu = '<div class="menu">';
while ($siteSection < $siteSections.length) {
	$siteMenu .= '<a href="'.$settings['url'].'/'.$siteSections[$siteSection]['url'].'">'.$siteSections[$siteSection]['name'].'</a>';
}
$siteMenu .= '</div>';

echo '<!DOCTYPE html>
<html lang="en">
<head>
	<title>'.$title.'</title>
	<meta charset="windows-1252" />
	<meta name="description" content="'.$settings['description'].'" />
	<link href="'.$settings['url'].'/css/site.css" rel="stylesheet" type="text/css" />
</head>
<body>
';

/* End cap is not necessary.
I advise against using the end cap on nested code,
but you technically could do so as long as the code is run after any header information. */
