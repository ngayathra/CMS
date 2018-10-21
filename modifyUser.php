<?php
	session_start();
	include 'database/dbconn.php';
	include 'function.php';

if(isset($_POST['update'])){
	
	$id = $_POST['userid'];
	if(isset($_POST['attendance']) ){
		$attendance = $_POST['attendance'];
	}
	if(isset($_POST['username'])){
		$username = $_POST['username'];
	}
	if(isset($_POST['name'])){
		$name = real_input($_POST['name']);
	}
	if(isset($_POST['department'])){
		$dept = $_POST['department']; 

		if($dept == "MIT"){
			$department = 1;
		}
		elseif($dept == "BBA"){
			$department = 2;
		}
		elseif($dept == "B.com"){
		 	$department = 3;
		}
	}
	if(isset($_POST['description'])){
		$description = real_input($_POST['description']);
	}
	if(isset($_POST['sms'])){
		$sms = real_input($_POST['sms']);
	}

		// u_id, password, name, dep_id, pro_pic_location, description, attendance

	$sql = "UPDATE lecturer_attendance_table SET name = '{$name}', attendance = '{$attendance}', dep_id = '{$department}', description = '{$description}', sms = '{$sms}' WHERE id = '{$id}' LIMIT 1";

	$result = $conn->query($sql);
	if ($result) {
		header('Location: editUser.php?msg=user updated successfully');
	// echo $name;
	// echo $attendance;
		
	}
}