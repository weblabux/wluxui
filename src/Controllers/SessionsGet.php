<?php

/* 
 * 	Queries the study period information from all studies and formats 
 * 		the response for the AllStudies page as a PHP array of 
 *		"Session" objects.
 *
 *		TODO: rename Session objects to Period 
 */
require 'data/config_files.php';
require 'data/study_get_period.php';

function sessionsGetAll() {
	//  this is the array into which we'll put the study periods we get from the database
	$returnValue = array();
	// open the database link for this call that is specific to this modules
	$linkPeriod = @mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE_NAME);
	if ($linkPeriod) {
		$requestBuffer = '';
		// call the database function
		$periodBuffer = _study_get_period ($linkPeriod, $requestBuffer, true);
		// if we got data back, then format it for the UI	
		if (!empty($periodBuffer['data'])) {
			foreach ($periodBuffer['data'] as $row) {			
				// Lets make a new period record. 
				//  TODO: Change these to be "Period" objects
				$newPeriod = new Session($row['studyId'], 
					$row['periodName'], 
					$row['periodStartTime'], 		
					$row['periodStartTime'], 
					$row['periodEndTime'], 
					25, // hard coded count of active sessions
					30, // hard coded count of completed sessions
					10  // hard coded count of abandoned sessions
					);
				// Add this period's data to the object being returned
				array_push($returnValue, $newPeriod);
			
			}
		} else {
			// no data returned, so 
			// return the error buffer when debugging
			//  TODO: Handle authentication errors			
			/*
			if (!empty($studyBuffer['error'])) {
				$returnValue = $studyBuffer['error'];
			}
			(*/
			// Normally, just return the empty array buffer if an 
			//  error is encountered.
			//  TODO: Is this the best idea? 
		}
		// close DB link
		@mysqli_close($linkPeriod);
	} else {
		// unable to open database link
	}
	return $returnValue;
}
?>