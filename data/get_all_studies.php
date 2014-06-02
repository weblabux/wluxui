<?php
/*Modified by Mark Stamnes - These functions are bare bones */
/* Returns all studies in the study_general table */

function _get_all_studies($link = NULL, $authInfo = NULL, $logData = NULL, $debugState = true) {

	require 'config_files.php';

	//Set up empty array buffer
	$array = array();

	//Will eventually be passed in
	$link = @mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE_NAME);

	//Set up empty debug response buffer
	$response = '';

	//Are we debugging?
	if ($debugState) {
		$response['debug']['module'] = __FILE__;
		$response['debug']['postData'] = $link;
		$response['debug']['auth'] = '$authInfo';
	}

	//Set up query string
	$queryString = 'SELECT * FROM `study_general` WHERE 1';

	//Call database
	$result = @mysqli_query($link, $queryString);

	// ** I modified the Study class constructor to take study status,
	// ** researchers email, study name and study description

	while ($row = mysqli_fetch_array($result)) {// While we still have rows

		// Lets make a new study
		$newStudy = new Study($row['studyStatus'], $row['studyName'], $row['researcherEmail'], $row['studyDescription'], date("Y-m-d", strtotime($row['dateCreated'])), $row['dateModified'], $row['studyId']);

		// Lets push it on to our array ($array)
		array_push($array, $newStudy);

		// In case we get errors lets use these for screen dumps of our data
		//var_dump($newStudy);
		//var_dump($array);
	}

	mysqli_close($link);

	return $array;
}
?>
