<?php

/* Backup functionality model.
Checks for login session, does whatever post data asks for, displays error/success message.
Also used as model for basic backup options page. */

global $settings, $content;

if (isLoggedIn()) {
	//show user the options and/or do stuff depending on post data
	
	if($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['siteid'])) {
		//connect to the chosen database based on posted form data
		$id = addslashes($_POST['siteid']);
		$linked = @mysqli_connect($settings['sites']['hostname'][$id], $settings['sites']['username'][$id], $settings['sites']['password'][$id], $settings['sites']['database'][$id]);
	} else {
		// Show backup options.  List available databases to connect to.
		$content .= '<p>Choose a database to backup:</p>
		<select name="backupid" class="input">';
		//For each quick backup defined in the settings.php file list it as a drop-dwon selection
		foreach($settings['quickbackup']['friendlyname'] as $key => $val)
		{
		$content .= '<option value="'.$key.'">'.$val.'</option>';
		}
		$content .= '</select>';
	}
} else {
	//send user to login page with error saying the backup tools require login
}

// Do not add end tag for PHP since this is nested inside a controller.
