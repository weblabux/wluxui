# WLUXUI #
----------


[April 2, 2014] The back-end code from wlux_web_server has been moved to this project. The code in the wlux_web_server repo is now obsolete and won't be updated any more.
 
To map this repo on your local dev machine, see this illustration at: ![diagram showing how to map github repos to web server.](https://github.com/weblabux/wluxui/blob/master/extras/documentation/WebSiteFolderMap.png?raw=true)

**Folders**
The folders this repo contain the following:

* **data** = the files that provide the database access and web service
* **common** = client-side files that WebLabUx uses for its data collection
* **demo** = server-side files used to test and demonstrate features
* **extras** = additional subdirectories used by the project but that will (should) not appear on the production web-server:
	* **config\_and\_init** = the files used to initialize the database and provide starter data
	* **documentation** = documentation and specification files (although not every documentation and specification file
	* **test** = unit and regression test scripts (which currently run only on a PC)

# Calling the database interfaces #
-----

The WebLabuX configuration and session data can be queried two ways:
* HTTP requests (for AJAX and other remote clients)
* PHP function calls (for modules on the server)

## Accessing data by making HTTP requests ##

The HTTP interface returns JSON formatted objects in the response buffer. The JSON object contains these sub objects:

* __data__ - when successful, the requested data as an array of one or more objects
* __error__ - when not successful, information about the error
* __debug__ - debug information--only when debug output is enabled

## Accessing the data from server modules ##

Modules running on the server can call the modules that access the database directly and save an external HTTP request. The calling module must open a link to the database that is specific to the module making the call (don't use generic variable names for this link!!!) and must also close the database link when finished. The module returns a PHP objec taht contains these sub objects:

* __data__ - when successful, the requested data as an array of one or more objects
* __error__ - when not successful, information about the error
* __debug__ - debug information--only when debug output is enabled


Refer to the diagram for more information. ![diagram showing how access the data modules](https://github.com/weblabux/wluxui/blob/master/extras/documentation/DataNamingConvention.png?raw=true)