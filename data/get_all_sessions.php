<?php

function _get_all_sessions($studyId="1234",$studyPeriodId="1",$debugState=true) {
	require 'config_files.php';
//require 'db_utils.php';
//require 'int_debug.php';
	
	$link = @mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE_NAME);

	$queryString = 'SELECT * FROM `study_periods` WHERE 1';

	$result = @mysqli_query ($link, $queryString);
	
	return $result;
}

_get_all_sessions();

function _get_all_sessions_by_studyId($studyId="1234",$studyPeriodId="1",$debugState=true) {
	require 'config_files.php';
//require 'db_utils.php';
//require 'int_debug.php';
	
	$link = @mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE_NAME);

	$queryString = 'SELECT * FROM `study_periods` WHERE studyId ='+$studyId;

	$result = @mysqli_query ($link, $queryString);

	return $result;
}

_get_all_sessions();

?>