<?php
	session_start();
	$emailHash = $_SESSION["user_id"];

	$cell = $_GET["cell"];
	if(empty($cell)){
		echo "Cell Required";
		die();
	}

	$c_location = $_GET["c_location"];
	if(empty($c_location)){
		echo "Your current Required";
		die();
	}

	$citizen = $_GET["citizen"];
	if(empty($citizen)){
		echo "Your citizenship is Required";
		die();
	}

	$alma = $_GET["alma"];
	if(empty($alma)){
		echo "Your Alma mater Required";
		die();
	}

	$field = $_GET["field"];
	if(empty($field)){
		echo "Field of expertise Required";
		die();
	}

	$specialty = $_GET["specialty"];
	if(empty($specialty)){
		echo "Area of specialty Required";
		die();
	}

	$exper = $_GET["exper"];
	if(empty($exper)){
		echo "What are you experianced in?";
		die();
	}

	$gender = $_GET["gender"];
	if(empty($gender)){
		echo "Gender Required";
		die();
	}

	$religion = $_GET["religion"];
	if(empty($religion)){
		echo "Religion Required";
		die();
	}

	$interests = $_GET["interests"];
	if(empty($interests)){
		echo "Add your interests";
		die();
	}

	try{
		$server_name = "localhost";
		$db_name = "hlf";
		$user = "hlf";
		$pass = "Persla2006.2307";
		$conn = new PDO("mysql:host=$server_name;dbname=$db_name", $user, $pass);
		$query = "UPDATE users SET gender = '$gender', religion = '$religion', citizenship = '$citizen', location = '$c_location', cell = '$cell', alma = '$alma', field = '$field', speciality = '$specialty', experiance = '$exper', interests = '$interests' where emailHash = '$emailHash'";

		if($conn->exec($query)){
			echo "done";
			$_SESSION["interests"] = $interests;
		}else{
			echo "fail";
		}
		
	}catch(PDOException $e){
		echo $query." ".$e->getMessage();
	}

?>