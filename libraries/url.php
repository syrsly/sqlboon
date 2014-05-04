<?php

if (!defined('IN_BOON')) {
	header('HTTP/1.1 404 Not Found', 404);
	return;
}

function init_path() {
  if (!empty($_GET['q'])) {
    $_GET['q'] = trim($_GET['q'], '/');
  }
  else {
    $_GET['q'] = 'index';
  }
}

/* arg function borrowed from Drupal CMS and modified for use by SQLBoon.
	arg function turns beautified URLs into readable variables within a nested array of strings inside an arguments array.
	note: arg function will work without beauty URLs enabled, because it relies on the $_GET['q'] variable. */
function arg($index = NULL, $path = NULL) {
  static $arguments;

  if (!isset($path)) {
    $path = $_GET['q'];
  }
  if (!isset($arguments[$path])) {
    $arguments[$path] = explode('/', $path);
  }
  if (!isset($index)) {
    return $arguments[$path];
  }
  if (isset($arguments[$path][$index])) {
    return $arguments[$path][$index];
  } else {
    return "0";
  }
}

// Do not include end cap.  Do not end PHP code.  This could cause header errors.
