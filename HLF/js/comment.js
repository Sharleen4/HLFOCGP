var id;
function getBoxId(a, b){
	showComments(b);
	enterEvent(a, b);
}
function enterEvent(id, id_num){
	var comBox = document.getElementById(id);
	comBox.addEventListener("keyup", function(e){
		if(e.keyCode == 13){
			var comment = $("#"+id).val();
			$("#"+id).val("");
			if (comment == "") {
				alert("Nothing in your comment box.")
			}else{
				commentPost(comment, id_num);
			}
			
		}
	});
}

var commentPost = function(com, id){
	var xttp = new XMLHttpRequest();
	xttp.onreadystatechange = function(){
		if(xttp.readyState == 4 && xttp.status == 200){
			//outputPosts();
			showComments(id);
			//location.reload();
		}
	}
	xttp.open("GET", "http://localhost/hlf/comment.php?sharecomment="+com+"&post_id="+id, true);
	xttp.send();
}

var showComments = function(a){
	var xttp = new XMLHttpRequest();

	xttp.onreadystatechange = function(){
		if(xttp.readyState == 4 && xttp.status == 200){
			$("#insert_"+a).html(xttp.responseText);
		}
	}
	xttp.open("GET", "http://localhost/hlf/comments.php?post_id="+a, true);
	xttp.send();
}