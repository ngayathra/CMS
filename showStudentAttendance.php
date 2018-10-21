<?php
    include 'database/dbconn.php';
    session_start();
    include 'function.php';
        admin_only();
?>

<?php 
if(isset($_POST['export_student_attendance'])){
        $semester = $_POST['semester'];
        $department =$_POST['department'];
        $subject = $_POST['subject'];

        export_table();
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
<div style="margin: auto; width: 1000px; overflow: hidden;">
<!-- - - - - - - - - - - - - - - - -  show timetable request form div - - - - - - - - - - - - - -  -->
   <div class="add_user_container" style="max-width: 450px; float: left; margin-left: 13px;">
        <style type="text/css">
        td{text-align: center;}
        .add_user_container{/*float: none; */margin: 15px auto;}
        .add_user_container form select{ padding-left: 15px; width: 70%; font-size: 12pt; }
        .add_user_container form{margin-bottom: 0px;}
        </style>
            
            <h2>Show Student Attendance</h2>
            
            <hr><br>
        <form action="<?php $_SERVER['PHP_SELF']; ?>" method='POST'>
    	<div style='margin:10px auto; width:100%px;'>
       	 		Semester 
        		<select name="semester">
        			<option value="">Select Year &amp; Semester</option>
                    <option value="1">1st year - Semester I  </option>
                    <option value="2">1st year - Semester II  </option>
                    <option value="3">2nd year - Semester I  </option>
                    <option value="4">2nd year - Semester II  </option>
                    <option value="5">3rd year - Semester I  </option>
                    <option value="6">3rd year - Semester II  </option>
                    <option value="7">4th year - Semester I  </option>
                    <option value="8">4th year - Semester II  </option>
                </select>
                <br />
    			
    			Department 
    			<select name='department'>
    				<option value="">Select Department</option>
                    <option value='1'>MIT</option>
                    <option value='2'>BBA</option>
                    <option value='3'>B.Com</option>
                </select>
                <br />

                Subjects
                <select name="subject">
                <?php
                $s = "";
				$sql = "SELECT * FROM subjects";
				$result = mysqli_query($conn, $sql);
				$s .= "<option value=''>Select a subject</option>";
				if($result){
					while($row = mysqli_fetch_assoc($result)){
						$s .= "<option value={$row['subject_id']}>";
						$s .= "{$row['subject_name']}";
						$s .= "</option>";
					}echo $s;
				}
				?>
                </select>
                	
    	</div>
        <div style='width: 100%; height: 47px; overflow: hidden; margin-top: 15px;'>
            <button type='submit' name='department_wise_att' style='float: none; margin: 0 auto; display:inherit; width:auto; padding: 0px 20px;'>Show Attendance
            </button>
        </div>  
        </form>      
    </div>
<!-- - - - - - - - - - - - - - - - -  export timetable request form div - - - - - - - - - - - - - -  -->
   <div class="add_user_container" style="max-width: 450px; float: right; margin-right: 13px;">
    <style type="text/css">
    .add_user_containre form button{background: #009688;}
    </style>
            <h2>Export Student Attendance</h2>
            
            <hr><br>
        <form action="getAttendance.php" method='POST'>
        <div style='margin:10px auto; width:100%px;'>
                Semester 
                <select name="semester">
                    <option value="">Select Year &amp; Semester</option>
                    <option value="1">1st year - Semester I  </option>
                    <option value="2">1st year - Semester II  </option>
                    <option value="3">2nd year - Semester I  </option>
                    <option value="4">2nd year - Semester II  </option>
                    <option value="5">3rd year - Semester I  </option>
                    <option value="6">3rd year - Semester II  </option>
                    <option value="7">4th year - Semester I  </option>
                    <option value="8">4th year - Semester II  </option>
                </select>
                
                
                Department 
                <select name='department'>
                    <option value="">Select Department</option>
                    <option value='1'>MIT</option>
                    <option value='2'>BBA</option>
                    <option value='3'>B.Com</option>
                </select>
                

                Subjects
                <select name="subject">
                <?php
                $s = "";
                $sql = "SELECT * FROM subjects";
                $result = mysqli_query($conn, $sql);
                $s .= "<option value=''>Select a subject</option>";
                if($result){
                    while($row = mysqli_fetch_assoc($result)){
                        $s .= "<option value={$row['subject_id']}>";
                        $s .= "{$row['subject_name']}";
                        $s .= "</option>";
                    }echo $s;
                }
                ?>
                </select>
                    
        </div>
            <div style='width: 100%; height: 47px; overflow: hidden; margin-top: 15px;'>          
                <button name="export_student_attendance" value="submit" style='float: none; margin: 0 auto; display:inherit; width:auto; padding: 0px 20px;'>Export Attendance
                </button>
         </div>   
        </form>      
    </div>
</div>

    <div class="add_user_container" style="max-width: 1000px; float: none;">
        <style type="text/css">
            td{text-align: center;}
            table {border-collapse: collapse;height: 90%; margin:0 auto; line-height:auto; width:98%; text-align:center;}
            th, td {text-align: left;padding: 8px;}
            tr:nth-child(even){background-color: #f2f2f2; /*font-weight: bold;*/}
            th {background-color: #009688;color: white;}
        </style>
        <h2>Generate Student Attendance</h2>
        <hr><br>


    <?php 
	if(isset($_POST['department_wise_att'])){
		$semester = $_POST['semester'];
		$department =$_POST['department'];
		$subject = $_POST['subject'];

        $sql = "SELECT subject_name FROM subjects WHERE subject_id = '$subject' LIMIT 1";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0){
            while ( $s = mysqli_fetch_assoc($result)) {
                
            $subjectname = $s['subject_name'];
            }
        }
    
		// echo $semester;
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
			$attendanceTable .= "<table style='margin:0 auto; width:900px; line-height:32px; text-align:center;'>";
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
		echo $attendanceTable;
		}
	}        	
?>
</div>

</main>


<script src="js/jquery-3.2.1.min.js"></script>

<?php if(isset($_GET['err'])){error_message($_GET['err']);} ?>
<?php if(isset($_GET['msg'])){message($_GET['msg']);} ?>
</body>
<?php include 'include/footer.html' ?>
</html>