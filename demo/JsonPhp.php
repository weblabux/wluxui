<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PHP to JavaScript Data Object Demo</title>
<script type="text/javascript" src="/wluxui/common/jquery.js"></script>
<script type="text/javascript">
<?php
/*
	Write data from a PHP object into a javascript object 
	so that it can be used on the client after the page
	has been sent to the browser
*/
	// this populates a PHP object with some different values	
	// in a real WebLabUx file, this could be the PHP object returned
	//  by one of the database access modules	
	$data['class']['teacher'] = 'Jan';
	$data['class']['students'] = array('Bob', 'Elisabeth', 'Mark', 'Johnson');
	
	// this writes the object into the script tag so it comes out as 
	//  a JavaScript initialization command for the myData variable
	echo 'var myData = '.json_encode($data, JSON_PRETTY_PRINT).';';

/*
 	This is what it will look like on the client side:
	
	var myData = {
			"class": {
			"teacher": "Jan",
			"students": [
				"Bob",
				"Elisabeth",
				"Mark",
				"Johnson"
				]
			}
		};
 
 */ 

?>

	/*
		This is the JavaScript that is written into the page 
		it looks just the same in the client
	*/
	$(document).ready(function(e) {
		/*
			When the document is ready, use the object that was
			created by the PHP code (on the server) to fill 
			in the page content.
			
			This code creates a big string variable that's filled with 
			the HTML we want to display.
		*/
		var newHtml = '<h1>Our class</h1>';
		// write the teacher's name from the data object
		newHtml = newHtml + '<h2>Teacher: ' + myData.class.teacher + '</h2>';
		if (myData.class.students.length > 0) {
			// write the student heading
			newHtml = newHtml + '<h2>Students:</h2><ul>';
			// for each student in the data object, write their name as a list item
			myData.class.students.forEach (function (value, index, array) {
				newHtml = newHtml + '<li>' + value + '</li>';
			});
			// close up the list tag
			newHtml = newHtml + '</ul>';
		} else {
			// no students to just say that here
			newHtml = newHtml + '<h2>Students: none</h2>';
		}
		// ...and finally write the resulting HTML to the text div
        $('#textDiv').html(newHtml);
    });
</script>
</head>
<body>
<div id="textDiv">
<p>No text yet...</p>
</div>
</body>
</html>