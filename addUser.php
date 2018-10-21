<?php
	include 'database/dbconn.php';
	session_start();
	include 'function.php';
	admin_only();
?>


<?php
	if(isset($_POST['add_user'])){		//check the add_user button pressed or not
		$username = real_input($_POST['u_id']);
		$password = real_input($_POST['password']);
		$name = real_input($_POST['preword']);
		$name .= real_input($_POST['name']);
		$department = $_POST['department']; 
		$description = real_input($_POST['description']);
		$attendance = $_POST['attendance'];

		//query for check the entered username is exists or not
		$sql = "SELECT u_id FROM lecturer_attendance_table WHERE u_id = '$username'";
		$result = mysqli_query($conn, $sql);
		
		if(mysqli_num_rows($result) > 0){
			header('Location: addUser.php?err=username exists. Please try another');
		}

		//if the entered username is not exists then execute the else statement
		else{

		//query for insert values into the table to create new user
		$sql = "INSERT INTO 
		lecturer_attendance_table(u_id, password, name, dep_id, pro_pic_location, description, attendance) 
				  VALUES ('$username', '$password', '$name', '$department', '', '$description', '$attendance')";
		
		if($conn->query($sql)){
			header('Location: lecturerBoard.php?msg=new user added successfully');

		}
		else{
			header('Location: addUser.php?err=query failed');
		}
	}
}
	
?>

<?php 

    if(isset($_GET['removeuser']))
        if(isset($_GET['id'])){
            $userid = $_GET['id'];
            $sql = "DELETE FROM lecturer_attendance_table WHERE id = '{$userid}' LIMIT 1";

            $result = mysqli_query($conn, $sql);

            $sql = "UPDATE subjects SET lecturer_id = NULL WHERE lecturer_id = '{$userid}'";

            /* 
            //
            consider above line will set lecturer_id as null when related user deleted
			//
            */
            $result = mysqli_query($conn, $sql);
            if($result){
                header('Location: addUser.php?msg=user removed');
            }
            else{
                header('Location: addUser.php?err=query faild');
            }
        } 
     ?>
     
<?php include 'include/head.html'; ?>
<body>
<?php include 'include/topbar.php' ?>

<div class="dashboard_container" id="d">
<header>
	<div id="item-name"><a href="dashboard.php" style="text-decoration: none; color: white;"> DashBoard</a></div>
</header>

<?php include 'include/dashboard-items.php' ?> 	<!-- calling dashboard items -->
</div>

<script>		// toggle function of the admin's dashboard panel
function toggle() {
    var i = document.getElementById("item-name");
    var i1 = document.getElementById("item-name2");
    var i2 = document.getElementById("item-name3");
    var i3 = document.getElementById("item-name4");
    var i4 = document.getElementById("item-name5");
    var i5 = document.getElementById("item-name6");
    var i6 = document.getElementById("item-name7");
    var i7 = document.getElementById("item-name8");
    if (i.style.display === "none") {
        i.style.display = "block";
        i1.style.display = "block";
        i2.style.display = "block";
        i3.style.display = "block";
        i4.style.display = "block";
        i5.style.display = "block";
        i6.style.display = "block";
        i7.style.display = "block";
        i.style.width = "170px";
        i.style.transition = "ease-in-out 0.7s";    
    } else {
        i.style.display = "none";
        i1.style.display = "none";
        i2.style.display = "none";
        i3.style.display = "none";
        i4.style.display = "none";
        i5.style.display = "none";
        i6.style.display = "none";
        i7.style.display = "none";
        i.style.width = "0px"; 	
    }   
}
</script>

<main id="content" class="content">
	<div class="add_user_container" style="width: 400px;">
		<h2>Add New Lecturer</h2>
		<hr><br>
			<form method="POST" action="addUser.php">
				<div class="text_field">
				<input type="text" name="u_id" placeholder="Username" required="required" /><br />
				<input type="password" name="password" placeholder="Password" required="required" /><br />
				<div style="display: inline-flex;">
				<input type="text" name="preword" value="Ms." readonly="readonly" style="width: 40px; padding-left:5px;" />
				<input type="text" name="name" placeholder="Name" required="required" /><br /> 
				</div>
				<select name="department" required="required">
					<option value="">Select a Department</option>
					<option value="1">MIT</option>
					<option value="2">BBA</option>
					<option value="3">B.com</option>
				</select><br>
				<input type="text" name="description" placeholder="Description: Ex:-Senior Lecturer" /><br />
				<input type="text" name="attendance" value="1" readonly="readonly" /><br />
				<div style='width: 100%; height: 47px; overflow: hidden; margin-top: 15px;'>
					<button type="submit" name="add_user" style='float: none; margin: 0 auto; display:inherit; width:auto; padding: 0px 20px;'> Create Account </button>
				</div>
				</div>	
			</form>
		</div>

		<div class="message_container" style="width: 700px;">
	        <h2>Manage Lecturers</h2>
	        <hr><br>
	        <?php lecturer_table(); ?> <!-- list down the all lecturers details -->
	    </div>

</main>

<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/jquery.cycle2.min"></script>
<script src="js/jquery.min"></script>
<?php if(isset($_GET['err'])){error_message($_GET['err']);} ?>
<?php if(isset($_GET['msg'])){message($_GET['msg']);} ?>
</body>
<?php include 'include/footer.html' ?>
</html>
