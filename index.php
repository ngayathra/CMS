<?php
	session_start();
	include 'database/dbconn.php';
	include 'function.php';

?> 
<?php include 'include/head.html'; ?>
	<body>
		<div style="width: 100%; height: 100%; position: fixed; background: rgba(0, 0, 0, 0.5); z-index: -1;">	
		</div>
		<video autoplay="autoplay" muted="muted" loop="loop" id="background-video">
			<source src="r.mp4" type="video/mp4">
		</video>
		<script type="text/javascript">
			window.onload=function(){
				startTime();
				my();
			}
		</script>

		<?php include 'include/topbar.php'; ?> <!-- login/logout top bar section file attachment -->
		
		<?php include 'include/navigation.php'; ?>

	<div class="body_container">
		<div class="slide_container"> <!-- slide show section -->
			<div class="slide cycle-slideshow" data-cycle-fx="fade">
				<img src="img/fmc.jpg" width= "100%" height="100%" />
				<img src="img/lib.jpg" width= 100% height="100%" />
				<img src="img/lib2.jpg" alt='' width=100% height="100%" />
  				<img src="img/fmc2.jpg" alt='' width=100% height="100%" />
  				<img src="img/s.jpg" alt='' width=100% height="100%" />
 				 <!-- <div class="make">FMC</div> -->
			</div>
		</div>

		<div class="whiteboard" > <!-- middle section -->
			<h2>Welcome to the CMS</h2><br><hr>
    			<div style="width: 99%; height: 100%; margin: 0 auto; overflow: hidden;" 
    			class="cycle-slideshow" 
				data-cycle-fx="fade"
				data-cycle-timeout="4000"
				data-cycle-slides="> div">
	    			<div>
	    				
	    			<img src="img/university.png"  style="margin: auto; width:66%; display: inherit;" />
	    			<p style="width: auto; margin: 20px; text-align: justify; color:#4e4e4e;  ">
	    				This is the Home Page of <strong>Classroom Management System of the Faculty of Management and Commerce.</strong> Computerized web based classroom management system with newly appearance. See notices, classrooms, timetables and about detail of lecturers. Make everything upto date with realtime database system.</p>
	    			</div>

	    			<div>
	    				
	    			<img src="img/classroom.jpg"  style="margin: auto; width:42%; display: inherit;" />
	    			<p style="width: auto; margin: 20px; text-align: justify; color:#4e4e4e;  ">
	    				<strong>Manage your time with CMS.</strong> All of the things that you needed is here. Keep everything in one place with world wide access.<strong> Time is no more a cost.</strong> This is the effective and efficient way to manage your time. </p>
	    			</div>


    			</div>
		</div>

	</div>

	<div class="side_pannel_container">
		<!-- side pannel time showing div -->
		<div  id="timmer" style="font-family: Segoe UI; text-align: center; color: white; margin-top: 15px; margin-bottom: 5px;"> 
		</div>
		<!-- greeting related to the time --> 
		<div id="greeting"  style="font-family: Segoe UI; color: white; text-align: center;"></div>
		
		<!-- heading of the side pannel -->
		<div style="font-family: Segoe UI; color: white; text-align: center;margin-top: 15px;">
			<u>
				<strong>FMC Notice Board</strong>
			</u>
		</div>
		
		<br/><hr/>
		<!-- load recent notieces from the database -->
		<div>
			<?php loadnews(); ?>
		</div>
	</div>

<!-- <div style="width: 47%; height: 100%; box-shadow: 1px 1px 7px 0px black; float: left; margin: 10px 10px;">
	    				<h2>Heading of the notice</h2>
	    			</div>

	    			<div style="width: 47%; height: 100%; box-shadow: 1px 1px 7px 0px black; float: left; margin: 10px 10px;">
	    				<h2>Heading of the notice</h2>
	    			</div> -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery.cycle2/2.1.6/jquery.cycle2.min.js'></script>
<script src="js/jquery.cycle2.min"></script>
<script src="js/jquery.min"></script>
</body>
<!-- footer section file attachment -->
<?php include 'include/footer.html'; ?>
<?php if(isset($_GET['err'])){error_message($_GET['err']);} ?>
<?php if(isset($_GET['msg'])){message($_GET['msg']);} ?>
</html>