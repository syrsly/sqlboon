<?php

/* libraries/admin.php May 8, 2014.
	Contains admin page model functions for use in admin pages. */

	if (!defined('IN_BOON')) {
		header('HTTP/1.1 404 Not Found', 404);
		return;
	}

//This function lists all of the backup files which have been saved
//RETURNS $backuplist string which contains HTML mark-up to be placed inside the page view.
function listbackups($listStyle="full") {
	global $settings;
	
	$dir = $settings['backupfolder'];
	$backuplist = '';
	
	if ($listStyle == "full") {
		$backuplist .= '<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/jquery-ui.js"></script>
		<script type="text/javascript" src="js/accordion.js"></script>';
	}
	$backuplist .= '<div id="backuplist">';
	
	foreach($settings['quickbackup']['friendlyname'] as $key => $val)
	{
	
		//Create an array to hold directory list.
    	$results = array();

    	//Create a temporary filesystem handler, $fstemp, for the directory of the site's backup files.
    	$fstemp = opendir($dir.'/'.$key.'/');

    	//Keep going until all files in directory have been read.
    	while ($file = readdir($fstemp)) {

        //If $file isn't this directory or its parent add it to the results array
		if ($file != '.' && $file != '..')
			$results[] = $file;
		}

	//Close the handler
    closedir($fstemp);
      	
		if($results)
		{
		$backuplist .= '<div class="section">';
		$backuplist .= '<h3>Backups for '.$settings['sites']['name'][$key].'</h3>';
		$backuplist .= '<div class="section-content">';
		$backuplist .= '<table border="0" class="backuplisttable">';
		$backuplist .= '<tr>';
		$backuplist .= '<td class="backupitemheader">Filename</td>';
		$backuplist .= '<td class="backupitemheader">Timestamp</td>';
		$backuplist .= '<td class="backupitemheader">Filesize</td>';
		$backuplist .= '<td class="backupitemheader">Actions</td>';
		$backuplist .= '</tr>';
		
		foreach(array_reverse($results) as $result)
		{
		list($timestamp) = explode('-',$result);
  		
		$backuplist .= '<tr>';
		$backuplist .= '<td class="backupitem">'.$result.'</td>';
		$backuplist .= '<td class="backupitem">'.format_timestamp($timestamp,3).'</td>';
		$backuplist .= '<td class="backupitem">'.returnFilesize(filesize($settings['backupfolder'].'/'.$key.'/'.$result)).'</td>';
		$backuplist .= '<td class="backupitem"><a href="?fct=deletebackup&id='.$key.'&filename='.$result.'"><img src="images/delete.png" alt="Delete Backup File" title="Delete Backup File" class="adminicon" /></a>';
		$backuplist .= '<a href="?fct=restore&filename='.$settings['backupfolder'].'/'.$key.'/'.$result.'&database='.$key.'"><img src="images/restore.png" alt="Restore this Backup" title="Restore this Backup" class="adminicon" /></a>';
		$backuplist .= '<a href="'.$settings['backupfolder'].'/'.$key.'/'.$result.'"><img src="images/disk.png" alt="Save To Disk" title="Save To Disk" class="adminicon" /></a>';
		$backuplist .= '</td>';
		$backuplist .= '</tr>';
		}

		$backuplist .= '<tr><td><p><img src="images/folder_delete.png" alt="Purge backup files" class="adminicon" /><a href="?fct=purge&folder='.$settings['backupfolder'].'/'.$key.'/&id='.$key.'" class="purgelink">Purge Backup Files</a>';
		$backuplist .= '<img src="images/folder_add.png" alt="Upload backup file" class="adminicon" /><a href="?fct=uploadbackup&folder='.$settings['backupfolder'].'/'.$key.'/&id='.$key.'" class="purgelink">Upload Backup File</a></p></td></tr>';
		$backuplist .= '</table>';
		$backuplist .= '</div></div>';  
	}
		else
		{
		$backuplist .= '<div class="section">';
		$backuplist .= '<h2>Backups for '.$settings['quickbackup']['name'][$key].'</h2>';
		$backuplist .= '<div class="section-content">';
		$backuplist .= '<div class="informationtext">There are no Quick Backups to list</div>';	
		$backuplist .= '</div></div>';		
		}
	}
	
	if(count(glob("$dir/manualbackups/*")) === 0)
	{
	$backuplist .= '<div class="section">';
	$backuplist .= '<h2>Manual backups</h2>';
	$backuplist .= '<div class="section-content">';
	$backuplist .= '<div class="informationtext">There are no Manual Backups to list</div>';	
	$backuplist .= '</div></div>';	
	}
	else
	{
	//Create an array to hold directory list
    $manualresults = array();

    //Create a handler for the directory
    $fstemp = opendir($dir.'/manualbackups/');

    //Keep going until all files in directory have been read
    while ($file = readdir($fstemp)) {

    //Iif $file isn't this directory or its parent add it to the results array
    if ($file != '.' && $file != '..')
    $manualresults[] = $file;	
	}
	
	if($manualresults)
	{
		$backuplist .= '<div class="section">';
		$backuplist .= '<h2>Manual Backups</h2>';
		$backuplist .= '<div class="section-content">';
		$backuplist .= '<table border="0" class="backuplisttable">';
		$backuplist .= '<tr>';
		$backuplist .= '<td class="backupitemheader">Filename</td>';
		$backuplist .= '<td class="backupitemheader">Timestamp</td>';
		$backuplist .= '<td class="backupitemheader">Actions</td>';
		$backuplist .= '</tr>';
		
		foreach(array_reverse($manualresults) as $manualresult)
		{
		list($timestamp) = explode('-',$manualresult);
  		
		$backuplist .= '<tr>';
		$backuplist .= '<td class="backupitem">'.$manualresult.'</td>';
		$backuplist .= '<td class="backupitem">'.format_timestamp($timestamp,3).'</td>';
		$backuplist .= '<td class="backupitem"><a href="?fct=deletebackup&id=m&filename='.$manualresult.'"><img src="images/delete.png" alt="Delete Backup File" title="Delete Backup File" class="adminicon" /></a>';
		$backuplist .= '<a href="?fct=restore&filename='.$settings['backupfolder'].'/manualbackups/'.$manualresult.'"><img src="images/restore.png" alt="Restore this Backup" title="Restore this Backup" class="adminicon" /></a>';
		$backuplist .= '<a href="'.$settings['backupfolder'].'/manualbackups/'.$manualresult.'"><img src="images/disk.png" alt="Save To Disk" title="Save To Disk" class="adminicon" /></a>';
		$backuplist .= '</td>';
		$backuplist .= '</tr>';
		}
		
		$backuplist .= '<tr><td><p><img src="images/folder_delete.png" alt="Purge backup files" class="adminicon" /><a href="?fct=purge&folder='.$settings['backupfolder'].'/manualbackups/" class="purgelink">Purge Backup Files</a>';
		$backuplist .= '<img src="images/folder_add.png" alt="Upload backup file" class="adminicon" /><a href="?fct=uploadbackup&folder='.$settings['backupfolder'].'/'.$key.'/&id='.$key.'" class="purgelink">Upload Backup File</a></p></td></tr>';
		$backuplist .= '</table>';
		$backuplist .= '</div></div>';  
	}
	}
	
	$backuplist .= '</div>';
	
	//Return string value to view.
	return $backuplist;
}
?>