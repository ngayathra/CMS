<?php
    include 'database/dbconn.php';
    session_start();
    include 'function.php';
    admin_only();
?>

 <?php 
    if(isset($_GET['update_student'])){
      $student_id = $_GET['student_id'];
      $student_name = real_input($_GET['student_name']);
      $student_reg_no = real_input($_GET['student_reg_no']);
      $semester_id = $_GET['semester'];
       if($_GET['department'] == 'MIT'){
        $department = 1;
        }
        if($_GET['department'] == 'BBA'){
        $department = 2;
        }
        if($_GET['department'] == 'B.Com'){
        $department = 3;
        }

       $sql ="UPDATE students SET student_name = '{$student_name}', student_reg_no = '{$student_reg_no}', semester = '{$semester_id}' , department_id = '{$department}' WHERE student_id = '{$student_id }' LIMIT 1";

       $result = mysqli_query($conn, $sql);
       
       if($result){
                header('Location: manageStudent.php?msg=student was updated successfully');
        }
         else {
                header('Location: manageStudent.php?err=student was not updated');
        }
}
  ?>


<?php 

    if(isset($_GET['remove_student']))
        if(isset($_GET['student_id'])){
            $student_id= $_GET['student_id'];
            $sql = "DELETE FROM students WHERE student_id = '{$student_id}'  LIMIT 1"; //should use AND operator in the query

            $result = mysqli_query($conn, $sql);
            if($result){
                header('Location: manageStudent.php?msg=Student removed');
            }
            else{
                header('Location: manageStudent.php?msg=student was not removed');
            }
        } 
     ?>
     
<?php include 'include/head.html'; ?>
<body>
<?php include 'include/topbar.php' ?>

<div class="dashboard_container" id="d">
        <header><div id="item-name"><a href="dashboard.php" style="text-decoration: none; color: white;"> DashBoard</a> </div></header>
        <?php include 'include/dashboard-items.php' ?>  <!-- calling dashboard items -->
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
   

        <div class="message_container" style="max-width: 1200px;">
        <style type="text/css">
        td{
            text-align: center;
        }
        </style>
            <h2>Manage Students</h2>
            <hr><br>
                <?php student_table(); ?>
        </div>

</main>


<script src="js/jquery-3.2.1.min.js"></script>

<?php if(isset($_GET['err'])){error_message($_GET['err']);} ?>
<?php if(isset($_GET['msg'])){message($_GET['msg']);} ?>
<?php include 'include/footer.html' ?>
</body>
</html>
