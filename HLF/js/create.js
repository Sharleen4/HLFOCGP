$("#create_btn").click(function(){
	var name = document.forms["create"]["name"].value;
	var surname = document.forms["create"]["surname"].value;
	var email = document.forms["create"]["email"].value;
	var password = CryptoJS.MD5(document.forms["create"]["password"].value);
	var passwordVerif = CryptoJS.MD5(document.forms["create"]["password_very"].value);
	var emailHash = CryptoJS.MD5(email);
	createAccount(name, surname, email, emailHash, password, passwordVerif);

});

var createAccount = function(a,b,c,d,e,f){
	var xttp = new XMLHttpRequest();

	xttp.onreadystatechange = function(){
		if(xttp.readyState === 4 && xttp.status === 200){
			if(xttp.responseText == "done"){
				location.replace("index.php");
			}else{
				alert("Failed to Create Account"+xttp.responseText);
			}
		}
	};
	xttp.open("GET", "http://localhost/hlf/create.php?name="+a+"&surname="+b+"&email="+c+"&emailHash="+d+"&password="+e+"&pass_verif="+f, true);
	xttp.send();

}

$("#login_btn").click(function(){
	var email = document.forms["log"]["email"].value;
	var password = CryptoJS.MD5(document.forms["log"]["password"].value);
	var emailHash = CryptoJS.MD5(email);
	logIn(emailHash, password);

});

var logIn = function(a,b){

	if(window.XMLHttpRequest){
		var xttp = new XMLHttpRequest();
	}else{
		var xttp = new ActiveXObject("Microsoft.XMLHTTP");
	}

	xttp.onreadystatechange = function(){
		if(xttp.readyState === 4 && xttp.status === 200){
			if(xttp.responseText == "allow"){
				location.replace("index.php");
			}else{
				alert("Wrong email or password");
			}
		}
	};
	xttp.open("GET", "http://localhost/hlf/login.php?email="+a+"&password="+b, true);
	xttp.send();

}