<?php

/* 
 * 	Queries the general information from all studies and formats 
 * 		the response for the AllStudies page as a PHP array of 
 *		"Study" objects.
 */
require 'data/config_files.php';
require 'data/study_get_general.php';

function studiesGetAll() {
	//  this is the array into which we'll put the Studies we get from the database
	$returnValue = array();
	// open the database link for this call that is specific to this modules
	$linkGeneral = @mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE_NAME);
	if ($linkGeneral) {
		$requestBuffer = '';
		// call the database function
		$studyBuffer = _study_get_general ($linkGeneral, $requestBuffer, true);
		// if we got data back, then format it for the UI	
		if (!empty($studyBuffer['data'])) {
			foreach ($studyBuffer['data'] as $row) {
				$newStudy = new Study($row['studyStatus'], 
						$row['studyName'], 
						$row['researcherEmail'],
						$row['studyDescription'],
						date("Y-m-d",strtotime($row['dateCreated'])),
						$row['dateModified'],
						$row['studyId']);
				// Add this study object to the return object
				array_push($returnValue, $newStudy);
			}
		} else {
			// no data returned, so 
			// return the error buffer when debugging
			//  TODO: Handle authentication errors
			/*
			if (!empty($studyBuffer['error'])) {
				$returnValue = $studyBuffer['error'];
			}
			*/
			// Normally, just return the empty array buffer if an 
			//  error is encountered.
			//  TODO: Is this the best idea? 
		}
		// close DB link
		@mysqli_close($linkGeneral);
	} else {
		// unable to open database link
	}
	// Return the object
	return $returnValue;
}
?>