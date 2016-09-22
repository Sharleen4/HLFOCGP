
var outputPosts = function(){
	var xttp = new XMLHttpRequest();

	xttp.onreadystatechange = function(){
		if(xttp.readyState == 4 && xttp.status == 200){
			$("#postt").html(xttp.responseText);
		}
	}
	xttp.open("GET", "http://localhost/hlf/posts.php", true);
	xttp.send();
}
outputPosts();