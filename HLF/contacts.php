<?php
session_start();
	$emailHash = $_SESSION["user_id"];
	try{
		$server_name = "localhost";
		$db_name = "hlf";
		$user = "hlf";
		//Test link motion.
		$pass = "Persla2006.2307";
		$conn = new PDO("mysql:host=$server_name;dbname=$db_name", $user, $pass);
		$query = "SELECT * FROM users where emailHash != '$emailHash' order by `name` desc"; 
		$st = $conn->prepare($query);
		$st->execute();
		$result = $st->fetchAll();
		
		//Outputting...
		if(empty($result)){
			echo "No Contacts to show";
		}
		else{
			foreach($result as $row){
				if($row["avatar"] ==''){
					$avatar = "images/default_pic.png";
				}else{
					$avatar = $row["avatar"] ;
				}
				if(strlen($row["surname"]) > 10){
					$name = substr($row["name"], 0,1).". ".substr($row["surname"], 0, 8)."...";
				}else{
					$name = substr($row["name"], 0,1).". ".$row["surname"];
				}

				$gender = $row["gender"];
				$religion = $row["religion"];
				$specialty = $row["speciality"];
				$interests = $row["interests"];
				$location = $row["location"];
				$citizen = $row["citizenship"];
				$field = $row["field"];
				$alma = $row["alma"];
				$experiance = $row["experiance"];

				if(!empty($field)){
					echo "
						<div class='contact_prop'>
							<div class='contact_details'>
								<img class='contact_img' src='$avatar'><br>
								<span class='contact_name'>$name<br>Zimbabwe</span>
							</div>
							
							<div class='contact'>
								<table>
									<tbody>
										<tr>
											<td>Current Field: $field</td>
											<td>Citizenship: $citizen</td>
										</tr>

										<tr>
											<td>Specialty: $specialty</td>
											<td>Location: $location</td>
										</tr>
										<tr>
											<td>Experianced in: $experiance</td>
											<td>Alma mater: $alma</td>
										</tr>
									</tbody>
								</table>
								<div class='interests'>
									Interests: $interests
								</div>
							</div>
						</div>
					";
				}
				
		    }
		}
		
		
	}catch(PDOException $e){
		echo $query." ".$e->getMessage();
	}
?>
