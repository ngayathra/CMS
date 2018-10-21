<?php
include 'function.php';
include 'database/dbconn.php';
session_start();
if(isset($_SESSION['username'])){

		if($_SESSION['username'] != "admin"){ // should change to the password 
		//plese observe this line - that limits the admin to access to the edit_user page
			//if need to limit USER TABLE users in the database to access this page, make a sql query for it
					
		}
	else{
		header('Location: index.php?err=you are not valid user');
			}
}
else{
		header('Location: index.php?err=you do not have permission/please log in');
			}

?>

<?php 
	if(isset($_SESSION['id'])){
		$u_id = $_SESSION['username'];
		$sql = "SELECT * FROM lecturer_attendance_table l INNER JOIN departments d ON l.dep_id = d.dep_id WHERE u_id = '{$u_id}'";
		$result = $conn->query($sql);
		if ($row = $result->fetch_assoc()) {
			$name = $row['name'];
			$password = $row['password'];
			$department = $row['dep_name'];
			$description = $row['description'];
			$attendance = $row['attendance'];
			$sms = $row['sms'];
		}
	}
?>

<?php 
    // create a new notice
    if(isset($_POST['post-message'])){ //if the post-message button set then get the values in the input boxes
        // $name = $_POST['name'];
        $user_id = $_SESSION['id'];
        $news = real_input($_POST['message']);
        $date = $_POST['date'];
    
    $sql = "INSERT INTO news_table(lecturer_id, news, news_date) VALUES ('$user_id', '$news', '$date')";
    $result = mysqli_query($conn, $sql);
    if($result){
        header('Location: editUser.php?msg=news was posted successfully');
    }
    else {
        // header('Location: editUser.php?err=news was not posted');
    }
}
 ?>


 <?php 
    if(isset($_GET['update_news'])){
       $news = real_input($_GET['news']);
       $news_date = $_GET['news_date'];
       $news_id = $_GET['news_id'];

       $sql ="UPDATE news_table SET news = '{$news}', news_date = '{$news_date}' WHERE id = '{$news_id}'";
       $result = mysqli_query($conn, $sql);
       if($result){
        header('Location: editUser.php?msg=news was updated successfully');
    }
    else {
        header('Location: editUser.php?err=news was not updated');
    }
}
  ?>

 <?php 
    if(isset($_GET['remove_news'])){
       $news_id = $_GET['news_id'];

       $sql ="DELETE FROM news_table  WHERE id = '{$news_id}' LIMIT 1";
       $result = mysqli_query($conn, $sql);
       if($result){
        header('Location: editUser.php?msg=news was deleted successfully');
        }
        else {
        header('Location: editUser.php?err=news was not deleted');
        }
    }
  ?> 


<!DOCTYPE html>
<html>
<head>
	<title>Modify user - <?php echo $_SESSION['name']; ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/style.css"/>
	<link rel="stylesheet" type="text/css" href="css/style2.css"/>
	<link rel="stylesheet" type="text/css" href="css/css/font-awesome.min.css"/>
</head>
<body>

	<?php include 'include/topbar.php'; ?>
	<?php include 'include/navigation.php'; ?>
	<?php edit_user(); ?>
<main id="content" class="content" style="width: 82%;">
	<div class="add_user_container" style="width: 400px; margin-top: 10px;">
		
			<h2 >Update Profile</h2>
			<hr><br>
			<form method="POST" action="modifyUser.php">
			<input type="hidden" name="userid" value="<?php echo $_SESSION['id']; ?>" >
				<input type="hidden" name="username" value="<?php echo $_SESSION['username']; ?>" >
				<label for="name">Name</label>				
					<input type="text" name="name" value="<?php echo $name; ?>">
					
				<label for="department">Department</label>				
					<select name="department" >
						<option <?php if($department == "MIT" ){ echo 'selected =\'selected\'';} ?> > MIT</option>
						<option <?php if($department == "BBA"){ echo 'selected =\'selected\'';} ?> > BBA</option>
						<option <?php if($department == "Bcom"){ echo 'selected =\'selected\'';} ?> > B.Com</option>
					</select>

				<label for="password">Password</label>				
					<input type="text" name="password" value="****" readonly="readnoly" />
					<br /><br />
				<label for="attendance"><strong>Availability</strong></label><br />	 			
					Absence<input type="radio" name="attendance" value="0" <?php if($attendance == '0'){ echo 'checked =\'checked\'';};?>>
					Present <input type="radio" name="attendance" value="1" <?php if($attendance == '1'){ echo 'checked =\'checked\'';};?>>
					<br><br>

				<label for="description">Description</label>
					<input type="text" name="description" value="<?php echo $description; ?>" />
				
				<label for="sms">Short Message</label>
					<input type="text" name="sms" value="<?php echo $sms; ?>" />
						
					<div style="width: 100%; height: 112px; overflow: hidden; margin-top: 15px;">
					<button type="submit" name="update" value="submit" style="float: none; margin: 0 auto; display: inherit;">Update</button>
					</div>
				</form>
		
		</div>	


	<div class="message_container" style="width: 650px; margin-top: 10px;">
	<h2>Add Notices</h2>
		<hr><br>
		<form action="editUser.php" method="POST" >
			<input type="hidden" name="name" value="<?php $name = $_SESSION['name']; echo '$name'; ?>" />
            <input type="hidden" name="user_id" value="<?php $user_id = $_SESSION['id']; echo '$user_id'; ?>" />
			<input type="text" name="message" placeholder="Type your message | news here" required="required"/>
			<input type="date" name="date">
            <div style="width: 100%; height: 47px; overflow: hidden; margin-top: 15px;">
                <button type="submit" name="post-message" style="float: none; margin: 0 auto; display: inherit;">Post</button>
            </div>
		</form>
		
	</div>


		<div class="message_container" style="width: 650px; margin-top: 10px;">
		<style type="text/css">
		 form select{ 
		 	padding-left: 8px; 
		 	width: 100%; 
		 	font-size: 12pt; 
		    height: 40px;
		    width: 95%;
		    border-radius: 8px;
		    border: 0;
		    transition: ease 0.7s;
		    background: ghostwhite;
		    display: inline-block;
		    box-shadow: 0px 1px 5px 1px #00000087;
		 }
		</style>
		<h2>Mark Students Attendance</h2>
			<hr><br>
			<form action="studentAttendance.php" method="GET" style="margin-bottom: 0;">
				<table style='margin:0 auto; max-width:640px; line-height:32px; text-align:center;'>
					<tr>
						<th>Classroom</th>
						<th>Subject</th>
						<th>Semester</th>
						<th>Department</th>
					</tr>
					<tr>
						<td>
							<select name="classroom" required="required">							<?php classroom_for_add_attendance(); ?>
							</select>
						</td>
						<td>
							<select name="subject_id">
								<?php echo subject_list_for_attendance ($_SESSION['id']); ?>
							</select>
						</td>
						<td>
							<select name="semester" required="required">
			                    <option value="">Year - Semester</option>
			                    <option value="1">1st year - Semester I  </option>
			                    <option value="2">1st year - Semester II  </option>
			                    <option value="3">2nd year - Semester I  </option>
			                    <option value="4">2nd year - Semester II  </option>
			                    <option value="5">3rd year - Semester I  </option>
			                    <option value="6">3rd year - Semester II  </option>
			                    <option value="7">4th year - Semester I  </option>
			                    <option value="8">4th year - Semester II  </option>
			                </select>
						</td>

						<td>
							<select name="department" required="required">
								<option value="">Select a Department</option>
								<option value="1">MIT</option>
								<option value="2">BBA</option>
								<option value="3">B.com</option>
							</select>
						</td>
					</tr>
				</table>
				<div style="width: 100%; height: 47px; overflow: hidden; margin-top: 15px;">
               		 <button type="submit" name="do_attendance" style="float: none; margin: 0 auto; display: inherit;" onclick="return confirm('Are you sure that selected fields ? Please double check ! ')"> Go
               		 </button>
            	</div>
			</form>
				<hr />
				



				<div>
					<form method="GET" action="endlectures.php" style="margin-bottom: 0;">
						<?php $user_id = $_SESSION['id'];
							echo "<input type='hidden' name='lecturer_id' value='$user_id' />";
						?>

						<div style="width: 100%; height: 47px; overflow: hidden; margin-top: 15px;">
	               		 <button type="submit" name="end_class" style="float: none; margin: 0 auto; display: inherit;" onclick="return confirm('You are going to end class session! Are you sure ?')"> End Class
	               		 </button>
						</div>
					</form>	
				</div>



			</div>

		<div class="message_container" style="width: 650px; margin-top: 10px;">
		<h2>Manage Notices</h2>
			<hr><br>

			<?php $id = $_SESSION['id']; listnews_for_lecturers($id); ?>	
		</div>

</main>		
<?php if(isset($_GET['err'])){error_message($_GET['err']);} ?>
<?php if(isset($_GET['msg'])){message($_GET['msg']);} ?>
<script src="js/jquery.cycle2.min"></script>
<script src="js/jquery.min"></script>
</body>
	<?php include 'include/footer.html';  ?>
</html>


