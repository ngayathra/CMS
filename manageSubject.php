<?php
	include 'database/dbconn.php';
	session_start();
    include 'function.php';
    admin_only();
?>




<?php 
    // create a new notice
    if(isset($_POST['add_subject'])){ //if the post-message button set then get the values in the input boxes
        $subject_code = real_input($_POST['subject_code']);
        $subject_name = real_input($_POST['subject_name']);
        $sem = $_POST['semester'];        
        $lecturer = real_input($_POST['lecturer']); 
        $no_of_student = $_POST['students'];


    
    $sql = "INSERT INTO subjects(subject_code, subject_name, semester, lecturer_id, number_of_students) VALUES ('$subject_code', '$subject_name', '$sem', '$lecturer', '$no_of_student')";
    $result = mysqli_query($conn, $sql);
    if($result){
        header('Location: manageSubject.php?msg=subject was created successfully');
    }
    else {
        header('Location: manageSubject.php?err=subject was not created');
    }
}
 ?>

 <?php 

 global $conn;
    if(isset($_GET['update_subject'])){
      $subject_id = $_GET['subject_id'];
      $subject_code = real_input($_GET['subject_code']);
      $subject_name = real_input($_GET['subject_name']);
      $lecturer_id =  $_GET['lecturer'];
      $semester = $_GET['semester'];    
      $no_of_student = $_GET['students'];

       $sql = "UPDATE subjects SET subject_code = '{$subject_code}', subject_name= '{$subject_name}', semester = '{$semester}', lecturer_id = '{$lecturer_id}', number_of_students = '{$no_of_student}' WHERE subject_id = '{$subject_id}'";

       $result = mysqli_query($conn, $sql);
       if($result){

              header('Location: manageSubject.php?msg=Subject was updated successfully');
    }
    else {
        header('Location: manageSubject.php?err=Subject was not updated');
    }
}
  ?>

 <?php 
    if(isset($_GET['remove_subject'])){
       $subject_id = $_GET['subject_id'];

       $sql ="DELETE FROM subjects  WHERE subject_id = '{$subject_id}' LIMIT 1";
       $result = mysqli_query($conn, $sql);

       if($result){
        header('Location: manageSubject.php?msg=subject was deleted successfully');
        }
        else {
        header('Location: manageSubject.php?err=subject was not deleted');
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
	<div class="news_container" style="width: 700px; margin: 20px auto; float: none;" >
		<h2>Add New Subject</h2>
		<hr><br>
			<form action="manageSubject.php" method="POST" style="height: auto;">
 				
                <input type="text" name="subject_code" placeholder="Subject Code" required="required"/>
				<input type="text" name="subject_name" placeholder="Subject Name" required="required"/>
                <input type="text" name="students" placeholder="No. of Students" required="required" />
                <select name="semester" required="required">
                    <option value=""> Select:- Year - Semester</option>
                    <option value="1">1st year - Semester I  </option>
                    <option value="2">1st year - Semester II  </option>
                    <option value="3">2nd year - Semester I  </option>
                    <option value="4">2nd year - Semester II  </option>
                    <option value="5">3rd year - Semester I  </option>
                    <option value="6">3rd year - Semester II  </option>
                    <option value="7">4th year - Semester I  </option>
                    <option value="8">4th year - Semester II  </option>
                </select>  
                <?php 
                  echo  lecturer_list_subject();

                 ?>
                <div style="width: 100%; height: 47px; overflow: hidden; margin-top: 15px;">
                <button type="submit" name="add_subject" style="float: none; margin: 0 auto; display: inherit; width: auto; padding: 0px 20px;">Add Subject</button>
                </div>
			</form>
	</div>

    <div class="message_container" style="width: 97%px;">
        <h2>Manage Subjects</h2>
        <hr><br>

        <style>
            table {border-collapse: collapse; /*width: 100%;*/ height: 90%;}
            th, td {text-align: center;padding: 5px;}
            tr:nth-child(even){background-color: #f2f2f2; /*font-weight: bold;*/}
            th {background-color: #009688;color: white;}
            /*.cycle-slideshow{margin-bottom: 70px;}*/

        </style>
        <?php subject_list(); ?>
    </div>

</main>

<?php if(isset($_GET['err'])){error_message($_GET['err']);} ?>
<?php if(isset($_GET['msg'])){message($_GET['msg']);} ?>
<?php include 'include/footer.html' ?>
</body>
</html>
