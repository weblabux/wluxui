<?php

/* Returns real data from the database so just ignore Bob's
 * comments below. :) 4/2/2014 Modified by Mark Stamnes Winter 2014*/

function studiesGetAll() {

	require 'data/get_all_studies.php';
	
	// Lets call the _get_all_studies function which lives in the
	// wlux_web_services/web/data folder (see require above)
	// ** for now this just retrieves all the studies...
	// ** will change and grow as we move forward
	return _get_all_studies();

}
?>