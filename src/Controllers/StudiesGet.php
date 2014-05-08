<?php

/* Returns real data from the database so just ignore Bob's
 * comments below. :) 4/2/2014 Modified by Mark Stamnes Winter 2014*/
require 'data/get_all_studies.php';

function studiesGetAll() {

	// Lets make an empty array-------------------------------------
	$array = array();

	// Lets call the _get_all_studies function which lives in the
	// wlux_web_services/web/data folder (see require above)
	// ** for now this just retrieves all the studies...
	// ** will change and grow as we move forward
	$result = _get_all_studies();

	// Lets process the results of the get all studies call
	// ** I modified the Study class constructor to take study status, 
	// ** researchers email, study name and study description
	
	while ($row = mysqli_fetch_array($result)) { // While we still have rows

		// Lets make a new study
		$newStudy = new Study($row['studyStatus'], 
		$row['studyName'], 
		$row['researcherEmail'],
		$row['studyDescription'],
		date("Y-m-d",strtotime($row['dateCreated'])),
		$row['dateModified'],
		$row['studyId']);


		// Lets push it on to our array ($array)
		array_push($array, $newStudy);
		
		// In case we get errors lets use these for screen dumps of our data
		//var_dump($newStudy);
		//var_dump($array);
	}
	
	// Lets return our array
	return $array;

	//Bob's old comments and code
	// fast and bogus consruction of all studies.
	// in reality, this would query the server and create an array of studies
	// that are far more descriptive than this (requires extending Model/Study.php)

	// array(
	// new Study('Navigation Study', '/wluxui/index.php/allstudies/#'),
	// new Study('Headings Study', '/wluxui/index.php/allstudies/#'),
	// new Study('Previewing Study', '/wluxui/index.php/allstudies/#'),
	// new Study('API Study', '/wluxui/index.php/allstudies/#'),
	// new Study('Layout Study', '/wluxui/index.php/allstudies/#'),
	// );
}
?>