<?php

/* Returns real data from the database so just ignore Bob's
 * comments below. :) 4/2/2014 Modified by Mark Stamnes Winter 2014*/
require 'data/study_get_general.php';

function studiesGetAll() {
	//  this is the array into which we'll put the data we get from the database
	$returnValue = array();
	// call the data base function
	$studyBuffer = _study_get_general (null, null, '', true);
	if (!empty($studyBuffer['data'])) {
		foreach ($studyBuffer['data'] as $row) {
			$newStudy = new Study($row['studyStatus'], 
					$row['studyName'], 
					$row['researcherEmail'],
					$row['studyDescription'],
					date("Y-m-d",strtotime($row['dateCreated'])),
					$row['dateModified'],
					$row['studyId']);
			// Lets push this record on to our array 
			array_push($returnValue, $newStudy);
		}
	} else {
		// return the error buffer when debugging
		/*
		if (!empty($studyBuffer['error'])) {
			$returnValue = $studyBuffer['error'];
		}
		*/
		// return the empty array buffer
	}
	// Return the data structure
	return $returnValue;
}
?>