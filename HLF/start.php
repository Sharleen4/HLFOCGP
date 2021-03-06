<?php session_start() ?>
<!DOCTYPE html>
<html>
<head>
	<title>HLFOCG - Online Career Guidance</title>
	<link rel="icon" type="image/png" href="images/h_logo.png">
	<link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body>
	<div id="main">
		<img id="h_logo" src="images/h_logo.png">
		<div id="create_log">
			<div id="login_box">
				<form name="log">
					<input type="text" placeholder="Email Address" name="email">
					<input type="password" placeholder="Password" name="password">
				</form>
				<input id = "login_btn" type="submit" value="Login">
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
		
		<button id="sign_up">Sign up</button>
		<button id="login">Log In</button>
		<script type="text/javascript" src="js/jquery-1.12.1.min.js"></script>
		<script type="text/javascript" src="js/main_script.js"></script>
		<script type="text/javascript" src="js/md5.js"></script>
		<script type="text/javascript" src="js/create.js"></script>

	</div>
</body>
</html>