<?php
	include 'database/dbconn.php';
	session_start();
    include 'function.php';
    admin_only();
?>

<?php 
    // add new student
    if(isset($_POST['add_student'])){ 

        //if the add_student button set then get the values in the input boxes
        //assigned input values into the variables
        $student_name = real_input($_POST['student_name']);
        $student_reg_no = real_input($_POST['student_reg_no']);
        $semester = $_POST['semester'];        
        $student_department = $_POST['department'];

        //create a query to check the entered student reg. no. exits or not
        $sql = "SELECT student_reg_no FROM students WHERE student_reg_no = '$student_reg_no'";
        $result = mysqli_query($conn, $sql);

        //check if there is any row exists
        if(mysqli_num_rows($result) > 0){
            header('Location: addStudent.php?err=student registration number exists');
            exit(); 
            //if result found then redirect to the addStudent.php page with error message
        }
        else{

        //inserting data into the table by the query
        $sql = "INSERT INTO students(student_name, student_reg_no, semester, department_id) 
                VALUES ('$student_name', '$student_reg_no', '$semester', '$student_department')";
                
        //execute the query and assigned the output into $result variable
        $result = mysqli_query($conn, $sql); 
        if($result){
            header('Location: addStudent.php?msg=new student added successfully');
        }
        else {
            header('Location: addStudent.php?err=student was not added');
        }
    }
}
?>

<?php include 'include/head.html'; ?>
<body>
<?php include 'include/topbar.php' ?>

<div class="dashboard_container" id="d">
        <header><div id="item-name"><a href="dashboard.php" style="text-decoration: none; color: white;"> DashBoard</a></div></header>
        <?php include 'include/dashboard-items.php' ?> 	<!-- calling dashboard items -->

</div>      <!-- end of the dashboard pannel-->
<script>    // toggle function of the admin's dashboard panel
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
	<div class="news_container" style="width: 1000px; float: none; margin: 20px auto;">
		<h2>Add New Student</h2>
		<hr><br>
			<form action="addStudent.php" method="POST" style="height: auto;">
 				
				<input type="text" name="student_name" placeholder="Student's Name" required="required" />
				<input type="text" name="student_reg_no" placeholder="Registration No. of Student" required="required"/>
                <select name="department" required="required">
                    <option value="">Select a Department</option>
                    <option value="1">MIT</option>
                    <option value="2">BBA</option>
                    <option value="3">B.Com</option>
                </select>
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

                <div style="width: 100%; height: 47px; overflow: hidden; margin-top: 15px;">
                    <button type="submit" name="add_student" style="float: none; margin: 0 auto; display: inherit; width:auto; padding: 0px 20px;">Add New Student</button>
                </div>
			</form>
	</div>

</main>
<?php if(isset($_GET['err'])){error_message($_GET['err']);} ?>
<?php if(isset($_GET['msg'])){message($_GET['msg']);} ?> <!-- if there is a message this function will execute -->
</body>
<?php include 'include/footer.html' ?>
</html>
