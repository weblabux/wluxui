<?php

/*Modified by Mark Stamnes - These functions are bare bones */
/* Returns all studies in the study_general table */

//$studyID cannot be empty
function _get_study($studyId="1234", $link=NULL, $authInfo=NULL, $logData=NULL, $debugState=true) {
	
require 'config_files.php';
//require 'db_utils.php';
//require 'int_debug.php';
	
	//Eventually this link will be passed in
	$link = @mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE_NAME);
	
	//Set up empty respoinse buffer
	$response = '';
	
	//Set back up the debug logging (obviously not wired to anything at the moment)
	if ($debugState) {
		$response['debug']['module'] = __FILE__;
		$response['debug']['postData'] = $link;
		$response['debug']['auth'] = '$authInfo';
	}
	
	//Set up and call the query
	$queryString = 'SELECT * FROM `study_general` WHERE studyId = '.$studyId;
	$result = @mysqli_query($link, $queryString);

	//Close the connection
	mysqli_close($link);
	
	//Return the result
	return $result;
}

?>
