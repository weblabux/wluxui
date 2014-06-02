WLUXUI
======

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

