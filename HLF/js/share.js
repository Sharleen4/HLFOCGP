$("#share_btn").click(function(){
	var post = $("#share_text").val();
	if(post != ""){
		sendPost(post);
	}else{
		alert("You can not post nothing.")
	}
	
	$("#share_text").val("");
	$("#share_box").fadeOut(500);
});

var sendPost = function(post){
	var xttp = new XMLHttpRequest();

	xttp.onreadystatechange = function(){
		if(xttp.readyState == 4 && xttp.status == 200){
			//outputPosts();
			location.reload();
		}
	}
	xttp.open("GET", "http://localhost/hlf/share.php?sharepost="+post, true);
	xttp.send();
}