<?php
	try{
		$server_name = "localhost";
		$db_name = "hlf";
		$user = "hlf";
		$pass = "Persla2006.2307";
		$conn = new PDO("mysql:host=$server_name;dbname=$db_name", $user, $pass);
		$query = "SELECT * FROM posts order by `post_id` desc"; 
		$st = $conn->prepare($query);
		$st->execute();
		$result = $st->fetchAll();
		
		
		//Outputting...
		if(empty($result)){
			echo "No Posts Yet";
		}
		else{
			foreach($result as $row){
				$com_num = 0;
				$post_id = $row["post_id"];
				$poster = $row["poster_id"];
				$post = $row["post"];
				$post_day = $row["post_day"];
				$post_date = $row["post_date"];
				$post_month = $row["post_month"];
				$post_year = $row["post_year"];
				$post_hour = $row["post_hour"];
				$post_minute = $row["post_minute"];
				$post_hour = $row["post_hour"];

				if(strlen($post_minute) < 2){
					$post_minute = "0".$post_minute;
				}

				$stm = $conn->prepare("SELECT name, surname, avatar from users where emailHash = '$poster'");
				$stm->execute();
				$resulti = $stm->fetchAll();

				foreach ($resulti as $row2) {

					if($row2["avatar"] ==''){
						$avatar = "images/default_pic.png";
					}else{
						$avatar = $row2["avatar"] ;
					}
					if(strlen($row2["surname"]) > 10){
						$poster = substr($row2["name"], 0,1).". ".substr($row2["surname"], 0, 8)."...";
					}else{
						$poster = substr($row2["name"], 0,1).". ".$row2["surname"];
					}
				}

				$stmt = $conn->prepare("SELECT comment_id from comments where post_id = '$post_id'");
				$stmt->execute();
				$resulty = $stmt->fetchAll();
				if(!empty($resulty)){
					$com_num = sizeof($resulty);
				}

				if($com_num >0){
					if($com_num == 1){
						$responses = "<span class='show_com' onclick='showComments(\"$post_id\")'>Show $com_num Response &raquo;</span>";
					}else{
						$responses = "<span class='show_com' onclick='showComments(\"$post_id\")'>Show $com_num Responses &raquo;</span>";
					}
				}else{
					$responses = "";
				}
				
				echo "
					<div class='post_prop'>
						<div class='poster_details'>
							<img class='poster_img' src='$avatar'><br>
							<span class='poster_name'>$poster<br>Zimbabwe</span>
						</div>
						
						<div class='post'>
							<span class='time'>$post_day $post_date $post_month $post_year @ $post_hour:$post_minute</span>
							$responses
							<p class='content'>$post</p>
							<div id='insert_$post_id'></div>
							<div class='comment_box1' id='post_$post_id'>
								<textarea rows='1' class='comment_input' id='_$post_id' onclick='getBoxId(\"_$post_id\",$post_id)' placeholder='Respond to this post...'></textarea>
							</div>
						</div>
					</div>
				";
		    }
		}
		
		
	}catch(PDOException $e){
		echo $query." ".$e->getMessage();
	}
?>