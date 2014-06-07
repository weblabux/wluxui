<?php
/*
 *  The MIT License (MIT)
 *  
 *  Copyright (c) 2014 Internet-Based User Experience Lab, HCDE, University at Washington
 *  
 *  Permission is hereby granted, free of charge, to any person obtaining a copy
 *  of this software and associated documentation files (the "Software"), to deal
 *  in the Software without restriction, including without limitation the rights
 *  to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 *  copies of the Software, and to permit persons to whom the Software is
 *  furnished to do so, subject to the following conditions:
 *  
 *  The above copyright notice and this permission notice shall be included in
 *  all copies or substantial portions of the Software.
 *  
 *  THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 *  IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 *  FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 *  AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 *  LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 *  OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 *  THE SOFTWARE.
 */
function _study_get_config ($link, $requestBuffer, $debugState) {
require 'db_utils.php';
require 'int_auth.php';
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