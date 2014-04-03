<?php

/* Returns all studies in the study_general table */
function _get_all_studies() {
	require 'config_files.php';
	//require 'db_utils.php';
	$link = @mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE_NAME);

	$queryString = 'SELECT * FROM `study_general` WHERE 1';
	$result = @mysqli_query($link, $queryString);

	mysqli_close($link);
	return ($result);
}

/* Rturns all studies in the study_general table takes $ownerId*/
function _get_all_studies2($ownerId) {
	require 'config_files.php';
	//require 'db_utils.php';
	$link = @mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE_NAME);

	$queryString = 'SELECT * FROM `study_general` WHERE ownerId = ' . $ownerId;
	$result = @mysqli_query($link, $queryString);

	mysqli_close($link);
}

/* Returns single from the study_general table takes studyId*/
function _get_all_sessions($studyId) {
	require 'config_files.php';
	//require 'db_utils.php';
	$link = @mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE_NAME);

	$queryString = 'SELECT * FROM `study_general` WHERE studyID = ' . $studyId;
	$result = @mysqli_query($link, $queryString);
	return ($result);
	echo '<html>';

	mysqli_close($link);
}

_get_all_studies();
?>
