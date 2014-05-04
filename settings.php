<?php 

global $settings;

$settings['cmessage'] = '<a href="https://github.com/joshmaines/sqlboon">SQLBoon created by Joshua Maines</a>';

//SETTINGS START
// Edit any of the variables' values below.
// If in doubt, send me an e-mail at josh@tapskill.com.

//Beauty URLs
// May cause problems on crappy webhosts.
$settings['beautyurls'] = true; //default is true, set to false if problems occur with page links.

//Template Variables (will be moved to templates directory later)
$settings['title'] = 'SQLBoon'; //Title of the backup manager, default is "SQLBoon".
$settings['description'] = 'Database management system'; //description of site.  Not really useful at all unless your favorites/bookmarks system uses site descriptions.

//Login Settings
$settings['username'] = 'user'; //Username
$settings['password'] = 'whatever'; //Password

//Data file locations
$settings['backupfolder'] = 'backups';  //The location for all the backup files to be placed.  Default is "backups".

//Data file compression
$settings['compression'] = 'off';  //This chooses whether to compress both the backup file saved to the server and the backup file emailed to the user (optional).
//Set to 'off' if you do not wish to compress the backup files.

//Automatic backup file cleanup (CRON Jobs Only)
$settings['autocleanup'] = '1';  //Set to 1 for automatic deletion of old backup files, set to 0 to turn off
$settings['hourstokeep'] = '168'; //If the above set to 1, this controls how many hours backup files should be kept for (EXAMPLES: 24 = 1 day, 168 = 1 week)

//Email Settings
$settings['emailto'] = 'you@yoursite.com';  //The e-mail address to send backups to.  Change this to your own e-mail address!
$settings['emailfrom'] = 'backups@yoursite.com';  //The e-mail address backups will come from.  This could be whatever address you like.  It is helpful to use an address that is not used for any other purpose so you can easily filter the e-mail to its own category/folder.

//Reserved Words
// Check that your table name isn't using a reserved MySQL word (list at http://dev.mysql.com/doc/refman/5.1/en/reserved-words.html).  If it is, add the word to the array below IN LOWERCASE and the table will backup successfully.
$settings['reserved_words'] = array('group', 'key', 'order', 'like');

$settings['sites'] = array(

//The friendly name is used to easily recognise which database you wish to backup and is shown in the drop-down list
//on the quick backup page.  Add and delete as required taking note of the location of the commas (,)
'friendlyname' => array('Local Server', 'Online Server'),

//The hostname is the MySQL hostname, usually localhost.  Most people will not need to edit this.
'hostname' => array('localhost', 'localhost'),

//The database name is the name of the database you want to backup
'database' => array('localdb', 'onlinedb'),

//MySQL Username
// The username is the username required to connect to the database you want to backup.
// WAMPServer setups typically use the "root" user, but this is a bad practice.
'username' => array('root', 'root'),

//MySQL Password
// The password is the password required to connect to the database you want to backup.
// The default password for WAMPServer is blank.  You will have to change this to an actual password.  Your password should not be blank.
'password' => array('password goes here for local server', 'password goes here for online server')

);

//SETTINGS END
?>