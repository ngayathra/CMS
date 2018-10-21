<?php

include 'database/dbconn.php';

	$username = $_POST['username'];
	$password = $_POST['password'];
	$name = $_POST['name'];
	$birthday = $_POST['year'];
	$birthday .= $_POST['month'];
	$birthday .=$_POST['day'];

	$sql = ("INSERT INTO usertable (username, password, name, birthday) VALUES ('$username', '$password', '$name', '$birthday')");
	$result=$conn->query($sql);
	
	if($result){
		header("Location:lb.php");
	}
	else{
		echo "error";
	}