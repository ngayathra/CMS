<?php 
	include 'database/dbconn.php'; //include database connection
	session_start(); //start session if exists
	include 'function.php';

if(isset($_SESSION['username']) == $_POST['username']){ 
	header('Location:index.php'); 
	exit();
}
else{
	
	//looking for admin login
	//get the values from the inputs
	$username = real_input($_POST['username']); 
	$password = real_input($_POST['password']);

	$sql = "SELECT * FROM usertable WHERE username = '$username' AND password = '$password' LIMIT 1";
	$result = mysqli_query($conn, $sql); //execute the query
	
	if($row = $result->fetch_assoc()){
		$_SESSION['id']=$row['id'];	//set the session values
		$_SESSION['name']=$row['name']; //set the session values
		$_SESSION['username']=$row['username']; //set the session values

		if($row['id'] == 0 && $row['username'] == 'admin'){ //
			header('Location:dashboard.php?msg=Welcome! '. $_SESSION['name']);
			exit();
		}
		else{
			header('Location:logout.php');
			exit();
		}
	}
}

//looking for lecturer login
if(!isset($_SESSION['id'])){

	$username = real_input($_POST['username']); //get values from the input fields
	$password = real_input($_POST['password']); //get values from the input fields

	$sql = "SELECT * FROM lecturer_attendance_table WHERE u_id = '$username' AND password = '$password'";
	$result = mysqli_query($conn, $sql);
	
	if($row = $result->fetch_assoc()){
		$_SESSION['id']=$row['id'];
		$_SESSION['name']=$row['name'];
		$_SESSION['username']=$row['u_id'];	
		header('Location:editUser.php?msg=Welcome! ' . $_SESSION['name']);
	}
	else{
		header('Location:index.php?err=please login');
	}
}
