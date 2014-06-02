<?php

/*Modified by Mark Stamnes - These functions are bare bones */
/* Returns all studies in the study_general table */

//$studyID cannot be empty
function _get_study($studyId = "1234", $link = NULL, $authInfo = NULL, $logData = NULL, $debugState = true) {

	require 'config_files.php';

	//Create empty study buffer
	$study = '';

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
	$queryString = 'SELECT * FROM `study_general` WHERE studyId = ' . $studyId;
	
	$result = @mysqli_query($link, $queryString);

	// Lets process the results of the get study call
	// ** I modified the Study class constructor to take study status,
	// ** researchers email, study name and study description
	while ($row = mysqli_fetch_array($result)) {// We only have one row but this works to pull it out

		// Lets make a new study
		$study = new Study($row['studyStatus'], $row['studyName'], $row['researcherEmail'], $row['studyDescription'], date("Y-m-d", strtotime($row['dateCreated'])), $row['dateModified'], $row['studyId']);
	}
	
	//Close the connection
	mysqli_close($link);

	// Lets return our single study
	return $study;
	
}
?>
