<div class="nav_bar_container">
	<ul>
		<li><a href="index.php">Home</a></li>
		<li><a href="lecturerBoard.php">Lecturer Board</a></li>
		<li><a href="facultyClassRooms.php">Faculty Classrooms</a></li>
		<li><a href="viewTimetable.php">Timetables</a></li>
		<!-- <li><a href="">Help</a></li> -->
		<li><a href="about.php" onclick="">About</a></li>
		<?php 
			$admin = "admin";

			if(isset($_SESSION['username']) && $_SESSION['username'] == $admin){
				if($_SESSION['id'] == '0'){
					echo '<li><a href="dashboard.php" style="color: red;">DashBoard</a></li>';
				}
			} 
		?>
	</ul> <!-- menubar section -->
</div>