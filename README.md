sqlboon
=======

PHP-powered MySQL database management system and backup manager with optional login feature.

Features
=======

1. MVC structure, entire site runs through index.php (controller) and utilizes a template-based design (view) with predetermined content pieces (model).
2. Beautified URLs/addresses, example: yoursite.com/sqlboon/backup/1 goes to the backup confirmation page before continuing to backup database #1.
3. Optional login system (enabled by default), good to use if your site is going to always have SQLBoon on the server.
4. Backs up MySQL databases using MySQLi connection.
5. Restores MySQL databases using MySQLi connection.
6. Lists previous backups up to a specified amount of backups.  Older backups are automatically deleted when limit is reached.

Installation
=======

Installation is easy.  Just throw the entire directory into your site's root directory or any subdirectory and edit the settings.php file using the instructions in the file.  Make sure you also include the .htaccess file!

Site requirements are another concern.  Not all webhosts support beautified URLs, but most do!  I have included a way to disable that feature in the settings.php file.

Current state
=======
Version: 0.0.2 (non-functional)

Project is new and meant to show my ability to understand design patterns and security concepts.  It is far from functional but will progress quickly on my days off from work.  I want this project to be useful for everyone, so make sure you post a feature request if what you want is not already listed.  Also, once the project reachs version 1.0 status, feel free to fork.