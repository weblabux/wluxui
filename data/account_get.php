<?php

/* require files for each command that supports this method */
require 'account_get_user.php';

function _account_get($link, $postData) {
	$debugState = int_GetDebug($link, 'account', 'GET');
	if ($debugState) {
		$response['debug']['module'] = __FILE__;
		$response['debug']['postData'] = $postData;
	}
	$actionTaken = false;
	/*
	* Repeat for each command that supports this method.
	*  only one method allowed per call.
	* 1. define $action to the the command
	* 2. Test for that command
	* 3. if true, call the function that performs the command
	$action = 'config';
	if (!$actionTaken && (!empty($postData[$action]))) {
		$requestBuffer = $postData[$action];
		$response = _account_get_config ($link, $requestBuffer);
		$actionTaken = true;
    } 
	*/
	$action = 'user';
	if (!$actionTaken && (!empty($postData[$action]))) {
		$requestBuffer = $postData[$action];
		$response = _account_get_user ($link, $requestBuffer, $debugState);
		$actionTaken = true;
    }
	if (!$actionTaken) {
		$thisFile = __FILE__;
		require 'response_501.php';
	}

	return $response;
}
?>