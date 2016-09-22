$("#logout_btn").click(function(){
	logout();
});

var logout = function(){
	var log = new XMLHttpRequest();

	log.onreadystatechange = function(){
		if(log.readyState == 4 && log.status == 200){
			location.reload();
		}
	}

	log.open("GET", "http://localhost/hlf/logout.php", true);
	log.send();
}