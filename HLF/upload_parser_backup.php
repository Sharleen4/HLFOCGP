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
		}
	}else{
		echo "File not supported";
		die();
	}


	
?>