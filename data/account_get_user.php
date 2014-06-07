<?php
function _account_get_user ($link, $requestBuffer, $debugState) {
require 'db_utils.php';
require 'int_auth.php';
	$response = '';
	// test again to see if we have a good data base link 
	//  in case we didn't have one on entry and couldn't get one
	//  from the preceding code
		// initialize the debug values
	if ($debugState) {
		$response['debug']['module'] = __FILE__;
		$response['debug']['requestBuffer'] = $requestBuffer;
		$response['debug']['link'] = $link;		
	}
	if (!is_null($link)) {
		$authInfo = authorize_user ($link);
		if ($debugState) {
			$response['debug']['auth'] = $authInfo;
		}
		// TODO: Replace "TRUE" with the authorization check required for this call
		if (true) {		
			// this is where the actual function goes
			
			// not implemented
			$errData = get_error_message ($link, 501);
			$response['error'] = $errData;
		}
	} 
	// else $response already has an error valur	
	return $response;
}
?>