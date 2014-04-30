<?php

function init_path() {
  if (!empty($_GET['q'])) {
    $_GET['q'] = trim($_GET['q'], '/');
  }
  else {
    $_GET['q'] = 'index';
  }
}

// arg function borrowed from Drupal CMS and modified.
// arg function turns beautified URLs into readable variables within a nested array of strings inside an arguments array.
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
