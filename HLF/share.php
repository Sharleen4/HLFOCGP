<?php
	session_start();
	$post = $_GET["sharepost"];
	$posterId = "";

	$year =  date("Y");
	$month = date("M");
	$day = date("D");
	$date = date("d");
	$hours = date("G");
	$minutes = date("i");
	$time = time();

	try{
		//connection
		$server_name = "localhost";
		$db_name = "hlf";
		$user = "hlf";
		$pass = "Persla2006.2307";
		$conn = new PDO("mysql:host=$server_name;dbname=$db_name", $user, $pass);

		if(isset($_SESSION["user_id"])){
			$posterId = $_SESSION["user_id"];
			
			$query = "INSERT into posts (post, poster_id, post_day, post_date, post_month, post_year, post_hour, post_minute)
			 VALUES ('$post', '$posterId', '$day', '$date', '$month', '$year', '$hours', '$minutes')";

		if($conn->exec($query)){
			echo "Posted";
		}

			//queries
			//$query = "SELECT * FROM users WHERE emailHash='$email'"; 
			
		}
	}catch(PDOException $e){
		echo $query." ".$e->getMessage();
	}

?>