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
/* require files for each command that supports this method */
require 'study_get_allstudyids.php';
require 'study_get_config.php';
require 'study_get_general.php';
require 'study_get_name.php';
require 'study_get_measure.php';
require 'study_get_period.php';
require 'study_get_step.php';
require 'study_get_variable.php';
require 'study_get_variation.php';

function _study_get($link, $postData) {
	$debugState = int_GetDebug($link, 'study', 'GET');
	if ($debugState) {
		$response['debug']['module'] = __FILE__;
		$response['debug']['postData'] = $postData;
		$response['debug']['link'] = $link;				
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
		$response = _study_get_config ($link, $requestBuffer, $debugState);
		$actionTaken = true;
    } 
	*/
	$action = 'general';
	if (!$actionTaken && (!empty($postData[$action]))) {
		$requestBuffer = $postData[$action];
		$response = _study_get_general ($link, $requestBuffer, $debugState);
		$actionTaken = true;
    } 
	$action = 'period';
	if (!$actionTaken && (!empty($postData[$action]))) {
		$requestBuffer = $postData[$action];
		$response = _study_get_period($link, $requestBuffer, $debugState);
		$actionTaken = true;
    } 	
	// these are still stubbed.
	//  TODO: Move each code block from below to above this comment after
	//    adding the functionality to the function it calls
	$action = 'allStudyIds';
	if (!$actionTaken && (!empty($postData[$action]))) {
		$requestBuffer = $postData[$action];
		$response = _study_get_allstudyids ($link, $requestBuffer, $debugState);
		$actionTaken = true;
    } 
	$action = 'config';
	if (!$actionTaken && (!empty($postData[$action]))) {
		$requestBuffer = $postData[$action];
		$response = _study_get_config ($link, $requestBuffer, $debugState);
		$actionTaken = true;
    } 
	$action = 'measure';
	if (!$actionTaken && (!empty($postData[$action]))) {
		$requestBuffer = $postData[$action];
		$response = _study_get_measure ($link, $requestBuffer, $debugState);
		$actionTaken = true;
    } 
	$action = 'name';
	if (!$actionTaken && (!empty($postData[$action]))) {
		$requestBuffer = $postData[$action];
		$response = _study_get_name ($link, $requestBuffer, $debugState);
		$actionTaken = true;
    } 
	$action = 'step';
	if (!$actionTaken && (!empty($postData[$action]))) {
		$requestBuffer = $postData[$action];
		$response = _study_get_step  ($link, $requestBuffer, $debugState);
		$actionTaken = true;
    } 
	$action = 'variable';
	if (!$actionTaken && (!empty($postData[$action]))) {
		$requestBuffer = $postData[$action];
		$response = _study_get_variable ($link, $requestBuffer, $debugState);
		$actionTaken = true;
    } 
	$action = 'variation';
	if (!$actionTaken && (!empty($postData[$action]))) {
		$requestBuffer = $postData[$action];
		$response = _study_get_variation ($link, $requestBuffer, $debugState);
		$actionTaken = true;
    } 
	if (!$actionTaken) {
		$thisFile = __FILE__;
		require 'response_501.php';
	}

	return $response;
}
?>