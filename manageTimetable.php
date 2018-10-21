<?php
    include 'database/dbconn.php';
    session_start();
    include 'function.php';
    admin_only();
?>

<?php 
    if(isset($_GET['empty_table'])){
        $sql = "TRUNCATE TABLE timetable";
        $result = mysqli_query($conn, $sql);
        if($result){
            header('Location: manageTimetable.php?msg=All timetables have been deleted');
        }else{
            header('Location: manageTimetable.php?err=timetables are not deleted');
        }
    } 
?>
<?php 

if(isset($_GET['remove_table'])){
    $semester = $_GET['sem'];
    $department = $_GET['dep'];
    $sql = "DELETE FROM timetable WHERE semester_id = '$semester' AND department_id = '$department' ";

        $result = mysqli_query($conn, $sql);
        if($result){
            header('Location: manageTimetable.php?msg=timetable has been deleted');
        }else{
            header('Location: manageTimetable.php?err=timetable is not deleted');
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
            table {border-collapse: collapse;height: 90%; margin:0 auto; line-height:auto; width:98%; text-align:center;}
            th, td {text-align: left;padding: 8px;}
            tr:nth-child(even){background-color: #f2f2f2; /*font-weight: bold;*/}
            th {background-color: #009688;color: white;}
            /*.cycle-slideshow{margin-bottom: 70px;}*/
           .message_container form button{

                border: 1px solid #fe3267;
                border-radius: 0px;
                background-color: initial;
                color: black;
                height: auto;
                width: auto;
                font-family: arial;
                float: none;
                cursor: pointer;
                box-shadow: none;
                padding: 5px 10px;
                border-radius: 5px;
            }
            .message_container form{
                margin-bottom: 6px;
            }
            .message_container form button:hover{
                box-shadow: none;
                background: #fe3267;
                color: #f2f2f2;
                border: 1px solid #fe3267;
            }
        </style>
            <h2>Manage Timetables</h2>
            <hr><br>
            <table>
                <tr>
                    <th>Year</th>
                    <th>MIT</th>
                    <th>BBA</th>
                    <th>B.Com</th>
                    
                </tr>
                <tr>
                    <td style="font-weight: bold;">First</td>
                    <td>
                        <?php timetable_list(1, 1); ?> 
                        <?php timetable_list(2, 1); ?> 
                    </td>

                    <td>
                        <?php timetable_list(1, 2); ?> 
                        <?php timetable_list(2, 2); ?> 
                    </td>

                    <td>
                        <?php timetable_list(1, 3); ?> 
                        <?php timetable_list(2, 3); ?>       
                    </td>
                    
                </tr>

                <tr>
                    <td style="font-weight: bold;">Second</td>
                    <td>
                        <?php timetable_list(3, 1); ?> 
                        <?php timetable_list(4, 1); ?> 
                    </td>

                    <td>
                        <?php timetable_list(3, 2); ?>
                        <?php timetable_list(4, 2); ?> 
                    </td>

                    <td>
                        <?php timetable_list(3, 3); ?> 
                        <?php timetable_list(4, 3); ?>     
                    </td>
                </tr>

                <tr>
                    <td style="font-weight: bold;">Third</td>
                    <td>
                        <?php timetable_list(5, 1); ?>
                        <?php timetable_list(6, 1); ?> 
                    </td>

                    <td>
                        <?php timetable_list(5, 2); ?> 
                        <?php timetable_list(6, 2); ?> 
                    </td>

                    <td>
                        <?php timetable_list(5, 3); ?> 
                        <?php timetable_list(6, 3); ?>       
                    </td>
                </tr>
                <tr>
                    <td style="font-weight: bold;">Fourth</td>
                    <td>
                        <?php timetable_list(7, 1); ?> 
                        <?php timetable_list(8, 1); ?> 
                    </td>

                    <td>
                        <?php timetable_list(7, 2); ?> 
                        <?php timetable_list(8, 2); ?> 
                    </td>

                    <td>
                        <?php timetable_list(7, 3); ?> 
                        <?php timetable_list(8, 3); ?>      
                    </td>
                </tr>
            </table>
            
    </div>
 
    <div style='width: 100%; height: 47px; overflow: hidden; margin-top: 15px;'>
        <form action="manageTimetable.php" method="GET">
        <div>
        <button name="empty_table" style='float: none; margin: 0 auto; display:inherit; width:auto; padding: 0px 20px;' onclick="return confirm('You are going to delete all the timetables from Database, Are you sure?')">Remove all timetables from Database</button></div>
        </form>
    </div>

</main>


<script src="js/jquery-3.2.1.min.js"></script>

<?php if(isset($_GET['err'])){error_message($_GET['err']);} ?>
<?php if(isset($_GET['msg'])){message($_GET['msg']);} ?>
</body>
<?php include 'include/footer.html' ?>
</html>
