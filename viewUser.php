<?php
	session_start();
	include 'database/dbconn.php';
	include 'function.php';
?>
<?php  
	if(isset($_GET['id'])){
		$user_id = $_GET['id'];

		$sql = "SELECT * FROM lecturer_attendance_table WHERE id = '{$user_id}' LIMIT 1";
		$result = $conn -> query($sql);
		if($result->fetch_assoc()>0){

		}
		else{
			header('Location: lecturerboard.php?err=select a valid user');
		}
	}
	else{
		header('Location: lecturerboard.php?err=please select a user');
	}
?>

<?php include 'include/head.html'; ?>
<body>
	<?php include 'include/topbar.php'; ?> <!-- login/logout top bar section file attachment -->
	<?php include 'include/navigation.php'; ?> <!-- menu bar section file attachment -->
	<?php $user_id = $_GET['id']; view_lecturer_info($user_id); ?> <!-- particular user info function attachment -->

	<?php if(isset($_GET['err'])){error_message($_GET['err']);} ?>
	<?php if(isset($_GET['msg'])){message($_GET['msg']);} ?>
	<?php include 'include/footer.html'; ?> <!-- footer section file attachment -->
</body>
</html>