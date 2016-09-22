<?php
session_start();
	$email = $_GET["email"];
	$password = md5($_GET["password"]);

	if(empty($email)){
		echo "Your email is missing";
		die();
	}
	if(empty($password)){
		echo "Your password is missing";
		die();
	}

	try{
		$server_name = "localhost";
		$db_name = "hlf";
		$user = "hlf";
		$pass = "Persla2006.2307";
		$conn = new PDO("mysql:host=$server_name;dbname=$db_name", $user, $pass);
		$query = "SELECT * FROM users WHERE emailHash='$email' AND password = '$password'"; 
		$st = $conn->prepare($query);
		$st->execute();
		$result = $st->fetchAll();
		
		//Outputting...
		if(empty($result)){
			echo "no";
		}
		else{
			foreach($result as $row){
				$emailHash = $row["emailHash"];
				$avatar = $row["avatar"];
				$_SESSION["user_id"] = $emailHash;
				$_SESSION["avatar"] = $avatar;
				$_SESSION["interests"] = $row["interests"];

				if(isset($_SESSION["user_id"])){
					echo "allow";
				}
		    }
		}
		
		
	}catch(PDOException $e){
		echo $query." ".$e->getMessage();
	}
?>