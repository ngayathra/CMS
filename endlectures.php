<?php
include 'function.php';
include 'database/dbconn.php';
session_start();
if(isset($_SESSION['username'])){

	}
else{
		header('Location: user.php?err=you do not have permission/please log in');
	}

?>

<?php 
	if(isset($_GET['end_class'])){
		$lecturer_id = $_GET['lecturer_id'];
		
		$sql = "UPDATE class_room SET subject_name = null, busy = 0, current_capacity = 0, lecturer_id = null WHERE lecturer_id = '$lecturer_id' LIMIT 1";
		$result = mysqli_query($conn, $sql);
		if($result){
			header('Location: edituser.php?msg=Lecture session ended ');
		}else{
			header('Location: edituser.php?err=Lecture session cannot end');
		}
	}
 ?>