<?php
	session_start();
	if(isset($_SESSION["interests"])){
		header("location: index.php");
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>HLFOCG - Online Career Guidance</title>
	<link rel="icon" type="image/png" href="images/h_logo.png">
	<link rel="stylesheet" type="text/css" href="css/index_style.css">
	<link rel="stylesheet" type="text/css" href="css/contacts.css">
</head>
<body>
	<div id="left">
		<img src="images/h_logo.png">
		<div class="props">
			<ul>
				<li>Announcements</li>
				<li>Notifications</li>
				<li id="cal">Calendar</li>
				<li>Events</li>
				<li>Achieves</li>
				<li>Settings</li>
			</ul>
		</div>
	</div>

	<div id="main">
		<div id="header">
			<ul>
				<li><img src="images/home_icon.png"></li>
				<li id="post"><img src="images/post.png"></li>
			</ul>
			<ul id="right_header">
				<li id="logout_btn"><img src="images/logout.png"></li>
				<li><img src="images/options.png"></li>
			</ul>
		</div>

		

		<div id="top_menu"></div>
		<div id="posts">
			

			<div id="profile" style="display:block">
				<div id="prof_pic_set">
					<div id="prof_box">
						<form name="log">
							<p>Set Profile Picture</p>
							<input type="file" name="upload" id="file">
						</form>
						<input id = "upload" type="submit" value="Upload And Set">
					</div>
				</div>
				<div id="prof_set">
					<div id="edit_box">
						<form name="edit">
							<input type="text" placeholder="Cellphone Number" name="cell">
							<input type="text" placeholder="Current Location" name="location">
							<input type="text" placeholder="Citizenship" name="citizen">
							<input type="text" placeholder="Alma mater" name="alma">
							<input type="text" placeholder="Current Field" name="field">
							<input type="text" placeholder="Specialty" name="spec">
							<input type="text" placeholder="Experianced in " name="exp">
							
							<select name="gender">
								<option value="Male">Male</option>
								<option value="Female">Female</option>
							</select>
							<input type="text" placeholder="Religion" name="religion">
							<textarea rows="3" name="interests" placeholder="Interests"></textarea>
							
						</form>
						<input type="submit" id="update_btn" value="Save Changes">
					</div>
				</div>
			</div>

		</div>
	</div><td></td>

	<div id="right">
		<img src="  <?php 
						if(!isset($_SESSION['avatar'])){
							echo "images/default_pic.png";
						}else{
							echo $_SESSION['avatar'];
						}
					?>">
		<div class="props">
			<ul>
				<li id="goto_pro">Edit Profile</li>
				<li>Notifications</li>
				<li id="cont">Contacts</li>
				<li>Messages</li>
				<li>Jobs</li>
				<li>Settings</li>
			</ul>
		</div>
	</div>
	<script type="text/javascript" src="js/jquery-1.12.1.min.js"></script>
	<script type="text/javascript" src="js/profile_pic.js"></script>
	<script type="text/javascript" src="js/update_profile.js"></script>
	<script type="text/javascript" src="js/logout.js"></script>
	<script type="text/javascript" src="js/main_script.js"></script>
</body>
</html>