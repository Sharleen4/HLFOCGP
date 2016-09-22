<?php
session_start();
	$avatar_name = $_FILES["upload"]["name"];
	$avatar_tmp = $_FILES["upload"]["tmp_name"];
	$avatar_type = $_FILES["upload"]["type"];
	$avatar_size = $_FILES["upload"]["size"];
	$avatar_err = $_FILES["upload"]["error"];

	$e = explode(".", $avatar_name);
	$ext = $e[1];
	$name = $e[0];
	$rand_name = rand().$name;
	$avatar_name = md5($rand_name);
	$avatar_name = $avatar_name.".".$ext;
	$userId = $_SESSION["user_id"];

	if ($ext == "jpg" OR $ext == "png"){
		if(!$avatar_tmp){
			echo "Please select a profile pitcure for the contastant";
			die();
		}

		$thumbnail_width = 150;
    	$thumbnail_height = 150;

		$imgProp = getimagesize($avatar_tmp);
		$og_width = $imgProp[0];
		$og_height = $imgProp[1];
		$img_type = $imgProp[2];

		if ($og_width > $og_height) {
	        $new_width = $thumbnail_width;
	        $new_height = intval($og_height * $new_width / $og_width);
	    } else {
	        $new_height = $thumbnail_height;
	        $new_width = intval($og_width * $new_height / $og_height);
	    }

		$dest_x = intval(($thumbnail_width - $new_width) / 2);
    	$dest_y = intval(($thumbnail_height - $new_height) / 2);

		if($img_type == 1){
			$imgt = "ImageGIF";
        	$imgcreatefrom = "ImageCreateFromGIF";
		}
		if($img_type == 2){
			$imgt = "ImageJPEG";
        	$imgcreatefrom = "ImageCreateFromJPEG";
		}
		if ($img_type == 3) {
	        $imgt = "ImagePNG";
	        $imgcreatefrom = "ImageCreateFromPNG";
	    }

	    if ($imgt) {
	        $old_image = $imgcreatefrom($avatar_tmp);
	        $new_image = imagecreatetruecolor($thumbnail_width, $thumbnail_height);
	        imagecopyresized($new_image, $old_image, $dest_x, $dest_y, 0, 0, $new_width, $new_height, $og_width, $og_height);
	        $imgt($new_image, "uploads/".$avatar_name);
	        
	        try{
				//connection
				$server_name = "localhost";
				$db_name = "hlf";
				$user = "hlf";
				$pass = "Persla2006.2307";
				$conn = new PDO("mysql:host=$server_name;dbname=$db_name", $user, $pass);

				$query = "UPDATE users SET avatar ='uploads/$avatar_name' WHERE `emailHash`='$userId'";

				if($conn->exec($query)){
					$_SESSION["avatar"] = "uploads/$avatar_name";
					echo "done";
				}
			}catch(PDOException $e){
				echo $query." ".$e->getMessage();
			}
	    }


		/*
		if(move_uploaded_file($avatar_tmp, "uploads/".$avatar_name)){

			try{
				//connection
				$server_name = "localhost";
				$db_name = "hlf";
				$user = "hlf";
				$pass = "Persla2006.2307";
				$conn = new PDO("mysql:host=$server_name;dbname=$db_name", $user, $pass);

				$query = "UPDATE users SET avatar ='uploads/$avatar_name' WHERE `emailHash`='$userId'";

				if($conn->exec($query)){
					$_SESSION["avatar"] = "uploads/$avatar_name";
				}
			}catch(PDOException $e){
				echo $query." ".$e->getMessage();
			}

		}else{
			echo "Failed to upload image";
		}*/
	}else{
		echo "fail";
		die();
	}


	
?>