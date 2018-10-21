<?php
    include 'database/dbconn.php';
    session_start();
    include 'function.php';
    admin_only();
?>


<?php
 global $conn;
if(isset($_POST['add_table'])){

$semester_id  = $_POST['semester'];
$department_id = $_POST['department'];


// $query = "SELECT semester_id, department_id FROM timetable WHERE semester_id = '{$semester_id}' AND department_id = '{$department_id}';";
$query = "SELECT semester_id, department_id FROM timetable WHERE semester_id = '$semester_id' AND department_id = '$department_id'";
$result = mysqli_query($conn, $query);
$check_result = mysqli_num_rows($result);
if($check_result > 0){
// echo $semester_id . $department_id;
	header('Location: timetable.php?err=Timetable exists');
}
else{
	
      
$mondaysubject1 = " Lecture Hall: ". $_POST['mondayclass1'] ." Lecturer: ". $_POST['mondaylecturer1'] . " Subject: " . $_POST['mondaysubject1'];

$tuesdaysubject1 = " Lecture Hall: " . $_POST['tuesdayclass1'] . " Lecturer: " . $_POST['tuesdaylecturer1'] . " Subject: " . $_POST['tuesdaysubject1'];

$wednsdaysubject1 = " Lecture Hall: " . $_POST['wednsdayclass1'] . " Lecturer: " . $_POST['wednsdaylecturer1'] . " Subject: " .$_POST['wednsdaysubject1'];

$thursdaysubject1 = " Lecture Hall: " . $_POST['thursdayclass1'] . " Lecturer: " . $_POST['thursdaylecturer1'] . " Subject: " . $_POST['thursdaysubject1'];

$fridaysubject1 = " Lecture Hall: " . $_POST['fridayclass1'] . " Lecturer: " . $_POST['fridaylecturer1'] . " Subject: " . $_POST['fridaysubject1'];



$mondaysubject2 = " Lecture Hall: " . $_POST['mondayclass2'] . " Lecturer: " . $_POST['mondaylecturer2'] . " Subject: " . $_POST['mondaysubject2'];

$tuesdaysubject2 = " Lecture Hall: " . $_POST['tuesdayclass2'] . " Lecturer: " . $_POST['tuesdaylecturer2'] . " Subject: " . $_POST['tuesdaysubject2'];

$wednsdaysubject2 = " Lecture Hall: " . $_POST['wednsdayclass2'] . " Lecturer: " . $_POST['wednsdaylecturer2'] . " Subject: " . $_POST['wednsdaysubject2'];

$thursdaysubject2 = " Lecture Hall: " . $_POST['thursdayclass2'] . " Lecturer: " . $_POST['thursdaylecturer2'] . " Subject: " . $_POST['thursdaysubject2'];

$fridaysubject2 = " Lecture Hall: " . $_POST['fridayclass2'] . " Lecturer: " . $_POST['fridaylecturer2'] . " Subject: " . $_POST['fridaysubject2'];



$mondaysubject3 = " Lecture Hall " . $_POST['mondayclass3'] . " Lecturer: " . $_POST['mondaylecturer3'] . " Subject: " . $_POST['mondaysubject3'];

$tuesdaysubject3 = " Lecture Hall " . $_POST['tuesdayclass3'] . " Lecturer: " . $_POST['tuesdaylecturer3'] . " Subject: " . $_POST['tuesdaysubject3'];

$wednsdaysubject3 = " Lecture Hall " . $_POST['wednsdayclass3'] . " Lecturer: " . $_POST['wednsdaylecturer3'] . " Subject: " . $_POST['wednsdaysubject3'];

$thursdaysubject3 = " Lecture Hall " . $_POST['thursdayclass3'] . " Lecturer: " . $_POST['thursdaylecturer3'] . " Subject: " . $_POST['thursdaysubject3'];

$fridaysubject3 = " Lecture Hall " . $_POST['fridayclass3'] . " Lecturer: " . $_POST['fridaylecturer3'] . " Subject: " . $_POST['fridaysubject3'];



$mondaysubject4 = " Lecture Hall: " . $_POST['mondayclass4'] . " Lecturer: " . $_POST['mondaylecturer4'] . " Subject: " . $_POST['mondaysubject4'];

$tuesdaysubject4 = " Lecture Hall: " . $_POST['tuesdayclass4'] . " Lecturer: " . $_POST['tuesdaylecturer4'] . " Subject: " . $_POST['tuesdaysubject4'];

$wednsdaysubject4 = " Lecture Hall: " . $_POST['wednsdayclass4'] . " Lecturer: " . $_POST['wednsdaylecturer4'] . " Subject: " . $_POST['wednsdaysubject4'];

$thursdaysubject4 = " Lecture Hall: " . $_POST['thursdayclass4'] . " Lecturer: " . $_POST['thursdaylecturer4'] . " Subject: " . $_POST['thursdaysubject4'];

$fridaysubject4 = " Lecture Hall: " . $_POST['fridayclass4'] . " Lecturer: " . $_POST['fridaylecturer4'] . " Subject: " .  $_POST['fridaysubject4'];



$mondaysubject5 = " Lecture Hall: " . $_POST['mondayclass5'] . " Lecturer: " . $_POST['mondaylecturer5'] . " Subject: " . $_POST['mondaysubject5'];

$tuesdaysubject5 = " Lecture Hall: " . $_POST['tuesdayclass5'] . " Lecturer: " . $_POST['tuesdaylecturer5'] . " Subject: " . $_POST['tuesdaysubject5'];

$wednsdaysubject5 = " Lecture Hall: " . $_POST['wednsdayclass5'] . " Lecturer: " . $_POST['wednsdaylecturer5'] . " Subject: " . $_POST['wednsdaysubject5'];

$thursdaysubject5 = " Lecture Hall: " . $_POST['thursdayclass5'] . " Lecturer: " . $_POST['thursdaylecturer5'] . " Subject: " . $_POST['thursdaysubject5'];

$fridaysubject5 = " Lecture Hall: " . $_POST['fridayclass5'] . " Lecturer: " . $_POST['fridaylecturer5'] . " Subject: " . $_POST['fridaysubject5'];



$mondaysubject6 = " Lecture Hall: " . $_POST['mondayclass6'] . " Lecturer: " . $_POST['mondaylecturer6'] . " Subject: " . $_POST['mondaysubject6'];

$tuesdaysubject6 = " Lecture Hall: " . $_POST['tuesdayclass6'] . " Lecturer: " . $_POST['tuesdaylecturer6'] . " Subject: " . $_POST['tuesdaysubject6'];

$wednsdaysubject6 = " Lecture Hall: " . $_POST['wednsdayclass6'] . " Lecturer: " . $_POST['wednsdaylecturer6'] . " Subject: " . $_POST['wednsdaysubject6'];

$thursdaysubject6 = " Lecture Hall: " . $_POST['thursdayclass6'] . " Lecturer: " . $_POST['thursdaylecturer6'] . " Subject: " . $_POST['thursdaysubject6'];

$fridaysubject6 = " Lecture Hall: " . $_POST['fridayclass6'] . " Lecturer: " . $_POST['fridaylecturer6'] . " Subject: " . $_POST['fridaysubject6'];



$mondaysubject7 = " Lecture Hall: " . $_POST['mondayclass7'] . " Lecturer: " . $_POST['mondaylecturer7'] . " Subject:  " . $_POST['mondaysubject7'];

$tuesdaysubject7 = " Lecture Hall: " . $_POST['tuesdayclass7'] . " Lecturer: " .  $_POST['tuesdaylecturer7'] . " Subject:  " . $_POST['tuesdaysubject7'];

$wednsdaysubject7 = " Lecture Hall: " . $_POST['wednsdayclass7'] . " Lecturer: " . $_POST['wednsdaylecturer7'] . " Subject:  " . $_POST['wednsdaysubject7'];

$thursdaysubject7 = " Lecture Hall: " . $_POST['thursdayclass7'] . " Lecturer: " . $_POST['thursdaylecturer7'] . " Subject:  " . $_POST['thursdaysubject7'];

$fridaysubject7 = " Lecture Hall: " . $_POST['fridayclass7'] . " Lecturer: " . $_POST['fridaylecturer7'] . " Subject:  " . $_POST['fridaysubject7'];


// $semester_id = $_POST['semester'];
// $department_id = $_POST['department'];
 







$sql = "INSERT INTO timetable 
	(semester_id, department_id, time_of, monday, tuesday, wednsday, thursday, friday)
VALUES
    ('$semester_id', '$department_id', '8.30-9.30', '$mondaysubject1', '$tuesdaysubject1', '$wednsdaysubject1', '$thursdaysubject1', '$fridaysubject1'),

    ('$semester_id', '$department_id', '9.30-10.30', '$mondaysubject2', '$tuesdaysubject2', '$wednsdaysubject2', '$thursdaysubject2', '$fridaysubject2'),

    ('$semester_id', '$department_id', '10.30-11.30', '$mondaysubject3', '$tuesdaysubject3', '$wednsdaysubject3', '$thursdaysubject3', '$fridaysubject3'),

    ('$semester_id', '$department_id', '11.30-12.30', '$mondaysubject4', '$tuesdaysubject4', '$wednsdaysubject4', '$thursdaysubject4', '$fridaysubject4'),

    ('$semester_id', '$department_id', '1.30-2.30', '$mondaysubject5', '$tuesdaysubject5', '$wednsdaysubject5', '$thursdaysubject5', '$fridaysubject5'),

    ('$semester_id', '$department_id', '2.30-3.30', '$mondaysubject6', '$tuesdaysubject6', '$wednsdaysubject6', '$thursdaysubject6', '$fridaysubject6'),

    ('$semester_id', '$department_id', '3.30-4.30', '$mondaysubject7', '$tuesdaysubject7', '$wednsdaysubject7', '$thursdaysubject7', '$fridaysubject7')";


			$result = mysqli_query($conn, $sql);
			if($result){
				header('Location: timetable.php?msg=Timetable was added successfully');
			}
			else{
				header('Location:timetable.php?err=Timetable was not added');
			}
}
}

?>