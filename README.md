SQLBoon
=======

PHP-powered MySQL database management system and backup manager with optional login feature.

Features
=======

1. MVC structure, entire site runs through index.php (controller) and utilizes a template-based design (view) with predetermined content pieces (models).
2. Modular design allows for easy modification of site layout and functionality to suit your own needs.
3. Beautified URLs/addresses, example: yoursite.com/sqlboon/backup/1 goes to the backup confirmation page before continuing to backup database #1.
4. Optional login system (enabled by default), good to use if your site is going to always have SQLBoon on the server.
5. Backs up MySQL databases using MySQLi connection. (Very useful if your hosting solution does not already provide a backup tool.)
6. Restores MySQL databases using MySQLi connection with optional wipe of all tables beforehand.
7. Lists previous backups up to a specified amount of backups.  Older backups are automatically deleted when limit is reached. (Saves space!)

Submit your feature requests in the issues area.  I will pick a spare few features to be added in version 2.0 once version 1.0 is done.

Completely Free
=======

This project is licensed under the MIT public domain license. Any and all parts of the project are completely open source and freely redistributable.

Installation
=======

Installation is easy.  Just throw the entire directory into your site's root directory or any subdirectory and edit the settings.php file using the instructions in the file.  Make sure you also include the .htaccess file!

Site requirements are another concern.  Not all webhosts support beautified URLs, but most do!  I have included a way to disable that feature in the settings.php file.

Current state
=======
Version: 0.0.5 (non-functional)
Maintainer: Josh Maines

Project is new and meant to show my ability to understand design patterns and security concepts.  It is far from functional but will progress quickly on my days off from work.  I want this project to be useful for everyone, so make sure you post a feature request if what you want is not already listed.  I would also love to hear about any similar projects out there.  If you like my work, please consider donating to my GitTip fund at http://www.gittip.com/joshm or consider hiring me for a project.