<?php

/* require files for each command that supports this method */
require 'account_post_user.php';
require 'account_post_changepassword.php';

function _account_post($link, $postData) {
	$debugState = int_GetDebug($link, 'account', 'POST');
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
		$response = _account_post_config ($link, $requestBuffer, $debugState);
		$actionTaken = true;
    } 
	*/
	$action = 'user';
	if (!$actionTaken && (!empty($postData[$action]))) {
		$requestBuffer = $postData[$action];
		$response = _account_post_user ($link, $requestBuffer, $debugState);
		$actionTaken = true;
    }
	$action = 'changePassword';
	if (!$actionTaken && (!empty($postData[$action]))) {
		$requestBuffer = $postData[$action];
		$response = _account_post_changepassword ($link, $requestBuffer, $debugState);
		$actionTaken = true;
    }
	if (!$actionTaken) {
		$thisFile = __FILE__;
		require 'response_501.php';
	}
	
	return $response;
}
?>