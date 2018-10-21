<?php 
    include 'database/dbconn.php';
    include 'function.php';
    session_start();
    admin_only();
?>
<?php include 'include/head.html'; ?>
<body>
<div style="width: 100%; height: 100%; position: fixed; background: rgba(0, 0, 0, 0.5); z-index: -1;">  
</div>
<img src="img/classroom.jpg" width="100%" height="100%" style="position:fixed; z-index: -10;" />

<?php include 'include/topbar.php' ?>

<div class="dashboard_container" id="d">
    <header>
        <div id="item-name"><a href="dashboard.php" style="text-decoration: none; color: white;"> DashBoard</a> 
        </div>
    </header>
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
        <h2>Welcome to Dashboard of the CMS</h2>
        <hr><br>
            <div style="width: 50%; margin: 0 20px; float: left; text-align: justify; color:#4e4e4e;  ">
                
            <h1 style="font-variant: small-caps;">Before you get started</h1>
            <br>
            <p>
            <strong> Hey!, this is the dashboard of Classroom Management System of FMC. </strong> Please make sure that you have clear right for access this dashboard page and if you are not the admin of the CMS please <a href="logout.php"> logout.</a> <br /> <br />
            <strong>Please be carefully</strong> perform the actions of the control panel and read carefully each and every alearts and warning messages. It would be helpful to perform tasks smoothly.
            <br /><br />
            <cite style="float: right; color: #898989;"> - Developed by D.G.K.L. Nakandala
            </cite>
            </p> 

            </div>

            <img src="img/techer.png" style="float: right;" />
    </div>
</main>
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/jquery.cycle2.min"></script>
<script src="js/jquery.min"></script>
</body>
<?php include 'include/footer.html' ?>
<?php if(isset($_GET['err'])){error_message($_GET['err']);} ?>
<?php if(isset($_GET['msg'])){message($_GET['msg']);} ?>
</html>