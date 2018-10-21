<?php
    include 'database/dbconn.php';
    session_start();
    include 'function.php';
?>

<?php 
if(isset($_SESSION['id']) && isset($_POST['submit_attendance'])){

}else
{
    header('Location: index.php?err=please login');
}
 ?>


<?php

global $conn;
if(isset($_POST['submit_attendance'])){

        if($_POST['subject_id'] == ""){

            header('Location: edituser.php?err=please select a subject');
            exit();
        }
        else{
            
    $count=$_POST['students_count'];
        for($x=1; $count>=$x; $x++ ){
    $student_id = $_POST['student'.$x];
    $attendance =  $_POST['attendance' . $x];
    $student_reg_no =$_POST['student_reg_no'.$x];
    $department = $_POST['department' .$x];

    $semester = $_POST['semester'];
    $lecturer_id = $_POST['lecturer_id'];
    $subject_id = $_POST['subject_id'];
    $date =  date('Y-m-d H:i:s');

    $sql = "INSERT INTO student_attendance(student_id, student_reg_no, lecturer_id, subject_id, semester_id, department_id, attendance_date, attendance) VALUES('$student_id', '$student_reg_no', '$lecturer_id', '$subject_id', '$semester', '$department', '$date', '$attendance')";
    $result = mysqli_query($conn, $sql);
    if($result){
        header('Location: edituser.php?msg=attendance saved');
        echo $subject_id;
    }else{
        header('Location: edituser.php?err=attendance not saved');
    }
    
        }
}

}else{
    header('Location: edituser.php?err=try again');
}



?>
