<?php

	session_start();
	include 'database/dbconn.php';
	include 'function.php';

	if(isset($_POST['upload'])){
		$image_name = $_FILES['image']['name'];
		$image_type = $_FILES['image']['type'];
		$image_size = $_FILES['image']['size'];
		$image_temp_name = $_FILES['image']['tmp_name'];
		$user_id = $_SESSION['id'];

		$save_folder = '../img/';
		move_uploaded_file($image_temp_name, $save_folder . $image_name);

		$sql = "INSERT INTO lecturer_attendance_table VALUES pro_pic_location = '$image_name' WHERE id = '$user_id'";
		$result = mysqli_query($conn, $sql);

	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Image uploading</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="css/style.css"/>
		<link rel="stylesheet" type="text/css" href="css/style2.css"/>
		<link rel="stylesheet" type="text/css" href="css/css/font-awesome.min.css"/>
		<script src="js/script.js"></script>
</head>
<body>
<?php include 'include/topbar.php'; ?>
<div style="width: 500px; height: auto; margin: 100px auto; position: absolute;">
<h3>Choose an image to Upload</h3>
<br>
	<form method="post" action="profileImageUpload.php" enctype="multipart/form-data" >
		<input type="file" name="image">
		<button name="upload" value="submit" id="upload"><span>
		<i class="fa fa-upload" aria-hidden="true" style='font-size: 1.5em; color:green; margin: 5px;'>
		</i>Upload</span>
		</button>	
	</form>
</div>
</body>
</html>