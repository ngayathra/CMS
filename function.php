<?php 

/* to filter out the data which are inster by the user */

function real_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

/* -------------------------------- -- For the creation of timetable in the timetable.php page -- -------------------------------- */
function timetable(){
	global $conn;

	$table = "";
	$table .= "<form method='GET' action='#'>";
	$table .= "<div style='margin:10px auto; width:400px;'>";
	$table .= "Semester <select name='semester'>
                    <option value='1'>Semester - I</option>
                    <option value='2'>Semester - II</option>
                    <option value='3'>Semester - III</option>
                    <option value='4'>Semester - IV</option>
                    <option value='5'>Semester - V</option>
                    <option value='6'>Semester - VI</option>
                    <option value='7'>Semester - VII</option>
                    <option value='8'>Semester - VIII</option>
                </select> ";
    $table .= " Department <select name='department'>
                    <option value='1'>MIT</option>
                    <option value='2'>BBA</option>
                    <option value='3'>B.Com</option>
                </select> ";
    $table .= "</div>";
	$table .= "<table border=1 style='margin:0 auto; width:900px; line-height:32px; text-align:center;'>";
	$table .= "<tr>";
	$table .= "<th> Time </th>";
	$table .= "<th> Monday </th>";
	$table .= "<th> Tuesday </th>";
	$table .= "<th> Wednsday </th>";
	$table .= "<th> Thursday </th>";
	$table .= "<th> Friday </th>";
	$table .= "</tr>";

	$sql = "SELECT * FROM timetable";
	$result = mysqli_query($conn, $sql);

	if($result){
		while($row = mysqli_fetch_assoc($result)){
			$table .= "<tr>";
			
			$table .= "<td>";
			$table .= "{$row['time']}";
			$table .= "</td>";


			$table .= "<td>";  
			$table .= lecturer_list_for_subject_list(); 
			$table .= classroom_for_timetable();
			$table .= "</td>";

			$table .= "<td>";  
			$table .= lecturer_list_for_subject_list(); 
			$table .= classroom_for_timetable();
			$table .= "</td>";

			$table .= "<td>";  
			$table .= lecturer_list_for_subject_list();
			$table .= classroom_for_timetable(); 
			$table .= "</td>";

			$table .= "<td>";  
			$table .= lecturer_list_for_subject_list(); 
			$table .= classroom_for_timetable();
			$table .= "</td>";

			$table .= "<td>";  
			$table .= lecturer_list_for_subject_list(); 
			$table .= classroom_for_timetable();
			$table .= "</td>";
			
		
			
			$table .= "</tr>";
		}
	}
			 

			$table .= "</table>";
			$table .= "<div style='width: 100%; height: 47px; overflow: hidden; margin-top: 15px;'>";

            $table .= "<button type='submit' name='add_table' style='float: none; margin: 0 auto; display: 				inherit; width:auto; padding: 0px 20px;'>Add timetable</button>";
            $table .= "</div>";
            
			$table .= "</form>";
			echo $table;
}



/* ----------------------------- -- listout lecturers name for the subject list -- -------------------------------------	*/

function lecturer_list_for_subject_list(){
	global $conn;
	$sql = "SELECT * FROM lecturer_attendance_table";
	$result = mysqli_query($conn, $sql);

	$lecturer_name ="";
	$lecturer_name .= "<select name='lecturer'>";
		while($row = mysqli_fetch_assoc($result)){
				$lecturer = $row['name'];
				$lecturer_id = $row['id'];
				$lecturer_name .= "<option VALUE={$lecturer_id}>";
				$lecturer_name .= $lecturer;
				$lecturer_name .= "</option>";
		 } $lecturer_name .= "</select>";
		 return $lecturer_name;
}


/* ------------------------------ -- listout the all subject as a list in the managesubject.php page -- ----------------------------  */

function subject_list(){
	global $conn;

	$sql = "SELECT * FROM subjects s INNER JOIN lecturer_attendance_table l ON s.lecturer_id = l.id ORDER BY subject_id ";
	$result = mysqli_query($conn, $sql);

	if($result){
		$subjects = "";
			$subjects .= "<table style='margin:0 auto; width:99%px; line-height:32px; text-align:center;'>";
			$subjects .= "<tr>";
			// $subjects .= "<th>Subject ID</th>";
			$subjects .= "<th>Subject Code </th>";
			$subjects .= "<th>Subject Name</th>";
			$subjects .= "<th>Semester / Change</th>";
			$subjects .= "<th>Lecturer";
			$subjects .= "/ Change Lecturer</th>";
			$subjects .= "<th>No. of Students / Change</th>";
			$subjects .= "<th>Manage</th>";
			$subjects .= "</tr>";

		while ($row = mysqli_fetch_assoc($result)) {
			
			$subjects .= "<tr>";
			$subjects .= "<form action='manageSubject.php' method='GET'>";
			$subjects .= "<input type='hidden' name='subject_id' value='{$row['subject_id']}' />";
			$subjects .= "<td><input type='text' name='subject_code' value='{$row['subject_code']}' size='4'/></td>";
			$subjects .= "<td><input type='text' name='subject_name' value='{$row['subject_name']}' size='30'/></td>";
			$subjects .= "<td>";

			$subjects .= "<select name='semester'>";
			$subjects .=	'<option value="1" '.(($row['semester']== '1')?'selected="selected"':"").'>'. '1st year - Semester I  ' .				'</option>';
			$subjects .=	'<option value="2" '.(($row['semester']== '2')?'selected="selected"':"").'>'. '1st year - Semester II  ' .				'</option>';
			$subjects .=	'<option value="3" '.(($row['semester']== '3')?'selected="selected"':"").'>'. '2nd year - Semester I  ' .				'</option>';
			$subjects .=	'<option value="4" '.(($row['semester']== '4')?'selected="selected"':"").'>'. '2nd year - Semester II  ' .				'</option>';
			$subjects .=	'<option value="5" '.(($row['semester']== '5')?'selected="selected"':"").'>'. '3rd year - Semester I  ' .				'</option>';
			$subjects .=	'<option value="6" '.(($row['semester']== '6')?'selected="selected"':"").'>'. '3rd year - Semester II  ' .				'</option>';
			$subjects .=	'<option value="7" '.(($row['semester']== '7')?'selected="selected"':"").'>'. '4th year - Semester I  ' .				'</option>';
			$subjects .=	'<option value="8" '.(($row['semester']== '8')?'selected="selected"':"").'>'. '4th year - Semester II  ' .				'</option>';
            $subjects .= "</select></td>";

			$subjects .= "<td>{$row['name']}<br />";	
				// $subjects .= "<select name='lecturer'>";
           	$subjects .=	lecturer_list_for_subject_list();
          		 // $subjects .= "</select>";
			$subjects .= "</td>";

			$subjects .= "<td>";
			$subjects .= "<input type='text' name='students' value='{$row['number_of_students']}' size='2'/>";
			$subjects .= "</td>";

			$subjects .= "<td>";
			$subjects .= "<button type='submit' name='update_subject'>Update</button> ";
			$subjects .= " <button type='submit' name='remove_subject' onclick=\"return confirm('Are you sure to remove this subject?')\">Remove</button>";
			$subjects .= "</form>";
			$subjects .= "</tr>";
			}
			$subjects .= "</table>";
			echo $subjects;
		}	
	}



/* --------------------------- -- list of lecturer include into the subject creation -- ----------------------------- */
function lecturer_list_subject(){
	global $conn;

	$sql = "SELECT * FROM lecturer_attendance_table";

	$result = mysqli_query($conn, $sql);
	if($result){
	    $detail = "";
	    $detail .= "<select name='lecturer' required='required'>";
	    $detail .= "<option value=''>Select a Lecturer</option>";
	    while ($lecturer = mysqli_fetch_assoc($result)) {
	        $detail .= "<option value={$lecturer['id']}>";
	        $detail .= "{$lecturer['name']}";
	        $detail .= "</option>";                             
	    }
	        $detail .= "</select>";
	        echo $detail;
	}
}


/* ------------------------ -- student list for the manageStudent.php page -- -----------------------*/
function student_table(){
	global $conn;
	$student ="";
	$sql = "SELECT * FROM students s INNER JOIN departments d ON d.dep_id = s.department_id ORDER BY student_id";
	$result = mysqli_query($conn, $sql);
	if($result){
		
		$student .= "<table  width='1000px' height='auto' style='margin:auto; line-height:30px;'>";
		$student .= "<tr>";		
		$student .= "<th>Student ID </th>";
		$student .= "<th>Student Name</th>";
		$student .= "<th>Student Reg. No.</th>";
		$student .= "<th>Semester</th>";
		$student .= "<th>Department</th>";
		$student .= "<th>Control</th>";
		$student .= "</tr>";
		while ($row = mysqli_fetch_assoc($result)) {
			$department = "{$row['dep_name']}";

			$student .= "<tr>";
			$student .= "<form action='manageStudent.php' method='GET'>";    
			$student .= "<td><input type='text' value='{$row['student_id']}' disabled='disabled' size='6'/></td>";
			$student .= "<input type='hidden' name='student_id' value='{$row['student_id']}'  />";
			$student .= "<td><input type='text' name='student_name' value='{$row['student_name']}' /></td>";
			$student .= "<td><input type='text' name='student_reg_no' value='{$row['student_reg_no']}' /></td>";
			// $student .= "<td><input type='text' name='' value='{$row['dep_name']}' size='3'/></td>";
			// $student .= "{$row['student_name']}";
			// use the ternary operator for select the related semester
			$student .= "<td>";
			$student .= "<select name='semester'>";
			$student .=	'<option value="1" '.(($row['semester']== '1')?'selected="selected"':"").'>'. '1st year - Semester I  ' .				'</option>';
			$student .=	'<option value="2" '.(($row['semester']== '2')?'selected="selected"':"").'>'. '1st year - Semester II  ' .				'</option>';
			$student .=	'<option value="3" '.(($row['semester']== '3')?'selected="selected"':"").'>'. '2nd year - Semester I  ' .				'</option>';
			$student .=	'<option value="4" '.(($row['semester']== '4')?'selected="selected"':"").'>'. '2nd year - Semester II  ' .				'</option>';
			$student .=	'<option value="5" '.(($row['semester']== '5')?'selected="selected"':"").'>'. '3rd year - Semester I  ' .				'</option>';
			$student .=	'<option value="6" '.(($row['semester']== '6')?'selected="selected"':"").'>'. '3rd year - Semester II  ' .				'</option>';
			$student .=	'<option value="7" '.(($row['semester']== '7')?'selected="selected"':"").'>'. '4th year - Semester I  ' .				'</option>';
			$student .=	'<option value="8" '.(($row['semester']== '8')?'selected="selected"':"").'>'. '4th year - Semester II  ' .				'</option>';
            $student .= "</select></td>";



			if($department == 'MIT'){ // if the departmenr equals to MIT then MIT option will be selected
				$student .= "<td>";
							$student .=	"<select name='department'>";
							$student .=	"<option selected = 'selected'> MIT</option>";
							$student .=	"<option> BBA </option>";
							$student .=	"<option> B.Com </option>";
							$student .=	"</select>";
				$student .=	"</td>";
				}
			if($department == 'BBA'){  // if the departmenr equals to Management then Management option will be selected
				$student .= "<td>";
							$student .=	"<select name='department'>";
							$student .=	"<option> MIT</option>";
							$student .=	"<option selected = 'selected'> BBA </option>";
							$student .=	"<option> B.Com</option>";
							$student .=	"</select>";
				$student .=	"</td>";
			}
			if($department == 'Bcom'){  // if the departmenr equals to BCom then B.Com option will be selected
				$student .= "<td>";
							$student .=	"<select name='department'>";
							$student .=	"<option> MIT</option>";
							$student .=	"<option> BBA </option>";
							$student .=	"<option selected = 'selected'> B.Com </option>";
							$student .=	"</select>";
				$student .=	"</td>";
			}
			
			$student .= "<td>";
			$student .= "<button type='submit' name='update_student'>Update</button> ";
			$student .= " <button type='submit' name='remove_student' onclick=\"return confirm('Are you sure to remove this student?')\">Remove</button>";
			$student .= "</td>";
			$student .= "</tr>";
			$student .= "</form>";
		}	
			$student .= "</table>";
			echo $student;
	}
}



/* ---------------------------------------- -- alert for the successfull events -- --------------------------------------------- */
function message($message){
	if(isset($message)){
	    $messagebox = "";

	    $messagebox .= "<div class='alert'>";
	    $messagebox .= "<span class ='closebtn' id= 'closebtn' onclick=\"this.parentElement.style.display='none';\"> &times; </span><br/>";
	    $messagebox .= "<p>";
	    $messagebox .= ucfirst("{$message}");
	    $messagebox .= "</p><br/>";
	    $messagebox .= "</div>";    
	        echo $messagebox;

	    } 
	}
/* ---------------------------------------- -- alert for the unsuccessfull events -- --------------------------------------------- */    
function error_message($error){
	if(isset($error)){
	    $errorbox = "";

	    $errorbox .= "<div class='alert error'>";
	    $errorbox .= "<span class ='closebtn' id= 'closebtn' onclick=\"this.parentElement.style.display='none';\" style='color:white;'> &times; </span><br/>";
	    $errorbox .= "<p>";
	    $errorbox .= ucfirst("{$error}");
	    $errorbox .= "</p><br/>";
	    $errorbox .= "</div>";    
	        echo $errorbox;

	    } 
	}
    



/*--------------------------- -- load the notices in the index.php page -- ----------------------- */
function loadnews(){

	global $conn;	
	$sql = "SELECT news, admin_id, lecturer_id,
			(SELECT name FROM lecturer_attendance_table lat WHERE lat.id= news_table.lecturer_id)name, news_date, 
			(SELECT name FROM usertable ut WHERE ut.id = news_table.admin_id )ad_name 
			FROM news_table ORDER BY news_date DESC LIMIT 10";
	
	$update = "";
	$username = "";
	$result = mysqli_query($conn, $sql);
	if($result){
		
		while ($news = mysqli_fetch_assoc($result)) {
			$username = $news['name']; //assign the particular news author name into the $username

			if(empty($username) && $news['admin_id'] == 0 && $news['lecturer_id'] == null){
				$username = ucfirst($news['ad_name']); //if lecturer name null then add the admins name

			} 
			
			$update .= "<div class=\"news\">";
			$update .= "{$news['news']}<br>";
			$update .= "<h6>$username<br>{$news['news_date']}</h6>";
			$update .= "</div><hr/>"; // br tag is removed for reduce the line height
		}echo $update;
	}
	else{
		echo "no news has found";
	}
}



// list out all the notices, into the admin dashboard
function listnews(){ 

	global $conn;	


	$sql = "SELECT * FROM news_table ORDER BY id";
	$update = "";
	$result = mysqli_query($conn, $sql);

	if($result){
			$update .= "<table style='margin:0 auto; width:650px; line-height:32px; text-align:center;'>";
			$update .= "<tr>";
			$update .= "<th>ID</th>";
			$update .= "<th>News | Notice </th>";
			$update .= "<th>Date</th>";
			$update .= "<th>Manage</th>";
			$update .= "</tr>";

		while ($news = mysqli_fetch_assoc($result)) {
			$update .= "<tr>";
			$update .= "<td>{$news['id']}</td>";
			$update .= "<form action='message.php' method='GET'>";

			$update .= "<td><input type='text' name='news' value='{$news['news']}'/></td>";
			$update .= "<td><input type='date' name='news_date' value='{$news['news_date']}'/></td>";
			$update .= "<input type='hidden' value='{$news['id']}' name='news_id' />";
			$update .= "<td>";
			$update .= "<button href=\"message.php\" type='submit' name='update_news'>Update</button> ";
			$update .= "<button href=\"message.php\" type='submit' name='remove_news' onclick=\"return confirm('Are you sure to remove this notice?')\">Remove</button>";
			$update .= "</td>";
			$update .= "</form>";

			$update .= "</tr>";
		}	
			$update .= "</table>";	
			echo $update;
	} 
	
	
	else{
		echo "no news has found";
	}
}


// listout all the classrooms,  into the admin dashboard
function classroom_list(){
	global $conn;
	$sql = "SELECT * FROM class_room";
	$lectureHall = "";
	$result = mysqli_query($conn,$sql);
	if($result){

			$lectureHall .= "<table style='margin:0 auto; width:650px; line-height:32px; text-align:center;'>";
			$lectureHall .= "<tr>";
			$lectureHall .= "<th>ID</th>";
			$lectureHall .= "<th>Classroom Name </th>";
			$lectureHall .= "<th>Maximum Capacity</th>";
			$lectureHall .= "<th>Location</th>";
			$lectureHall .= "<th>Manage</th>";
			$lectureHall .= "</tr>";

		while ($row = mysqli_fetch_assoc($result)) {
			$location = $row['location'];

			$lectureHall .= "<tr>";
			$lectureHall .= "<form action='manageClassroom.php' method='GET'>";
			$lectureHall .= "<td>{$row['id']}</td>";
			$lectureHall .= "<td><input type='text' name='lecture_hall' value='{$row['lec_hall']}' /></td>";
			$lectureHall .= "<td><input type='text' name='capacity' value='{$row['capacity']}' /></td>";
			$lectureHall .= "<input type='hidden' value='{$row['id']}' name='lec_hall_id' />"; //to send the lec hall Id for update or delete
			if($location == 'Ground'){ // if the lec hall location equals to Ground floor then Ground Floor option will be selected
				$lectureHall .= "<td>";
							$lectureHall .=	"<select name='floor'>";
							$lectureHall .=	"<option selected = 'selected'> Ground Floor</option>";
							$lectureHall .=	"<option> First Floor </option>";
							$lectureHall .=	"</select>";
				$lectureHall .=	"</td>";
				}
			if($location == 'First'){  // if the lec hall location equals to Ground floor then First Floor option will be selected
				$lectureHall .= "<td>";
							$lectureHall .=	"<select name='floor'>";
							$lectureHall .=	"<option> Ground Floor</option>";
							$lectureHall .=	"<option selected = 'selected'> First Floor </option>";
							$lectureHall .=	"</select>";
				$lectureHall .=	"</td>";
			}
			$lectureHall .= "<td>";
			$lectureHall .= "<button type='submit' name='update_classroom'>Update</button> ";
			$lectureHall .= "<button type='submit' name='remove_classroom' onclick=\"return confirm('Are you sure to remove Lecture Hall {$row['lec_hall']}?')\">Remove</button>";
			$lectureHall .= "</td>";
			$lectureHall .= "</form>";
		}
		$lectureHall .= "</table>";
		echo $lectureHall;

	}

}


//show the lecturers inth lecturerBoard.php department wise ------------------------------------
function lecturer_info($dept_id){

	global $conn;	
 
if(isset($_SESSION['username'])){
	$id = $_SESSION['id']; // this should be changed into password
	// $username = $_SESSION['username']; /* set the id and username equal to session details */
}
	// $sql = "SELECT l.name, l.u_id, l.id, l.attendance, l.pro_pic_location, l.description, d.id, d.name FROM lecturer_attendance_table AS l, departments AS d WHERE d.name = '{$dept}'";
	$sql = "SELECT * FROM lecturer_attendance_table AS l
	INNER JOIN departments AS d ON l.dep_id=d.dep_id WHERE d.dep_id = '{$dept_id}'";

	$lecturer = "";
	$result = mysqli_query($conn, $sql);
	if($result){
		while ($l_detail = mysqli_fetch_assoc($result)) {
			$name = $l_detail['name'];

			if(isset($_SESSION['username'])){
				
				$username =$l_detail['u_id'];
				if($l_detail['u_id'] == $_SESSION['username'] && $l_detail['id'] == $id){ //this id must changed into password

					/* find whether the session user has permission to edit details */
			$lecturer .= "<a href=\"editUser.php?id={$l_detail['id']}\">";
					}
					else{
			$lecturer .= "<a href=\"#?id={$l_detail['id']}\">"; /*if session user havn't permmision to edit, redirect to the view_user.php */
			}

				}
				else{
			$lecturer .= "<a href=\"#?id={$l_detail['id']}\">";
			}
			if($l_detail['attendance']==0){ /* if lecturer absense the l_card background will be red color */
				$lecturer .= "<div class=\"l_card\" style=\"background: #fb2f2f\">";
			} 
			else{ 							/* else lecturer present, background will be green color */
				$lecturer .= "<div class=\"l_card\" style=\"background: #4caf50\">";
			}
			$lecturer .= "<div class=\"l_img\">"; /* lecturer image */
			$lecturer .= "<img src=\"{$l_detail['pro_pic_location']}\" width=\"100%\"/>";
			$lecturer .= "</div>";
			$lecturer .= "<div class=\"l_name\">"; /* lecturer name */
			$lecturer .= "<h3>{$l_detail['name']}</h3>";
			$lecturer .= "<h6>Department of {$l_detail['dep_name']}</h6>";			
			$lecturer .= "</div>";
			
			$lecturer .= "<p>";
			$lecturer .= "{$l_detail['description']}";
			$lecturer .= "</p>";
			if($l_detail['sms']){
			$lecturer .= "<p style='margin-top:20px;'><mark>&nbsp;{$l_detail['sms']}&nbsp;</mark></p>";	
			}
			
if(isset($_SESSION['username'])){
	if($l_detail['u_id'] == $_SESSION['username'] && $l_detail['id'] == $id){ //this id must changed into password
			$lecturer .= "<div class=\"toggle_container\">";
			$lecturer .= "<div class=\"toggle_button\">";
			// $lecturer .= "<form method=\"POST\">";
			$lecturer .= "<label class=\"switch\">";
			$lecturer .= "<input type=\"checkbox\" name=\"attend\" checked=\"checked\">";
			$lecturer .= "<div class=\"slider round\"></div>";
			$lecturer .= "</label>";
			// $lecturer .= "</form>";
			$lecturer .= "</div>";
			$lecturer .= "</div>";
	}
}
			$lecturer .= "</div>";
			$lecturer .= "</a>";
				
				
		} return $lecturer;
	}
}


// select the related user according to the session id and if it is a lecturer then he will redirect into the edituser.php 

function edit_user(){
	// include 'database/dbconn.php';
	global $conn;
	if(isset($_SESSION['username'])){
	$id = $_SESSION['id']; // this should be changed into password
}
	// $id = $_SESSION['id'];
	// $username = $_SESSION['username']; /* set the id and username equal to session details */

	// $sql = "SELECT * FROM lecturer_attendance_table";
	$sql = "SELECT * FROM lecturer_attendance_table AS l
	INNER JOIN departments AS d ON l.dep_id=d.dep_id";

	$lecturer = "";
	$result = mysqli_query($conn, $sql);
	if($result){
		while ($l_detail = mysqli_fetch_assoc($result)) {
			if(isset($_SESSION['username'])){
				if($l_detail['u_id'] == $_SESSION['username'] && $l_detail['id'] == $id){ //id myst changed into password

			$lecturer .= "<a href = 'profileImageUpload.php'>";
					/* find whether the session user has permission to edit details */
					if($l_detail['attendance']==0){ /* if lecturer absense the l_card background will be red color */
						$lecturer .= "<div class=\"l_card\" style=\"background: #fb2f2f\">";
					} 
					else{ 							/* else lecturer present, background will be green color */
						$lecturer .= "<div class=\"l_card\" style=\"background: #4caf50\">";
					}
			$lecturer .= "<div class=\"l_img\">"; /* lecturer image */
			$lecturer .= "<img src=\"{$l_detail['pro_pic_location']}\" width=\"100%\"/>";
			
			$lecturer .= "<div class=\"l_name\">";
			$lecturer .= "<h3>{$l_detail['name']}</h3>";
			$lecturer .= "<h6>Department of {$l_detail['dep_name']}</h6>";
			$lecturer .= "</div>";
			$lecturer .= "</div>";
			$lecturer .= "<p>";
			$lecturer .= "{$l_detail['description']}";
			$lecturer .= "</p>";
			$lecturer .= "<p>{$l_detail['sms']}</p>";
if(isset($_SESSION['username'])){
	if($l_detail['u_id'] == $_SESSION['username'] && $l_detail['id'] == $id){ //id must be changed into password
			// $lecturer .= "<form method=\"POST\">";
			$lecturer .= "<div class=\"toggle_container\">";
			$lecturer .= "<div class=\"toggle_button\">";
			$lecturer .= "<label class=\"switch\">";
			$lecturer .= "<input type=\"checkbox\" name=\"attend\" checked=\"checked\">";
			$lecturer .= "<div class=\"slider round\"></div>";
			$lecturer .= "</label>";
			// $lecturer .= "</form>";
			$lecturer .= "</div>";
			$lecturer .= "</div>";
	}
}
			$lecturer .= "</div>";
			$lecturer .= "</a>";
				
				
		}
	}
}echo $lecturer;
}
}



/* ------------------ View user function for select the correct user profile --------------------------- */
function view_lecturer_info($l_id){

	global $conn;	

	$sql = "SELECT * FROM lecturer_attendance_table l INNER JOIN departments d ON l.dep_id = d.dep_id WHERE id = '{$l_id}'";
	$lecturer = "";
	$result = mysqli_query($conn, $sql);
	if($result){
		while ($l_detail = mysqli_fetch_assoc($result)) {
			$name = $l_detail['name'];

		
			if($l_detail['attendance']==0){ /* if lecturer absense the l_card background will be red color */
				$lecturer .= "<div class=\"l_card\" style=\"background: #fb2f2f\">";
			} 
			else{ 							/* else lecturer present, background will be green color */
				$lecturer .= "<div class=\"l_card\" style=\"background: #4caf50\">";
			}
			$lecturer .= "<div class=\"l_img\">"; /* lecturer image */
			$lecturer .= "<img src=\"{$l_detail['pro_pic_location']}\" width=\"100%\"/>";
			$lecturer .= "</div>";
			$lecturer .= "<div class=\"l_name\">"; /* lecturer name */
			$lecturer .= "<h3>{$l_detail['name']}</h3>";
			$lecturer .= "<h6>Department of {$l_detail['dep_name']}</h6>";			
			$lecturer .= "</div>";
			
			$lecturer .= "<p>";
			$lecturer .= "{$l_detail['description']}";
			$lecturer .= "</p>";
			$lecturer .= "</div>";
			$lecturer .= "</a>";
				
				
		} echo $lecturer;
	}
}


/* ------------- load the classrooms into the facultyclassroom page filtered by located floor ------------------- */ 
function classroom($floor){
	global $conn;
	$sql = "SELECT * FROM class_room WHERE location = '{$floor}'";
	$lectureHall = "";
	$current_status = "";
	$result = $conn->query($sql);
	if($result){
		while ($row = mysqli_fetch_assoc($result)) {
			if($row['busy'] == 1){
				$lectureHall .= "<div class='lecHall_container' style='background:#fb2f2f;'>";
				$current_status = "Busy";
			}
			if($row['busy'] == 0){
				$lectureHall .= "<div class='lecHall_container' style='background:#696969;'>";
				$current_status = "Free";
			}

			//this will generate the lecturer name related to the id
			$lecturer="";
			$query = "SELECT name FROM lecturer_attendance_table WHERE id ='{$row['lecturer_id']}' ";
			$ok = mysqli_query($conn, $query);
			$found = mysqli_num_rows($ok);
			if($found > 0){
				while ($a = mysqli_fetch_assoc($ok)) {
					$lecturer = $a['name'];
				}

			}
			$lectureHall .= "Lecture Hall <br> <span style='color:white; font-size:15pt;'> {$row['lec_hall']}</span><hr>";
			$lectureHall .= "<p>Lecturer incharge: {$lecturer} </p>";
			$lectureHall .= "<p>Subject: {$row['subject_name']} </p>";
			$lectureHall .= "<p>Current Status: {$current_status} </p>";
			$lectureHall .= "<p>Current Students: {$row['current_capacity']} </p>";
			$lectureHall .= "<p style='color:white;'>Maximum Capacity: {$row['capacity']}</p>";
			$lectureHall .= "</div>";
		}return $lectureHall;
	}
}


// load all the lecturers into the dashboard page
function lecturer_table(){

	global $conn;	
 
if(isset($_SESSION['username'])){
	$id = $_SESSION['id']; // this should be changed into password
	// $username = $_SESSION['username']; /* set the id and username equal to session details */
}
	$sql = "SELECT * FROM lecturer_attendance_table l INNER JOIN departments d ON l.dep_id = d.dep_id ORDER BY id";
	$lecturer = "";
	$result = mysqli_query($conn, $sql);
	if($result){
		echo "<table  width='650px' height='auto' style='margin:auto; line-height:30px; text-align:left;'>";
		echo "<th>User ID </th>";
		// echo "<th>Profile Picture</th>";
		echo "<th>Lecturer Name</th>";
		echo "<th>Department</th>";
		echo "<th>Description</th>";
		echo "<th>Control</th>";

		while ($l_detail = mysqli_fetch_assoc($result)) {
			$lecturer .= "<tr>";
			$lecturer .= "<td>{$l_detail['id']}</td>";
			// $lecturer .= "<td><img src='{$l_detail['pro_pic_location']}' width='70px'/></td>";
			$lecturer .= "<td>{$l_detail['name']}</td>";
			$lecturer .= "<td>{$l_detail['dep_name']}</td>";			
			$lecturer .= "<td>{$l_detail['description']}</td>";
			$lecturer .= "<form action='adduser.php' method='GET'>";
			$lecturer .= "<input type='hidden' name='id' value='{$l_detail['id']}'/>";
			$lecturer .= "<td><button name='removeuser' type='submit' onclick=\"return confirm('Are you sure to remove Ms. {$l_detail['name']}?')\">Remove</button></td>";
			$lecturer .= "</form>";
			$lecturer .= "</tr>";
		}echo $lecturer;
		echo "</table>";	
	}			
} 


/* ------------------------- list out the news related to particular lecturer id --------------------------- */
function listnews_for_lecturers($user_id){ 

	global $conn;	


	$sql = "SELECT * FROM news_table WHERE lecturer_id = '{$user_id}' ORDER BY id";
	$update = "";
	$result = mysqli_query($conn, $sql);

	if($result){
			$update .= "<table style='margin:0 auto; width:610px; line-height:32px; text-align:center;'>";
			$update .= "<tr>";
			$update .= "<th>ID</th>";
			$update .= "<th>News | Notice </th>";
			$update .= "<th>Date</th>";
			$update .= "<th>Manage</th>";
			$update .= "</tr>";

		while ($news = mysqli_fetch_assoc($result)) {
			$update .= "<tr>";
			$update .= "<td>{$news['id']}</td>";
			$update .= "<form action='editUser.php' method='GET'>";

			$update .= "<td><input type='text' name='news' value='{$news['news']}'/></td>";
			$update .= "<td><input type='date' name='news_date' value='{$news['news_date']}'/></td>";
			$update .= "<input type='hidden' value='{$news['id']}' name='news_id' />";
			$update .= "<td>";
			$update .= "<button href=\"editUser.php\" type='submit' name='update_news'>Update</button> ";
			$update .= "<button href=\"editUser.php\" type='submit' name='remove_news' onclick=\"return confirm('Are you sure to remove this notice?')\">Remove</button>";
			$update .= "</td>";
			$update .= "</form>";

			$update .= "</tr>";
		}	
			$update .= "</table>";	
			echo $update;
	} 
	
	
	else{
		echo "no news has found";
	}
}

/* classroom list for the edit user page for select a classroom */

function classroom_for_add_attendance(){
	global $conn;
	$sql = "SELECT * FROM class_room WHERE busy = 0";
	$classroom = "";	
	$classroom .= "<option value=''>Select a classroom</option>";
	$result = $conn->query($sql);
	if($result){
	while($row = mysqli_fetch_assoc($result)){
		$classroom_name = $row['lec_hall'];
		$class_id = $row['id'];
		$classroom .= "<option VALUE={$class_id}>";
		$classroom .= $classroom_name;
		$classroom .= "</option>";
	 } 
	 echo $classroom;
}
}

/* classroom list for timetable creation */

function classroom_for_timetable(){
	global $conn;
	$sql = "SELECT * FROM class_room";
	$classroom = "";	
	$classroom .= "<option value=''>Select a classroom</option>";
	$result = $conn->query($sql);
	if($result){
	while($row = mysqli_fetch_assoc($result)){
		$classroom_name = $row['lec_hall'];
		$class_id = $row['id'];
		$classroom .= "<option >";
		$classroom .= $classroom_name;
		$classroom .= "</option>";
	 } 
	 echo $classroom;
}
}


/* listout lecturers name for timetable subject list	*/

function lecturer_list_timetable(){
global $conn;

	$lecturer_name ="";
	$sql = "SELECT * FROM lecturer_attendance_table";
	$result = mysqli_query($conn, $sql);
	
	$lecturer_name .= "<option VALUE=''>select a lecturer</option>";
	if($result){
	
		while($row = mysqli_fetch_assoc($result)){

				$lecturer = $row['name'];
				$lecturer_id = $row['id'];
				$lecturer_name .= "<option>";
				$lecturer_name .= $lecturer;
				$lecturer_name .= "</option>";
		 } 
		 echo $lecturer_name;
	}
}

/* list out the subjects for the timetable creation */
function subjects_timetable(){
	global $conn;
	$s = "";
	$sql = "SELECT * FROM subjects";
	$result = mysqli_query($conn, $sql);
	$s .= "<option value=''>select a subject</option>";
	if($result){
		while($row = mysqli_fetch_assoc($result)){
			$s .= "<option>";
			$s .= "{$row['subject_name']}";
			$s .= "</option>";
		}
	}echo $s;
}


function subject_list_for_attendance($l_id){
	global $conn;
	$s = "";
	$sql = "SELECT * FROM subjects WHERE lecturer_id= '$l_id'";
	$result = mysqli_query($conn, $sql);
	$s .= "<option value=''>Select a subject</option>";
	if($result){
		while($row = mysqli_fetch_assoc($result)){
			$s .= "<option value={$row['subject_id']}>";
			$s .= "{$row['subject_name']}";
			$s .= "</option>";
		}return $s;
	}
}



/*  student list according to the request to mark the attendance */

  function student_attendance($semester, $department){

                global $conn;

                $sql = "SELECT * FROM students WHERE semester = '{$semester}' AND department_id = '{$department}'";
                $result = mysqli_query($conn, $sql);
                if($result){
                
                $check_result = mysqli_num_rows($result);
				$studentTable = "";	
				if($check_result > 0){
						
						$studentTable .= "<form action='processAttendance.php' method='POST'>";
						$studentTable .= "<table style='margin:0 auto; width:810px; line-height:32px; text-align:left;' >";
						$studentTable .= "<div style='width: 50%; height: 30px; overflow: hidden; margin: 10px auto;'>";
						$studentTable .= "Select Semester ";
						$studentTable .= "<select name='semester' required='required' style='float: none; margin: 0 auto; display: inline;'>
						                    <option value=''> Year - Semester</option>
						                    <option value='1'>1st year - Semester I  </option>
						                    <option value='2'>1st year - Semester II  </option>
						                    <option value='3'>2nd year - Semester I  </option>
						                    <option value='4'>2nd year - Semester II  </option>
						                    <option value='5'>3rd year - Semester I  </option>
						                    <option value='6'>3rd year - Semester II  </option>
						                    <option value='7'>4th year - Semester I  </option>
						                    <option value='8'>4th year - Semester II  </option>
						                </select>   ";
						// $studentTable .= "Select Department ";
						// $studentTable .= "<select name='department' style='float: none; margin: 0 auto; display: inlines;'>
						// 	                    <option value='1'>MIT</option>
						// 	                    <option value='2'>BBA</option>
						// 	                    <option value='3'>B.Com</option>
						// 	                </select>";
						$studentTable .= " Select a Subject ";
						$studentTable .= " <select name='subject_id'>";
						$studentTable .= subject_list_for_attendance ($_SESSION['id']);		
						$studentTable .= "</select>";

						$studentTable .= "</div>";	                	
						$studentTable .= "<tr>";
						$studentTable .= "<th rowspan='2' style='text-align:center;'>No. </th>";
						$studentTable .= "<th rowspan='2'>Student Name </th>";
						$studentTable .= "<th rowspan='2'>Student Registration No. </th>";
						$studentTable .= "<th colspan='2' style='text-align:center;'>Attendance</th>";
						// $studentTable .= "<input type='hidden' name='department' value='{$row['department_id']}' /> ";
						$studentTable .= "<input type='hidden' name='lecturer_id' value='{$_SESSION['id']}' />";
						$studentTable .= "</tr>";
						$studentTable .= "<tr>";
						
						$studentTable .= "<th style='text-align:center;'>Present</th>";
						$studentTable .= "<th style='text-align:center;'>Absent</th>";
						$studentTable .= "</tr>";
						$x=0;
					while ($row = mysqli_fetch_assoc($result)) {
						$x++;
						
						$studentTable .= "<tr>";
						$studentTable .= "<td style='text-align:center;'> $x "
						."<input type='hidden' name='student".$x."' value='{$row['student_id']}' />"
						."<input type='hidden' name='student_reg_no".$x."' value='{$row['student_reg_no']}' />"
						."<input type='hidden' name='department".$x."' value='{$row['department_id']}' />"
						."</td>";
						$studentTable .= "<td> {$row['student_name']} </td>";
						$studentTable .= "<td> {$row['student_reg_no']} </td>";
						$studentTable .= "<td style='text-align:center;'><input type='radio' name='attendance".$x."' value='1' /></td>";
					

						$studentTable .= "<td style='text-align:center;'><input type='radio' name='attendance".$x."' value='0' checked='checked' </td>";
						$studentTable .= "</tr>";
					}
												

						$studentTable .= "</table>";
						$studentTable .="<div style='width: 100%; height: 47px; overflow: hidden; margin-top: 15px;'>";
						$studentTable .= "<button type='submit' name='submit_attendance' onclick=\"return confirm('Please check all attendance before submit!! Are you sure all are correct?')\" style='float: none; margin: 0 auto; display: inherit;'>Submit</button>";
						$studentTable .= "</div>";
						$studentTable .= "<input type='hidden' name='students_count' value='".$x."' />";
						$studentTable .= "</form>";
					echo $studentTable;
				}
			}
		}



/* Timetable output - department wise */

function show_timetable($sem, $dep){
	global $conn;



	$sql = "SELECT * FROM timetable WHERE semester_id = '{$sem}' AND department_id = '{$dep}'";
	$result = mysqli_query($conn, $sql);
	if($result){
	$check = mysqli_num_rows($result);
	if($check > 0){
	$table = "";
	$table .= "<table style='margin:0 auto; line-height:auto; width:98%; text-align:center;'>";
	$table .= "<tr>";
	$table .= "<th> Time </th>";
	$table .= "<th> Monday </th>";
	$table .= "<th> Tuesday </th>";
	$table .= "<th> Wednsday </th>";
	$table .= "<th> Thursday </th>";
	$table .= "<th> Friday </th>";
	$table .= "</tr>";
		while($row = mysqli_fetch_assoc($result)){
			$table .= "<tr>";
			
			$table .= "<td>";
			$table .= "{$row['time_of']}";
			$table .= "</td>";


			$table .= "<td>";
			$table .= "{$row['monday']}";  
			$table .= "</td>";

			$table .= "<td>";  
			$table .= "{$row['tuesday']}";
			$table .= "</td>";

			$table .= "<td>";   
			$table .= "{$row['wednsday']}";
			$table .= "</td>";

			$table .= "<td>";  
			$table .= "{$row['thursday']}";
			$table .= "</td>";

			$table .= "<td>";  
			$table .= "{$row['friday']}";
			$table .= "</td>";
			
		
			
			$table .= "</tr>";
		}
			$table .= "</table>";
			return $table;
	}
}
}



/* Display avaliable timetable in the database  */
function timetable_list($semester_id, $department_id){

                global $conn;

                $query = "SELECT semester_id, department_id FROM timetable WHERE semester_id = '$semester_id' AND department_id = '$department_id'";
                $result = mysqli_query($conn, $query);
                $check_result = mysqli_num_rows($result);
                if($check_result > 0){

                	$form ="";
                	if($semester_id == 1 || $semester_id == 2){
                		$year = "1 <sup>st</sup>";
                	}
                	if($semester_id == 3 || $semester_id == 4){
                		$year = "2 <sup>nd</sup>";
                	}
                	if($semester_id == 5 || $semester_id == 6){
                		$year = "3 <sup>rd</sup>";
                	}
                	if($semester_id == 7 || $semester_id == 8){
                		$year = "4 <sup>th</sup>";
                	}

                	if($semester_id == 1 || $semester_id == 3 || $semester_id == 5 || $semester_id == 7){
                		$sem = "1 <sup>st</sup>";
                	}
                	if($semester_id == 2 || $semester_id == 4 || $semester_id == 6 || $semester_id == 8){
                		$sem = "2 <sup>nd</sup>";
                	}
                	$form.= "<form action='manageTimetable.php' method='GET'>";
                	$form.= "<input type='hidden' name='sem' value='{$semester_id}' />";
                	$form.= "<input type='hidden' name='dep' value='{$department_id}' />";
                    $form.= "<button type='submit' name='remove_table' onclick=\"return confirm('You are going to delete timetable from Database, Are you sure?')\">{$sem} semester timetable exists </button> ";
                    $form.= "</form>";
                    echo $form;
                }

            }




 // Export the selected timetable into MS Excel File as it is, showStudentAttendance.php page
function export_table(){
	global $conn;
	 	$semester = $_POST['semester'];
        $department =$_POST['department'];
        $subject = $_POST['subject'];
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
		$attendanceTable;
		// echo $subjectname;
		}
}




// restricting the  access of the admin panel from unauthorized user 

function admin_only(){
	global $conn;

	if(isset($_SESSION['id'])){ //look whether user logged in or not

        $sql ="SELECT * FROM usertable WHERE username = 'admin' AND password = 'admin' AND id ='0' LIMIT 1 ";
        //default admin username, password and the id

        $result = mysqli_query($conn, $sql);
        //executing the query
        
        if($detail = $result->fetch_assoc()){
            $u_name = $detail['username'];
            $u_id = $detail['id'];
        
            if(isset($_SESSION['username']) && isset($_SESSION['id'])){
                if($_SESSION['username'] == $u_name && $_SESSION['id'] == $u_id){
                    

                    }
                    //if the logged in user does not match to the admin 
                    else{
	                    header('Location: index.php?err=you do not have permission to perfom this');
	                    exit();
                    }
                }	//if session is not set then else
                else{
                    header('Location: index.php?err=you do not have permission/please log in');
                    exit();
                }
            }
    	} 
    	//if the session id is not set   
		else{
    		header('Location: index.php?err=please login');
    		exit();
		}
}

