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
/* 
 *  initialize the response buffer and  database links
 *   in case they haven't been opened, yet
 *	
 *	Expects:
 *		$link - possible DB link
 *		$authInfo - possible authorization info block
 *
 *	Creates or initilizes:
 *		$link - a valid DB link
 *		$authInfo - a valid authorization info block
 *		$response - an initialized response buffer 
 *						or a response buffer with an error message
 *
 */
if (!defined('WLUX_INC_DB_CHECK')) {
	define('WLUX_INC_DB_CHECK', 'wlux_inc_db_check', false);
require 'config_files.php';
require 'int_auth.php';

	$response = '';
	if (is_null($link)) {
		// the database has not been initialized, so try (again)
		$link = @mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE_NAME);
		if (!$link) {
			// no luck, so return a server error
			require 'response_500_db_open_error.php';
		} else {
			// we just got access to the database so 
			//  get any other information we might be missing
			//  we don't check the debug state, but we will check the 
			//  authorization if it wasn't provided
			if (is_null($authInfo)) {
				$authInfo = authorize_user ($link);
				if (is_null($authInfo)) {
					$authInfo['access'] = $AUTH_NOT_AUTHORIZED;
				}
			}
			// there should be a value in $authInfo here
		}
	}
}
?>