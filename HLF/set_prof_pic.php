<?php session_start() ?>
<!DOCTYPE html>
<html>
<head>
	<title>hlfOCG - Online Career Guidance</title>
	<link rel="icon" type="image/png" href="images/h_logo.png">
	<link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body>
	<div id="main">
		<img id="h_logo" src="images/h_logo.png">
		<div id="create_log">
			<div id="login_box">
				<form name="log">
					<p>Set Profile Picture</p>
					<input type="file" name="upload" id="file">
				</form>
				<input id = "upload" type="submit" value="Upload">
			</div>

			<div id="create_box">
				<form name="create">
					<input type="text" placeholder="Name" name="name">
					<input type="text" placeholder="Surname" name="surname">
					<input type="email" placeholder="Email Address" name="email">
					<input type="password" placeholder="Password" name="password">
					<input type="password" placeholder="Verify Password" name="password_very">
					
				</form>
				<input type="submit" id="create_btn" value="Create">
			</div>
		</div>
		
		<button id="sign_up">Next</button>
		<button id="login">Previous</button>
		<script type="text/javascript" src="js/jquery-1.12.1.min.js"></script>
		<script type="text/javascript" src="js/main_script.js"></script>
		<script type="text/javascript" src="js/profile_pic.js"></script>
		<script type="text/javascript" src="js/create.js"></script>

	</div>
</body>
</html>