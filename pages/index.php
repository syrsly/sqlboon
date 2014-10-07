<?php 

/* pages/index.php May 9, 2014
	template/view for front page. */
	
	if (!defined('IN_BOON')) {
		return;
	}
	
echo Header();
echo Title(); ?>

<h1><?php echo Title(); ?></h1>
<p>Welcome to your MySQL database manager!
This management system will allow you to easily backup and restore databases.  You can place this manager inside a folder on any site that uses PHP5 and supports MySQLi.  I hope this tool solves a lot of problems for you, but in the case that you need support for it, you can <a href="http://www.tapskill.com/contact">request a quote</a>.</p>


<?php 

	include_once(ROOT_DIR.'system/bases/footer.php');

?>
