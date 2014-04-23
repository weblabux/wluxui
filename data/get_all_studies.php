<?php
/*Modified by Mark Stamnes - These functions are bare bones */
/* Returns all studies in the study_general table */

function _get_all_studies($link="", $authInfo="", $logData="", $debugState=true) {
require 'config_files.php';
//require 'db_utils.php';
//require 'int_debug.php';
	
	$link = @mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE_NAME);
	
	$response = '';
	
	if ($debugState) {
		$response['debug']['module'] = __FILE__;
		$response['debug']['postData'] = $link;
		$response['debug']['auth'] = '$authInfo';
	}
	

	$queryString = 'SELECT * FROM `study_general` WHERE 1';
	$result = @mysqli_query($link, $queryString);

	mysqli_close($link);
	return $result;
}


_get_all_studies();
?>
