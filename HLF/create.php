<?php
session_start();
	$name = $_GET["name"];
	$surname = $_GET["surname"];
	$email = $_GET["email"];
	$emailHash = $_GET["emailHash"];
	$password = md5($_GET["password"]);
	$pass_verif = md5($_GET["pass_verif"]);

	if(empty($name)){
		echo "Your name is missing";
		die();
	}
	if(empty($surname)){
		echo "Your Surname is missing";
		die();
	}
	if(empty($email)){
		echo "Your Email is missing";
		die();
	}
	if(empty($emailHash)){
		echo "Error";
		die();
	}
	if(empty($password)){
		echo "Enter password";
		die();
	}
	if(empty($pass_verif)){
		echo "Verify your Password";
		die();
	}

	if($password != $pass_verif){
		echo "Your passwords do not match";
		die();
	}

	try{
		$server_name = "localhost";
		$db_name = "hlf";
		$user = "hlf";
		$pass = "Persla2006.2307";
		$conn = new PDO("mysql:host=$server_name;dbname=$db_name", $user, $pass);
		$query = "INSERT into users (name, surname, email, emailHash, password) VALUES ('$name', '$surname', '$email', '$emailHash', '$password')";

		if($conn->exec($query)){
			echo "done";
			$_SESSION["user_id"] = $emailHash;
		}else{
			echo "fail";
		}
		
	}catch(PDOException $e){
		echo $query." ".$e->getMessage();
	}
?>