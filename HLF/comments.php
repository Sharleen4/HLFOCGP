<?php
	session_start();
	$post_id = $_GET["post_id"];
	try{
		$server_name = "localhost";
		$db_name = "hlf";
		$user = "hlf";
		$pass = "Persla2006.2307";
		$conn = new PDO("mysql:host=$server_name;dbname=$db_name", $user, $pass);
		$query = "SELECT * FROM comments where post_id = '$post_id' order by `comment_id` asc"; 
		$st = $conn->prepare($query);
		$st->execute();
		$result = $st->fetchAll();
		
		//Outputting...
		if(empty($result)){
			echo "No comments Yet";
		}
		else{
			echo "<div class='comments'>";
			foreach($result as $row){
				$commenter = $row["commenter_id"];
				$comment = $row["comment"];
				$comment_day = $row["comment_day"];
				$comment_date = $row["comment_date"];
				$comment_month = $row["comment_month"];
				$comment_year = $row["comment_year"];
				$comment_hour = $row["comment_hour"];
				$comment_minute = $row["comment_minute"];
				$comment_hour = $row["comment_hour"];

				if(strlen($comment_minute) < 2){
					$comment_minute = "0".$comment_minute;
				}

				$stm = $conn->prepare("SELECT name, surname, avatar from users where emailHash = '$commenter'");
				$stm->execute();
				$resulti = $stm->fetchAll();

				foreach ($resulti as $row2) {

					if($row2["avatar"] ==''){
						$avatar = "images/default_pic.png";
					}else{
						$avatar = $row2["avatar"] ;
					}
					$commenter = substr($row2["name"], 0,1).". ".$row2["surname"];
				}


				echo "
					<div class='comment'>
						<div class='commenter_details'>
							<img class='commenter_img' src='$avatar'>
						</div>

						<p><span class='commenter'>$commenter</span> $comment</p>
					</div>
				";
		    }
		    echo "</div>";
		}
		
		
	}catch(PDOException $e){
		echo $query." ".$e->getMessage();
	}
?>