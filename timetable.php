<?php
    include 'database/dbconn.php';
    session_start();
    include 'function.php';
?>

<?php 
        
        if(isset($_SESSION['id'])){

        }else{
            header('Location: index.php?error=please login');
        }
        $sql ="SELECT * FROM usertable WHERE username = 'admin' AND id ='0'";
        $result = $conn->query($sql);

        if($detail = $result->fetch_assoc()){
            $u_name = $detail['username'];
            $u_id = $detail['id'];
        
            if(isset($_SESSION['username']) && isset($_SESSION['id'])){
                if($_SESSION['username'] == $u_name && $_SESSION['id'] == $u_id){
                    

                    } 
                    else{
                    header('Location: index.php?err=you do not have permission');
                    }
                }else{
                    header('Location: index.php?err=you do not have permission/please log in');
                    }
            }


        ?>
<?php 
    if(isset($_GET['empty_table'])){
        $sql = "TRUNCATE TABLE timetable";
        $result = mysqli_query($conn, $sql);
        if($result){
            header('Location: timetable.php?msg=table data has been deleted');
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
            <h2>Add New Timetable</h2>
            
            <hr><br>
                <form action='addtimetable.php' method='POST'>
    <div style='margin:10px auto; width:513px;'>
        Semester <select name='semester' required="required" >
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
    Department <select name='department' required="required" >
                    <option value="">Select a Department</option>
                    <option value="1">MIT</option>
                    <option value="2">BBA</option>
                    <option value="3">B.com</option>
                </select>
    </div>
    <table border=1 style='margin:0 auto; width:1000px; line-height:32px; text-align:center;'>
    <tr>
        <th> Time </th>
        <th> Monday </th>
        <th> Tuesday </th>
        <th> Wednsday </th>
        <th> Thursday </th>
        <th> Friday </th>
    </tr>

    <tr>
        <td> 8.30 - 9.30 </td>

        <td>
        <select name="mondayclass1">
        <?php classroom_for_timetable(); ?> 
        </select>
        <select name="mondaylecturer1">
        <?php lecturer_list_timetable(); ?> 
        </select>
        <select name="mondaysubject1">
        <?php subjects_timetable(); ?>
        </select>
        </td>

        <td>
        <select name="tuesdayclass1">
        <?php classroom_for_timetable(); ?> 
        </select>
        <select name="tuesdaylecturer1">
        <?php lecturer_list_timetable(); ?> 
        </select>
        <select name="tuesdaysubject1">
        <?php subjects_timetable(); ?>
        </select>
        </td>

        <td>
        <select name="wednsdayclass1">
        <?php classroom_for_timetable(); ?> 
        </select>
        <select name="wednsdaylecturer1">
        <?php lecturer_list_timetable(); ?> 
        </select>
        <select name="wednsdaysubject1">
        <?php subjects_timetable(); ?>
        </select>
        </td>

        <td>
        <select name="thursdayclass1">
        <?php classroom_for_timetable(); ?> 
        </select> 
        <select name="thursdaylecturer1">
        <?php lecturer_list_timetable(); ?> 
        </select>
        <select name="thursdaysubject1">
        <?php subjects_timetable(); ?>
        </select>
        </td>

        <td>
        <select name="fridayclass1">
        <?php classroom_for_timetable(); ?> 
        </select>
        <select name="fridaylecturer1">
        <?php lecturer_list_timetable(); ?> 
        </select>
        <select name="fridaysubject1">
        <?php subjects_timetable(); ?>
        </select>
        </td>
    </tr>

    <tr>
        <td> 9.30 - 10.30 </td>

        <td>
        <select name="mondayclass2">
        <?php classroom_for_timetable(); ?> 
        </select>
        <select name="mondaylecturer2">
        <?php lecturer_list_timetable(); ?> 
        </select>
        <select name="mondaysubject2">
        <?php subjects_timetable(); ?>
        </select>
        </td>

        <td>
        <select name="tuesdayclass2">
        <?php classroom_for_timetable(); ?> 
        </select>
        <select name="tuesdaylecturer2">
        <?php lecturer_list_timetable(); ?> 
        </select>
        <select name="tuesdaysubject2">
        <?php subjects_timetable(); ?>
        </select>
        </td>

        <td>
        <select name="wednsdayclass2">
        <?php classroom_for_timetable(); ?> 
        </select>
        <select name="wednsdaylecturer2">
        <?php lecturer_list_timetable(); ?> 
        </select>
        <select name="wednsdaysubject2">
        <?php subjects_timetable(); ?>
        </select>
        </td>

        <td>
        <select name="thursdayclass2">
        <?php classroom_for_timetable(); ?> 
        </select> 
        <select name="thursdaylecturer2">
        <?php lecturer_list_timetable(); ?> 
        </select>
        <select name="thursdaysubject2">
        <?php subjects_timetable(); ?>
        </select>
        </td>

        <td>
        <select name="fridayclass2">
        <?php classroom_for_timetable(); ?> 
        </select>
        <select name="fridaylecturer2">
        <?php lecturer_list_timetable(); ?> 
        </select>
        <select name="fridaysubject2">
        <?php subjects_timetable(); ?>
        </select>
        </td>
    </tr>

    <tr>
        <td> 10.30 - 11.30 </td>

        <td>
        <select name="mondayclass3">
        <?php classroom_for_timetable(); ?> 
        </select>
        <select name="mondaylecturer3">
        <?php lecturer_list_timetable(); ?> 
        </select>
        <select name="mondaysubject3">
        <?php subjects_timetable(); ?>
        </select>
        </td>

        <td>
        <select name="tuesdayclass3">
        <?php classroom_for_timetable(); ?> 
        </select>
        <select name="tuesdaylecturer3">
        <?php lecturer_list_timetable(); ?> 
        </select>
        <select name="tuesdaysubject3">
        <?php subjects_timetable(); ?>
        </select>
        </td>

        <td>
        <select name="wednsdayclass3">
        <?php classroom_for_timetable(); ?> 
        </select>
        <select name="wednsdaylecturer3">
        <?php lecturer_list_timetable(); ?> 
        </select>
        <select name="wednsdaysubject3">
        <?php subjects_timetable(); ?>
        </select>
        </td>

        <td>
        <select name="thursdayclass3">
        <?php classroom_for_timetable(); ?> 
        </select> 
        <select name="thursdaylecturer3">
        <?php lecturer_list_timetable(); ?> 
        </select>
        <select name="thursdaysubject3">
        <?php subjects_timetable(); ?>
        </select>
        </td>

        <td>
        <select name="fridayclass3">
        <?php classroom_for_timetable(); ?> 
        </select>
        <select name="fridaylecturer3">
        <?php lecturer_list_timetable(); ?> 
        </select>
        <select name="fridaysubject3">
        <?php subjects_timetable(); ?>
        </select>
        </td>
    </tr>

    <tr>
        <td> 11.30 - 12.30 </td>

        <td>
        <select name="mondayclass4">
        <?php classroom_for_timetable(); ?> 
        </select>
        <select name="mondaylecturer4">
        <?php lecturer_list_timetable(); ?> 
        </select>
        <select name="mondaysubject4">
        <?php subjects_timetable(); ?>
        </select>
        </td>

        <td>
        <select name="tuesdayclass4">
        <?php classroom_for_timetable(); ?> 
        </select>
        <select name="tuesdaylecturer4">
        <?php lecturer_list_timetable(); ?> 
        </select>
        <select name="tuesdaysubject4">
        <?php subjects_timetable(); ?>
        </select>
        </td>

        <td>
        <select name="wednsdayclass4">
        <?php classroom_for_timetable(); ?> 
        </select>
        <select name="wednsdaylecturer4">
        <?php lecturer_list_timetable(); ?> 
        </select>
        <select name="wednsdaysubject4">
        <?php subjects_timetable(); ?>
        </select>
        </td>

        <td>
        <select name="thursdayclass4">
        <?php classroom_for_timetable(); ?> 
        </select> 
        <select name="thursdaylecturer4">
        <?php lecturer_list_timetable(); ?> 
        </select>
        <select name="thursdaysubject4">
        <?php subjects_timetable(); ?>
        </select>
        </td>

        <td>
        <select name="fridayclass4">
        <?php classroom_for_timetable(); ?> 
        </select>
        <select name="fridaylecturer4">
        <?php lecturer_list_timetable(); ?> 
        </select>
        <select name="fridaysubject4">
        <?php subjects_timetable(); ?>
        </select>
        </td>
    </tr>


        <tr>
        <td> 1.30 - 2.30 </td>

        <td>
        <select name="mondayclass5">
        <?php classroom_for_timetable(); ?> 
        </select>
        <select name="mondaylecturer5">
        <?php lecturer_list_timetable(); ?> 
        </select>
        <select name="mondaysubject5">
        <?php subjects_timetable(); ?>
        </select>
        </td>

        <td>
        <select name="tuesdayclass5">
        <?php classroom_for_timetable(); ?> 
        </select>
        <select name="tuesdaylecturer5">
        <?php lecturer_list_timetable(); ?> 
        </select>
        <select name="tuesdaysubject5">
        <?php subjects_timetable(); ?>
        </select>
        </td>

        <td>
        <select name="wednsdayclass5">
        <?php classroom_for_timetable(); ?> 
        </select>
        <select name="wednsdaylecturer5">
        <?php lecturer_list_timetable(); ?> 
        </select>
        <select name="wednsdaysubject5">
        <?php subjects_timetable(); ?>
        </select>
        </td>

        <td>
        <select name="thursdayclass5">
        <?php classroom_for_timetable(); ?> 
        </select> 
        <select name="thursdaylecturer5">
        <?php lecturer_list_timetable(); ?> 
        </select>
        <select name="thursdaysubject5">
        <?php subjects_timetable(); ?>
        </select>
        </td>

        <td>
        <select name="fridayclass5">
        <?php classroom_for_timetable(); ?> 
        </select>
        <select name="fridaylecturer5">
        <?php lecturer_list_timetable(); ?> 
        </select>
        <select name="fridaysubject5">
        <?php subjects_timetable(); ?>
        </select>
        </td>
    </tr>

    <tr>
        <td> 2.30 - 3.30 </td>

        <td>
        <select name="mondayclass6">
        <?php classroom_for_timetable(); ?> 
        </select>
        <select name="mondaylecturer6">
        <?php lecturer_list_timetable(); ?> 
        </select>
        <select name="mondaysubject6">
        <?php subjects_timetable(); ?>
        </select>
        </td>

        <td>
        <select name="tuesdayclass6">
        <?php classroom_for_timetable(); ?> 
        </select>
        <select name="tuesdaylecturer6">
        <?php lecturer_list_timetable(); ?> 
        </select>
        <select name="tuesdaysubject6">
        <?php subjects_timetable(); ?>
        </select>
        </td>

        <td>
        <select name="wednsdayclass6">
        <?php classroom_for_timetable(); ?> 
        </select>
        <select name="wednsdaylecturer6">
        <?php lecturer_list_timetable(); ?> 
        </select>
        <select name="wednsdaysubject6">
        <?php subjects_timetable(); ?>
        </select>
        </td>

        <td>
        <select name="thursdayclass6">
        <?php classroom_for_timetable(); ?> 
        </select> 
        <select name="thursdaylecturer6">
        <?php lecturer_list_timetable(); ?> 
        </select>
        <select name="thursdaysubject6">
        <?php subjects_timetable(); ?>
        </select>
        </td>

        <td>
        <select name="fridayclass6">
        <?php classroom_for_timetable(); ?> 
        </select>
        <select name="fridaylecturer6">
        <?php lecturer_list_timetable(); ?> 
        </select>
        <select name="fridaysubject6">
        <?php subjects_timetable(); ?>
        </select>
        </td>
    </tr>

    <tr>
        <td> 3.30 - 4.30 </td>

        <td>
        <select name="mondayclass7">
        <?php classroom_for_timetable(); ?> 
        </select>
        <select name="mondaylecturer7">
        <?php lecturer_list_timetable(); ?> 
        </select>
        <select name="mondaysubject7">
        <?php subjects_timetable(); ?>
        </select>
        </td>

        <td>
        <select name="tuesdayclass7">
        <?php classroom_for_timetable(); ?> 
        </select>
        <select name="tuesdaylecturer7">
        <?php lecturer_list_timetable(); ?> 
        </select>
        <select name="tuesdaysubject7">
        <?php subjects_timetable(); ?>
        </select>
        </td>

        <td>
        <select name="wednsdayclass7">
        <?php classroom_for_timetable(); ?> 
        </select>
        <select name="wednsdaylecturer7">
        <?php lecturer_list_timetable(); ?> 
        </select>
        <select name="wednsdaysubject7">
        <?php subjects_timetable(); ?>
        </select>
        </td>

        <td>
        <select name="thursdayclass7">
        <?php classroom_for_timetable(); ?> 
        </select> 
        <select name="thursdaylecturer7">
        <?php lecturer_list_timetable(); ?> 
        </select>
        <select name="thursdaysubject7">
        <?php subjects_timetable(); ?>
        </select>
        </td>

        <td>
        <select name="fridayclass7">
        <?php classroom_for_timetable(); ?> 
        </select>
        <select name="fridaylecturer7">
        <?php lecturer_list_timetable(); ?> 
        </select>
        <select name="fridaysubject7">
        <?php subjects_timetable(); ?>
        </select>
        </td>
    </tr>

</table>
            <div style='width: 100%; height: 47px; overflow: hidden; margin-top: 15px;'>

            <button type='submit' name='add_table' style='float: none; margin: 0 auto; display:                 inherit; width:auto; padding: 0px 20px;'>Add timetable</button>
            </div>
            
            </form>
            
          </div>

</main>


<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/jquery.cycle2.min"></script>
<script src="js/jquery.min"></script>

<?php if(isset($_GET['err'])){error_message($_GET['err']);} ?>
<?php if(isset($_GET['msg'])){message($_GET['msg']);} ?>
<?php include 'include/footer.html' ?>
</body>
</html>
