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
 
require __DIR__.'/vendor/autoload.php';
require __DIR__.'/src/Models/Study.php';
require __DIR__.'/src/Controllers/StudiesGet.php';

/*
 * Within WebLabUX, every user-facing page (for the researcher) is rendered using Twig templates. 
 * The UI loop for researcher-facing WebLabUX is contained within this index.php file, and specific
 * are selected.
 */

/* create a Symfony Request, used only to help make each URL render a different Twig template */
/* See more at API reference documentation: http://api.symfony.com/2.4/index.html  */
use Symfony\Component\HttpFoundation\Request;
$request = Request::createFromGlobals();
$uri = $request->getPathInfo();

/*
 * If we decide to define a restful style set of UI<->controller mappings, we would want
 * to come up with the routing convensions (rails convension is now the most common), and 
 * explode the $uri to grab the the verbs and nouns within the path. This would require
 * fleshing out the routing branch-case statement or writing controller functions...
 * 
 * $uriarray = explode('/', $uri);   
 * $uripath = "/" . $uriarray[1];   
 * ...etc for getting the rest of the pieces of the request within the path...
 */

/* bootstrap Twig templating system */
$loader = new Twig_Loader_Filesystem(__DIR__.'/templates');
$twig = new Twig_Environment($loader, array(
    'cache' => false,    // !! for development only
    'debug' => true,     // !! for development only
    'strict_variables' => true
));
$twig->addExtension(new Twig_Extension_Debug());

/*
 *   THIS FAST AND DIRTY DEBUG SWITCH EXISTS ONLY UNTIL WE HAVE AUTHENTICATION FOR USER LOGIN. 
 *   HARD CODE THIS SWITCH APPROPRIATELY FOR YOUR NEEDS. ALTERNATIVELY, EXTEND OR REPLACE AS YOU 
 *   WISH TO SERVE YOUR TEAM'S NEEDED WHILE DEVELOPING. 
 *
 *   THIS WILL NEED TO BE RIPPED OUT AND REPLACED WITH WHATEVER MECHANISM WE ARE USING FOR AUTH... 
 */
//$loggedin = true;
$loggedin = false;

/* 
 * MAIN UI BRANCH & SWITCH 
 */

if ($loggedin) {        // Render dynamic pages for research who is logged into WebLabUX
                        // Pass any necessary data to the template -OR- have the switch's case
                        // statement call a function that acts as a controller for the page. 
    switch ($uri) {
        case '/':
        case '/allstudies':
            echo $twig->render('dynamicpages/allstudies.twig', array(     
                'pageData' => array(
                    'title' => 'WebLabUX - All Studies',
                ),
                'studies' => studiesGetAll(),
            ));
            break;

        // Bad dynamic page URI - or unimplimented feature!
        // This is fast placeholder -- this really needs to be made far more robust! 
        default:
            echo $twig->render('dynamicpages/notfound.twig', array(
                'pageData' => array(
                    'title' =>  'Feature not yet implemented: ' . $uri,
                ),
            ));
    }

}
else {                  // Render static pages for someone who is not logged into WebLabUX
                        // Right now the code is only passing a title to the template but 
                        // other variables could be constructed and passed in. 
    switch ($uri) {
        case '/':
            echo $twig->render('staticpages/homepage.twig', array(     
                'pageData' => array(
                    'title' => 'WebLabUX',
                ),
            ));
            break;

        case '/about':
            echo $twig->render('staticpages/about.twig', array(     
                'pageData' => array(
                    'title' => 'About WebLabUX',
                ),
            ));
            break;

        case '/howitworks':
            echo $twig->render('staticpages/howitworks.twig', array(
                'pageData' => array(
                    'title' => 'How WebLabUX Works',
                ),
            ));
            break;

        case '/tutorials':
            echo $twig->render('staticpages/tutorials.twig', array(
                'pageData' => array(
                    'title' => 'WebLabUX Tutorial',
                ),
            ));
            break;

        case '/error':
            echo $twig->render('staticpages/error.twig', array(
                'pageData' => array(
                    'title' => 'WebLabUX',
                ),
            ));
            break;

        // Bad static page URI - treat this as if a 404
        // This is fast placeholder -- this  really needs to be made far more robust!
        default:
            echo $twig->render('staticpages/notfound.twig', array(
                'pageData' => array(
                    'title' =>  'Page not found = ' . $uri,
                ),
            ));
    }
}

