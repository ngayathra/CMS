<?php 
session_start(); //session should be started, because access is restriced. **only admin**
include 'database/dbconn.php';
include 'function.php';
admin_only();


if($_POST['semester'] === "" || $_POST['department'] === "" || $_POST['subject'] === ""){
	header('Location: showStudentAttendance.php?err=fill the required field');
}

	if(isset($_POST['export_student_attendance'])){


		$semester = $_POST['semester'];
		$department =$_POST['department'];
		$subject = $_POST['subject'];
		// echo $semester;
		$sql = "SELECT subject_name FROM subjects WHERE subject_id = '$subject' LIMIT 1";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0){
            while ( $s = mysqli_fetch_assoc($result)) {
                
            $subjectname = $s['subject_name'];
            }
        }
					if($semester == 1 || $semester == 2){
                		$year = "1 <sup>st</sup>";
                	}
                	if($semester == 3 || $semester == 4){
                		$year = "2 <sup>nd</sup>";
                	}
                	if($semester == 5 || $semester == 6){
                		$year = "3 <sup>rd</sup>";
                	}
                	if($semester == 7 || $semester == 8){
                		$year = "4 <sup>th</sup>";
                	}

                	if($semester == 1 || $semester == 3 || $semester == 5 || $semester == 7){
                		$sem = "1 <sup>st</sup>";
                	}
                	if($semester == 2 || $semester == 4 || $semester == 6 || $semester == 8){
                		$sem = "2 <sup>nd</sup>";
                	}
                	if($department == 1){
                		$dep = "MIT";
                	}
                	if($department == 2){
                		$dep = "BBA";
                	}
                	if($department == 3){
                		$dep = "B.Com";
                	}

		$query = "SELECT s.student_reg_no, s.student_name, sub.subject_name, /* subject name optional*/
   					SUM(attendance = 1) AS presentCount,
   					COUNT(*) AS totalCount,
   					(SUM(attendance = 1) * 100) / COUNT(*) AS percent  
					FROM
					   student_attendance sa
					   INNER JOIN students s ON s.student_id = sa.student_id
					   INNER JOIN subjects sub ON sub.subject_id = sa.subject_id /* subject table optional*/
					WHERE
					   semester_id = '$semester' AND sa.subject_id = '$subject' AND s.department_id = '$department'
					GROUP BY
					   student_reg_no
					   ORDER BY s.student_reg_no";

		$result = mysqli_query($conn, $query);
		if(mysqli_num_rows($result)){
			$attendanceTable = "";
			$attendanceTable .= "<h2> $subjectname </h2>";
			$attendanceTable .= "<h2> Attendance of {$dep} {$year} Year {$sem} Semester </h2><br />";
			$attendanceTable .= "<table border=1 style='margin:0 auto; width:900px; line-height:32px; text-align:center;'>";
			$attendanceTable .= "<tr>";
			$attendanceTable .= "<th>No.</th>";
			$attendanceTable .= "<th>Student Name</th>";
			$attendanceTable .= "<th>Student Reg. No.</th>";
			$attendanceTable .= "<th>Percentage</th>";
			$attendanceTable .= "<th>Attendance</th>";
			
			$x=0;
			while ($row = mysqli_fetch_assoc($result)) {
				$x++;
				$attendanceTable .= "<tr>";
				$attendanceTable .= "<td>{$x}</td>";
				$attendanceTable .= "<td>{$row['student_name']}</td>";
				$attendanceTable .= "<td>{$row['student_reg_no']}</td>";
				$attendanceTable .= "<td>{$row['percent']}</td>";
				$attendanceTable .= "<td>{$row['presentCount']}</td>";
				$attendanceTable .= "</tr>";
				
			}
			$attendanceTable .= "</table>";
		header("Content-Type: applicaion/xls");
		header("Content-Disposition: attachment; filename= " . date('Y/m/d') ." attendance.xls");
		echo $attendanceTable;
		// echo $subjectname;
		}
	}        	

