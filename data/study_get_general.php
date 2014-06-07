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
function _study_get_general ($link, $authInfo, $logData, $debugState) {
require 'db_utils.php';
require 'inc_db_check.php'; // validates or initializes $link, $authInfo & $response
	// test again to see if we have a good data base link 
	//  in case we didn't have one on entry and couldn't get one
	//  from the preceding code
		// initialize the debug values
	if ($debugState) {
		$response['debug']['module'] = __FILE__;
		$response['debug']['cmdData'] = $logData;
		$response['debug']['auth'] = $authInfo;
	}
	if (!is_null($link)) {
		// this is where the actual function goes
		//   when there's one to use
		
		// TODO: Check authorization required for this call
		
		// TODO: Check the $logData for a study to return. 
		//   for now, we'll get all of them.
		$queryString = 'SELECT * FROM `study_general` WHERE 1';
		
		$result = @mysqli_query($link, $queryString);
		$idx = 0;
		if (mysqli_num_rows($result)  > 0) {
			while ($thisRecord = mysqli_fetch_assoc($result))  {
				$response['data'][$idx] = array_merge($thisRecord);
				foreach ($response['data'][$idx] as $k => $v) {
					// set "null" strings to null values
					if ($v == 'NULL') {
						$response['data'][$k] = NULL;
					}
				}
				$idx += 1;
			}
		}
		if ($idx == 0) {
			$localErr = '';
			$localErr = get_error_message ($link, 404);
			$localErr['info'] = 'No study records found';
			$response['error'] = $localErr;
		}
		if ($debugState) {
			// write detailed sql info
			$localErr = '';
			$localErr['sqlQuery'] = $queryString;
			$localErr['sqlError'] =  mysqli_sqlstate($link);
			$localErr['message'] = mysqli_error($link);				
			$response['debug']['sqlSelect1']= $localErr;
		}
	
		mysqli_close($link);
	} 
	// else $response already has an error valuE
	return $response;
}
?>