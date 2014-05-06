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
  *   Enable debug mode on PHP instances that are not configured that way by default
  */

// see if this is being called by a broweser on the same system as the server
$test_server = $_SERVER['SERVER_NAME'] == "127.0.0.1" || $_SERVER['SERVER_NAME'] == "localhost" || substr($_SERVER['SERVER_NAME'],0,3) == "192";

// set the error level to show errors when running a browser on the server.
ini_set('display_errors',$test_server);
error_reporting(E_ALL|E_STRICT);  
 
function int_GetDebug($link, $moduleName, $methodName)
{
	//everything is debug mode for now.
	// we'll check the database and return the actual status later
	return true;
}
?>