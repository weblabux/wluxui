<?php

function _get_all_sessions($studyId = NULL, $studyPeriodId = NULL, $link = NULL, $debugState = true) {
		
	require 'config_files.php';

	//Set up empty array buffer
	$array = array();

	//This will eventually be passed in
	$link = @mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE_NAME);

	//Set up empty debug response buffer
	$response = '';
	
	//Are we debugging?
	if ($debugState) {
		$response['debug']['module'] = __FILE__;
		$response['debug']['postData'] = $link;
		$response['debug']['auth'] = '$authInfo';
	}
	
	//Since we're pulling all sessions from the table for now'
	$queryString = 'SELECT * FROM `study_periods` WHERE 1';

	$result = @mysqli_query($link, $queryString);

	// Lets process the results of the get all studies call
	// ** I modified the Study class constructor to take study status,
	// ** researchers email, study name and study description

	while ($row = mysqli_fetch_array($result)) {// While we still have rows
		//echo $row['studyId'];

		// Lets make a new study
		$newSession = new Session($row['studyId'], $row['periodName'], $row['periodStartTime'], $row['periodStartTime'], $row['periodEndTime'], 25, 30, 10);

		// Lets push it on to our array ($array)
		array_push($array, $newSession);	
		
	}
	
	//Close the connection
	mysqli_close($link);
	
	return $array;
}

function _get_all_sessions_by_studyId($studyId = NULL, $studyPeriodId = NULL, $link = NULL, $debugState = true) {
	require 'config_files.php';

	//Set up empty array buffer
	$array = array();

	//This will eventually be passed in
	$link = @mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE_NAME);

	//Set up empty response buffer
	$response = '';
	
	//Are we debugging?
	if ($debugState) {
		$response['debug']['module'] = __FILE__;
		$response['debug']['postData'] = $link;
		$response['debug']['auth'] = '$authInfo';
	}
	
	//Since we're pulling all sessions from the table for now'
	$queryString = 'SELECT * FROM `study_periods` WHERE 1';

	$result = @mysqli_query($link, $queryString);

	// Lets process the results of the get all studies call
	// ** I modified the Study class constructor to take study status,
	// ** researchers email, study name and study description

	while ($row = mysqli_fetch_array($result)) {// While we still have rows
		//echo $row['studyId'];

		// Lets make a new study
		$newSession = new Session($row['studyId'], $row['periodName'], $row['periodStartTime'], $row['periodStartTime'], $row['periodEndTime'], 25, 30, 10);

		// Lets push it on to our array ($array)
		array_push($array, $newSession);	
		
	}
	
	mysqli_close($link);
	
	return $array;
}

?>