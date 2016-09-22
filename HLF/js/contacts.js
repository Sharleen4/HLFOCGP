
var outputContacts = function(){
	var xttp = new XMLHttpRequest();

	xttp.onreadystatechange = function(){
		if(xttp.readyState == 4 && xttp.status == 200){
			$("#contacts").html(xttp.responseText);
		}
	}
	xttp.open("GET", "http://localhost/hlf/contacts.php", true);
	xttp.send();
}