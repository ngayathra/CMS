<?php
    include 'database/dbconn.php';
    session_start();
    include 'function.php';
?>

<?php 

if(isset($_SESSION['id'])){

    if($_GET['classroom'] !== '' && $_GET['subject_id'] !== ''){
        

    }else{
        header('Location: edituser.php?err=please select required fields');
    }
}else{
    header('Location: index.php?err=please login');
}
?>


 <?php
    if(isset($_GET['do_attendance'])){
        

        $semester_id = $_GET['semester'];
        $department_id = $_GET['department'];
        $subject_id = $_GET['subject_id'];
        $classroom_id = $_GET['classroom'];
        $lecturer_id = $_SESSION['id'];
       
       //check if there any previous lecture session is still not ended
        $query = "SELECT lecturer_id FROM class_room WHERE lecturer_id = $lecturer_id";
        $result = mysqli_query($conn, $query);
        $checkresult = mysqli_num_rows($result);
        if($checkresult >0){
            header('Location: edituser.php?err=please end your previous lecture session');
            exit();
        }
        else{          

        $sql = "SELECT subject_name, number_of_students FROM subjects WHERE subject_id = $subject_id LIMIT 1";
        $result = mysqli_query($conn, $sql);
        $checkresult = mysqli_num_rows($result);
       
        if($checkresult >0){
            while ($row = mysqli_fetch_assoc($result)) {
                $subject_name = $row['subject_name'];
                $number_of_students = $row['number_of_students'];
            }
        }

        $query = "UPDATE class_room SET subject_name ='$subject_name', busy = 1, current_capacity = '$number_of_students', lecturer_id = '$lecturer_id' WHERE id = '$classroom_id' LIMIT 1";
        $result = mysqli_query($conn, $query);

    }
}
else{
        header('Location: please click on GO button! ');
    }

?>

<?php include 'include/head.html'; ?>
<body>

<?php include 'include/topbar.php'; ?> <!-- login/logout top bar section file attachment -->
<?php include 'include/navigation.php'; ?>

<div class="department_container" >
    <style type="text/css">td{text-align: left;}</style>
        <h2>Mark Student Attendance</h2>
        <br><hr>
        <?php
            if(isset($_GET['do_attendance'])){        
                    $semester_id = $_GET['semester'];
                    $department_id = $_GET['department'];

                    student_attendance($semester_id, $department_id);
 
                }else{
                    header('Location: please click on GO button! ');
                }
        ?>
</div>


<script src="js/jquery-3.2.1.min.js"></script>

<?php if(isset($_GET['err'])){error_message($_GET['err']);} ?>
<?php if(isset($_GET['msg'])){message($_GET['msg']);} ?>
</body>
<?php include 'include/footer.html' ?>
</html>