<?php 
	if (!defined('IN_BOON')) {
		header('HTTP/1.1 404 Not Found', 404);
		return;
	}
	global $settings;
?>
<html>
<head>
	<title>Error 404 on <?php echo $settings['title']; ?></title>
</head>
<body>
Error 404: Page/file not found.
</body>
</html>