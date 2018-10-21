<?php

	session_start();
	include 'database/dbconn.php';
	include 'function.php';

if(isset($_SESSION['id'])){
	}
	else{
	header('Location: index.php?err=please log in');
}
	if(isset($_POST['upload'])){
		$image_name = $_FILES['image']['name'];
		$image_type = $_FILES['image']['type'];
		$image_size = $_FILES['image']['size'];
		$image_temp_name = $_FILES['image']['tmp_name'];
		$user_id = $_SESSION['id'];
		$save_folder = 'img/profile_pic';
		
		$upload_success = move_uploaded_file($image_temp_name, $save_folder . $image_name);
		if($upload_success){
			$full_img_location = "img/profile_pic" . $image_name;

			$sql = "UPDATE lecturer_attendance_table 
					SET pro_pic_location = '$full_img_location' 
					WHERE id = '$user_id' LIMIT 1";

			$result = mysqli_query($conn, $sql);

			if($result){
				header('Location:editUser.php?msg=Profile image uploaded');
			}else{
				header('Location:editUser.php?err=Profile image does not applied');
			}
		}else{
			header('Location:editUser.php?err=Profile image upload unsuccessful');
		}
	}

?>
<?php include 'include/head.html'; ?>
<body>
	<style type="text/css">
		.message_container form input{
		     height: auto; 
		     padding-left: 0px; 
		     transition: ease 0.7s; 
		     display: inline-block; 
		     box-shadow: none; 
		     background-color: unset;
		}
	</style>
<?php include 'include/topbar.php'; ?>
<?php include 'include/navigation.php'; ?>
<main id="content" class="content" style="width: 100%;">
<div class="message_container" style="width: 700px; height:300px; margin: 50px auto; float: none;">
<h2>Choose an image to Upload</h2><br>
<hr>
<br>
	<form method="post" action="profileImageUpload.php" enctype="multipart/form-data" style="height: 300px;">
		<input type="file" name="image" >
		<div style="width: 100%; height: 112px; overflow: hidden; margin-top: 15px;">
			<button name="upload" value="submit" id="upload" style="float: none; margin: 0 auto; display: inherit;">
			<span>
			<i class="fa fa-upload" aria-hidden="true" style='font-size: 1.5em;  margin: 5px;'>
			</i>Upload
			</span>
			</button>
		</div>
	</form>
</div>
</main>
</body>
<?php include 'include/footer.html'; ?>
</html>