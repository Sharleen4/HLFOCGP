<?php
	session_start();
	if(!isset($_SESSION["user_id"])){
		header("location: start.php");
	}
	elseif(!isset($_SESSION["interests"])){
		header("location: edit_profile.php");
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

	<div id="main">
		<div id="header">
			<ul>
				<li id="home"><img src="images/home_icon.png"></li>
				<li id="post"><img src="images/post.png"></li>
			</ul>
			<ul id="right_header">
				<li id="logout_btn"><img src="images/logout.png"></li>
				<li><img src="images/options.png"></li>
			</ul>
		</div>

		<div id="share_box">
			<textarea id="share_text" rows="3" placeholder="Post anything here"></textarea>
			<button id="share_btn">Share</button>
		</div>

		<div id="top_menu"></div>
		<div id="posts">
			<div id="postt">
				<div id="loader">
					<img src="images/loader.gif">
				</div>
			</div>
			
			<div id="calendar">
				<table>
					<tbody>
						<tr>
							<th>Sunday</th>
							<th>Monday</th>
							<th>Tuesday</th>
							<th>Wednesday</th>
							<th>Thursday</th>
							<th>Friday</th>
							<th>Saturday</th>
						</tr>
						<tr>
							<td>29</td>
							<td>30</td>
							<td>31</td>
							<td>1</td>
							<td>2</td>
							<td>3</td>
							<td>4</td>
						</tr>

						<tr>
							<td>5</td>
							<td>6</td>
							<td>7</td>
							<td>8</td>
							<td>9</td>
							<td>10</td>
							<td>11</td>
						</tr>

						<tr>
							<td>12</td>
							<td>13</td>
							<td>14</td>
							<td>15</td>
							<td>16</td>
							<td>17</td>
							<td>18</td>
						</tr>

						<tr>
							<td>19</td>
							<td>20</td>
							<td>21</td>
							<td>22</td>
							<td>23</td>
							<td>24</td>
							<td>25</td>
						</tr>

						<tr>
							<td>26</td>
							<td>27</td>
							<td>28</td>
							<td>29</td>
							<td>30</td>
							<td>1</td>
							<td>2</td>
						</tr>
					</tbody>
				</table>
			</div>

			<div id="profile">
				<div id="prof_pic_set">
					<div id="prof_box">
						<form name="log">
							<p>Set Profile Picture</p>
							<input type="file" name="upload" id="file">
							<div id="progress_container">
								<div id="progress_bar"></div>
							</div>
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

			<div id="contacts">
				
			</div>
		</div>
	</div><td></td>

	
	<script type="text/javascript" src="js/jquery-1.12.1.min.js"></script>
	<script type="text/javascript" src="js/posts.js"></script>
	<script type="text/javascript" src="js/comment.js"></script>
	<script type="text/javascript" src="js/profile_pic.js"></script>
	<script type="text/javascript" src="js/share.js"></script>
	<script type="text/javascript" src="js/update_profile.js"></script>
	<script type="text/javascript" src="js/contacts.js"></script>
	<script type="text/javascript" src="js/logout.js"></script>
	<script type="text/javascript" src="js/main_script.js"></script>
</body>
</html>