<?php

/* Returns real data from the database so just ignore Bob's
 * comments below. :) 5/20/2014 Modified by Mark Stamnes Winter 2014*/

function studyGet($studyId="1234") {
	
require 'data/get_study.php';

	// Lets call the _get_study function which lives in the
	// wlux_web_services/web/data folder (see require above)
	$result = _get_study($studyId);

	// Lets process the results of the get study call
	// ** I modified the Study class constructor to take study status, 
	// ** researchers email, study name and study description
		while ($row = mysqli_fetch_array($result)) { // We only have one row but this works to pull it out

		// Lets make a new study
		$study = new Study($row['studyStatus'], 
		$row['studyName'], 
		$row['researcherEmail'],
		$row['studyDescription'],
		date("Y-m-d",strtotime($row['dateCreated'])),
		$row['dateModified'],
		$row['studyId']);
 	}
	
	// Lets return our single study
	return $study;;
}
?>