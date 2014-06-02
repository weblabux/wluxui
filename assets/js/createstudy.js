(function() {

window.onload = function () {
	if (document.getElementById('new_session')) {
		document.getElementById('new_session').onclick = function() {showform("session");};
		document.getElementById('new_session').onmouseover = handcursor;
	}
	
	if (document.getElementById('new_variable')) {
		document.getElementById('new_variable').onclick = function() {showform("variable");};
		document.getElementById('new_variable').onmouseover = handcursor;
	}
};

function showform(id) {
	var newform = document.getElementById(id);
	if (newform.style.display == "none") {
		newform.style.display="block";
	} else {
		newform.style.display="none";
	}
}

function handcursor() {
	this.style.cursor="pointer";
}

})();