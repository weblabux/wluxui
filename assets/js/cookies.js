// JavaScript Document
function createCookie(name,value,days) {
	if (days) {
		var date = new Date();
		date.setTime(date.getTime()+(days*24*60*60*1000));
		var expires = "; expires="+date.toGMTString();
	}
	else var expires = "";
	document.cookie = name+"="+value+expires+"; path=/";
}

/*
	This function formats the data field to send in the command
*/
function formSignInBuffer (username, password) {
	this.username = username;
	this.password = password;
	return this;
}

function signIn (username, password) {
	this.signIn = new formSignInBuffer (username, password);
	return this;
}

function signInBtnClick () {
	var signInUrl = '/wluxui/data/signin.php';
	var buffer = new signIn ($('#formUsername').val(), 
							 $('#formPassword').val());
	
	var postResponse = $.post(signInUrl, buffer);
	
	// if the response comes back let the user know.
	postResponse.done( function(response) {
		if (response.data != null) {
			// user is authorized so...
			// * save token in cookie
			createCookie ('weblabuxToken', response.data.token, 0);
			// * reload the home page
			window.location.href = '/wluxui/index.php';
			// for now, we'll just show a message
			// alert ('worked!');
		}
		if (response.error) {
			// user is not athorized so...
			// * display error message
			// for now, we'll just show a message
			window.location.href = '/wluxui/loginerror.php';
		}
	});
}

function signoutClick(){
	document.cookie = "weblabuxToken=;expires=Thu, 01 Jan 1970 00:00:01 GMT; path=/";
    document.cookie = "weblabuxUsername=;expires=Thu, 01 Jan 1970 00:00:01 GMT;path = /";
    window.location.href = '/wluxui/index.php';
}

