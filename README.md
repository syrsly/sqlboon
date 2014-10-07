SQLBoon
=======

PHP5-powered, modular MySQL database management system and backup manager with optional login feature.

Features List
=======

1. MVC structure, entire site runs through index.php (controller) and utilizes a template-based design (view) with predetermined content pieces and data (models).
2. Modular design allows for easy modification of site layout and functionality to suit your own needs, though this is far simpler than a CMS like Drupal.
3. Beautified URLs/addresses, example: yoursite.com/sqlboon/backup/1 goes to the backup confirmation page before continuing to backup database #1.
4. Optional login system (enabled by default), good to use if your site is going to always have SQLBoon on the server.
5. Backs up MySQL databases using MySQLi connection. (Very useful if your hosting solution does not already provide a backup tool.)
6. Restores MySQL databases using MySQLi connection with optional wipe of all tables beforehand.
7. Lists previous backups up to a specified amount of backups.  Older backups are automatically deleted when limit is reached. (Saves space!)

Submit your feature requests in the issues area.  I will pick a spare few features to be added in version 2.0 once version 1.0 is done.

Completely Free
=======

This project is licensed under the MIT public domain license. Any and all parts of the project are completely open source and freely redistributable.  I ask that you use my work as a stepping stone to get your own projects done.  If you use my work, thanks is appreciated but not required nor expected.

Installation
=======

Installation is easy.  Just throw the entire directory into your site's root directory or any subdirectory and edit the settings.php file using the instructions in the file.  Make sure you also include the .htaccess file!

Site requirements are another concern.  Not all webhosts support beautified URLs, but most do!  I have included a way to disable that feature in the settings.php file.

Current state
=======
Version: 0.0.7 (non-functional)
Maintainer: Josh Maines

Project is non-profit but unsupported.  If you require support for SQLBoon, you may acquire my freelance IT services at my current hourly rate by using my site's contact form at http://www.tapskill.com/contact