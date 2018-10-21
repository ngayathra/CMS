<?php
	include 'database/dbconn.php';
	session_start();
    include 'function.php';
    admin_only();
?>




<?php 
    // create a new notice
    if(isset($_POST['add_class'])){ //if the post-message button set then get the values in the input boxes
        $lecture_hall = real_input($_POST['lecture_hall']);
        $capacity = $_POST['lecture_hall_capacity'];
        
        if($_POST['floor'] == 'First Floor'){
            $lecture_hall_location = "First";
        }
        if($_POST['floor'] == 'Ground Floor'){
            $lecture_hall_location = "Ground";
        }
    
    $sql = "INSERT INTO class_room(lec_hall, capacity, location) VALUES ('$lecture_hall', '$capacity', '$lecture_hall_location')" ;
    $result = mysqli_query($conn, $sql);
    if($result){
        header('Location: manageClassroom.php?msg=classroom was created successfully');
    }
    else {
        header('Location: manageClassroom.php?err=classroom was not created');
    }
}
 ?>

 <?php 
    if(isset($_GET['update_classroom'])){
      $lecture_hall = real_input($_GET['lecture_hall']);
      $capacity = $_GET['capacity'];
      $lec_hall_id = $_GET['lec_hall_id'];

       if($_GET['floor'] == 'First Floor'){
        $floor = "First";
        }
        if($_GET['floor'] == 'Ground Floor'){
        $floor = "Ground";
        }

       $sql ="UPDATE class_room SET lec_hall = '{$lecture_hall}', capacity = '{$capacity}', location = '{$floor}' WHERE id = '{$lec_hall_id}' LIMIT 1";
       $result = mysqli_query($conn, $sql);
       if($result){
        header('Location: manageClassroom.php?msg=classroom was updated successfully');
    }
    else {
        header('Location: manageClassroom.php?err=classroom was not updated');
    }
}
  ?>

 <?php 
    if(isset($_GET['remove_classroom'])){
       $lec_hall_id = $_GET['lec_hall_id'];

       $sql ="DELETE FROM class_room  WHERE id = '{$lec_hall_id}' LIMIT 1";
       $result = mysqli_query($conn, $sql);
       if($result){
        header('Location: manageClassroom.php?msg=classroom was deleted successfully');
        }
        else {
        header('Location: manageClassroom.php?err=classroom was not deleted');
        }
    }
  ?>  
<?php include 'include/head.html'; ?>
<body>

<?php include 'include/topbar.php' ?>

<div class="dashboard_container" id="d">
<header><div id="item-name"><a href="dashboard.php" style="text-decoration: none; color: white;"> DashBoard</a> </div></header>

	<?php include 'include/dashboard-items.php' ?> 	<!-- calling dashboard items -->

</div>
<script>        // toggle function of the admin's dashboard panel
    function toggle() {
    var i = document.getElementById("item-name");
    var i1 = document.getElementById("item-name2");
    var i2 = document.getElementById("item-name3");
    var i3 = document.getElementById("item-name4");
    var i4 = document.getElementById("item-name5");
    var i5 = document.getElementById("item-name6");
    var i6 = document.getElementById("item-name7");
    var i7 = document.getElementById("item-name8");
    var i8 = document.getElementById("item-name9");
    var i9 = document.getElementById("item-name10");
    if (i.style.display === "none") {
        i.style.display = "block";
        i1.style.display = "block";
        i2.style.display = "block";
        i3.style.display = "block";
        i4.style.display = "block";
        i5.style.display = "block";
        i6.style.display = "block";
        i7.style.display = "block";
        i8.style.display = "block";
        i9.style.display = "block";
        i.style.width = "170px";
        i.style.transition = "ease-in-out 0.7s";
    } 
    else {
        i.style.display = "none";
        i1.style.display = "none";
        i2.style.display = "none";
        i3.style.display = "none";
        i4.style.display = "none";
        i5.style.display = "none";
        i6.style.display = "none";
        i7.style.display = "none";
        i8.style.display = "none";
        i9.style.display = "none";
        i.style.width = "0px";   
    }   
}    
</script>

<main id="content" class="content">
	<div class="news_container" style="width: 400px;">
		<h2>Add New Classroom</h2>
		<hr><br>
			<form action="manageClassroom.php" method="POST">
 				
				<input type="text" name="lecture_hall" placeholder="Lecture Hall Name" required="required"/>
				<input type="text" name="lecture_hall_capacity" placeholder="Capacity of the Lecture Hall" required="required"/>
                <select name="floor" required="required">
                    <option value="">Select Level</option>
                    <option value="Ground Floor">Ground Floor</option>
                    <option value="First Floor">First Floor</option>
                </select>   
                <div style="width: 100%; height: 47px; overflow: hidden; margin-top: 15px;">
                <button type="submit" name="add_class" style="float: none; margin: 0 auto; display: inherit; width: auto; padding: 0px 20px;">Add Classroom</button>
                </div>
			</form>
	</div>

    <div class="message_container" style="width: 700px;">
        <h2>Manage Classrooms</h2>
        <hr><br>
        <?php classroom_list(); ?>
    </div>

</main>

<?php if(isset($_GET['err'])){error_message($_GET['err']);} ?>
<?php if(isset($_GET['msg'])){message($_GET['msg']);} ?>
<?php include 'include/footer.html' ?>
</body>
</html>
