<?php 

/* pages/index.php May 9, 2014
	template/view for front page. */
	
	if (!defined('IN_BOON')) {
		return;
	}
	
	include_once(ROOT_DIR.'system/bases/header.php');

?>

<h1><?php echo $settings['title']; ?></h1>
<p>Welcome to <?php echo $settings['title']; ?>, your MySQL database manager!
This management system will allow you to backup and restore databases using .sql files.</p>

<?php echo $settings['title']; ?>
<?php 

	include_once(ROOT_DIR.'system/bases/footer.php');

?>
