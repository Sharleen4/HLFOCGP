var upload = function(up){
	$("#progress_container").fadeIn(100);
	var upd = new XMLHttpRequest();
	upd.onreadystatechange = function(){
		if(upd.readyState === 4 && upd.status === 200){
			if(upd.responseText == "done"){
				location.reload();
			}
		}
	};

	upd.upload.addEventListener("progress", function(e){
		var percentage = (e.loaded/e.total) * 100;
		document.getElementById("progress_bar").style.width = percentage+"%";
	});

	upd.open("POST","upload_parser.php", true);
	upd.send(up);
};



document.getElementById("upload").addEventListener("click", function(){
	var file = document.getElementById("file").files[0];
	var formdata = new FormData();
	formdata.append("upload", file);
	upload(formdata);
});