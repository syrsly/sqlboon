<?php 
	
	/* Common functions used on each page. */
	function setTitle ($title='Home') {
		$settings['title'] = $settings['title'] . $title;
	}
	function Title () {
		return $settings['title'];
	}
	
	function Header () {
		include_once(ROOT_DIR.'system/bases/header.php');
	}
