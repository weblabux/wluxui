<?php

/* Returns real data from the database so just ignore Bob's
 * comments below. :) 5/20/2014 Modified by Mark Stamnes Winter 2014*/

function studyGet($studyId = "1234") {

	require 'data/get_study.php';

	// Call and return study by studyId
	return _get_study($studyId);

}
?>