<?php
	session_start();
	$comment = $_GET["sharecomment"];
	$post_id = $_GET["post_id"];
	$commenterId = "";

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
			$commenterId = $_SESSION["user_id"];
			
			$query = "INSERT into comments (comment, commenter_id, post_id, comment_day, comment_date, comment_month, comment_year, comment_hour, comment_minute)
			 VALUES ('$comment', '$commenterId','$post_id', '$day', '$date', '$month', '$year', '$hours', '$minutes')";

		if($conn->exec($query)){
			echo "commented";
		}else{
			echo "Failed";
		}
		

			//queries
			//$query = "SELECT * FROM users WHERE emailHash='$email'"; 
			
		}
	}catch(PDOException $e){
		echo $query." ".$e->getMessage();
	}

?>