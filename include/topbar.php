<div class="login_container">
	<div class="logo">
		<a href="index.php" style="text-decoration: none;">
		<i class="fa fa-university" aria-hidden="true" style='font-size: 2.5em; color:rgb(184, 204, 204); margin-left: 12px;margin-top: 9px;'>
		</i>
		<span style="color: white; font-size: 19pt; font-family: arial; font-variant: small-caps;">Classroom Management System</span>
		</a>
	</div>

<?php
	if(isset($_SESSION['username'])){
		$u_id = $_SESSION['username'];
		echo "<div class='logout'>";
		echo "<span class='user_img'>";
			
		$sql = "SELECT * FROM lecturer_attendance_table WHERE u_id = '{$u_id}'";
		$profile_image = "";
		$result = mysqli_query($conn, $sql);
		if($result){
			while ($l_detail = mysqli_fetch_assoc($result)) {
				$uname = $l_detail['name'];
				if(isset($_SESSION['username'])){
					if($l_detail['u_id'] == $_SESSION['username'] && $l_detail['id'] == $_SESSION['id']){
						$profile_image .= "<a href='editUser.php?id=$l_detail[id]'>";
					if($l_detail['pro_pic_location']){
						$profile_image .=  "<img src=\"{$l_detail['pro_pic_location']}\" width=\"100%\" height=\"100%\" style='border-radius: 50%; box-shadow: 0px 0px 8px 0px #3a3a3a;'/>";
					}
					else{
						$profile_image .="<a href='edituser.php?id=$l_detail[id]'>
										<i class='fa fa-user-circle' aria-hidden='true' style='font-size: 2em; color:rgb(184, 204, 204); float:left;'></i></a>";
					}
						$profile_image .= "</a>";
					}						
				}
			}echo $profile_image;
		}
		if(!isset($uname)){      // added new part here
			$u_id = $_SESSION['username'];
			$sql = "SELECT * FROM usertable WHERE username = '{$u_id}'";
			$result = mysqli_query($conn, $sql);
			if($row = $result->fetch_assoc()){
				$uname = $row['name'];
		if(!$profile_image){
			echo "<a href='dashboard.php'><i class='fa fa-user-circle' aria-hidden='true' style='font-size: 2em; color:rgb(184, 204, 204); float:left;'></i></a>";
		}
			}
		}
			
			echo "</span>";
			echo "<span class='user'>";
				echo "Hi!  " . $uname;
			echo "</span>";
			
			echo "<form method='POST' action='logout.php'> 
					<button type='submit' value='submit'>Logout</button> 
				</form>";
		echo "</div>";
	}
	else{

		echo " <div class='login_form'>
				<form method='POST' action='login.php'>
					<input type='text' name='username' placeholder='Username' required='required'/>
					<input type='password' name='password' placeholder='Password'/> &nbsp;
					<button type='submit' value='submit'>Log in</button> 
				</form>
			</div>";
		// header("Location:index.php");
	}
?>

</div>