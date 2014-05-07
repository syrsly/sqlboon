<?php

	if (!defined('IN_BOON')) {
		header('HTTP/1.1 404 Not Found', 404);
		return;
	}
	global $settings, $linked;
	
	//insert login check code
	if ($_SERVER['REQUEST_METHOD'] == "POST") {
		if (isset($_POST['username']) && isset($_POST['password'])) {
			$username = mysqli_real_escape_string($linked,$_POST['username']);
			$password = sha1(mysqli_real_escape_string($linked,$_POST['password']));

			// Check the username and password are correct
			$user = mysqli_query($linked,"SELECT id,name,password,rights FROM ".$settings['dbtableprefix']."users WHERE name='".$username."' LIMIT 1");
			if (mysqli_num_rows($user) == 1) {
				$user = $user->fetch_assoc();
				if ($user['password']==$password) {
					$_SESSION['is_logged_in'] = true;
					$_SESSION['userid'] = $user['id'];
					$_SESSION['username'] = $user['name'];
					$_SESSION['rights'] = $user['rights'];
					if ($user['rights'] >= 1) {
						header('Location: '.$settings['base_directory'].'admin');
					} else {
						header('Location: '.$settings['base_directory'].'index');
					}
					exit;
				} else {
					$errors[] = 'Incorrect credentials.';
					include './includes/templates/login.php';
				}
			} else {
				$errors[] = 'Incorrect credentials.';
				include './includes/templates/login.php';
			}
		} else {
			$errors[] = 'Incorrect credentials.';
			include './includes/templates/login.php';
		}
	} else {
		//insert login template/view functionality
		//note: login view should be reusable for various sections of a site and not just for a page.
	}
	

// Do not add end tag for PHP since this is nested inside a controller.
