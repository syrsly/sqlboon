<?php

/* Backup functionality model.
Checks for login session, does whatever post data asks for, displays error/success message.
Also used as model for basic backup options page. */

if (isLoggedIn()) {
	//show user the options and/or do stuff depending on post data
} else {
	//send user to login page with error saying the backup tools require login
}

// Do not add end tag for PHP since this is nested inside a controller.
