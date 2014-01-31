<?php

/*
 *  Fast placeholder until a real set of functions are written...
 */ 

function studiesGetAll() {
	// fast and bogus consruction of all studies.
	// in reality, this would query the server and create an array of studies
	// that are far more descriptive than this (requires extending Model/Study.php)
    return array(
        new Study('Navigation Study', '/wluxui/index.php/allstudies/#'),
        new Study('Headings Study', '/wluxui/index.php/allstudies/#'),
        new Study('Previewing Study', '/wluxui/index.php/allstudies/#'),
        new Study('API Study', '/wluxui/index.php/allstudies/#'),
        new Study('Layout Study', '/wluxui/index.php/allstudies/#'),
        );
}