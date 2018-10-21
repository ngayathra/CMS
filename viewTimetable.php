<?php
	session_start();
	include 'database/dbconn.php';
	include 'function.php';

?>

<?php include 'include/head.html'; ?>
<body>

<?php include 'include/topbar.php'; ?> <!-- login/logout top bar section file attachment -->
<?php include 'include/navigation.php'; ?>


<div class="department_container">
	<h2 style="margin: 15px 0px 5px 0px;">TimeTables of FMC </h2><hr>
	
		 <style>
			table {border-collapse: collapse; /*width: 100%;*/ height: 90%;}
			th, td {text-align: left;padding: 8px;}
			tr:nth-child(even){background-color: #f2f2f2; /*font-weight: bold;*/}
			th {background-color: #4CAF50;color: white;}
			/*.cycle-slideshow{margin-bottom: 70px;}*/

		</style>
		<div class="department">
			<h3>Department of Management &amp; Information Technology (MIT)</h3>
		 
						
			<div style="margin-bottom: 70px;" 
				class="cycle-slideshow" 
				data-cycle-fx="fade"
				data-cycle-pause-on-hover="true"
				data-cycle-timeout="4000"
				data-cycle-slides="> div">

			<div> 
				<?php echo "<h2>1<sup>st</sup> Year 1<sup>st</sup> Semester </h2>"; echo show_timetable(1, 1); ?> 
			</div>	
			<!-- 1st sems of mit -->
			<div> 
				<?php echo "<h2>1<sup>st</sup> Year 2<sup>nd</sup> Semester </h2>"; echo show_timetable(3, 1); ?> 
			</div>	
			<!-- 1st sems of mit -->
			<div> 
				<?php echo "<h2>2<sup>nd</sup> Year 1<sup>st</sup> Semester </h2>"; echo show_timetable(5, 1); ?> 
			</div>	
			<!-- 1st sems of mit -->
			<div> 
				<?php echo "<h2>2<sup>nd</sup> Year 2<sup>nd</sup> Semester</h2>"; echo show_timetable(2, 1); ?> 
			</div>	
			<!-- 2nd sems of mit -->
			<div> 
				<?php echo "<h2>3<sup>rd</sup> Year 1<sup>st</sup> Semester</h2>"; echo show_timetable(4, 1); ?> 
			</div>	
			<!-- 2nd sems of mit -->
			<div> 
				<?php echo "<h2>3<sup>rd</sup> Year 2<sup>nd</sup> Semester</h2>"; echo show_timetable(6, 1); ?> 
			</div>	
			<!-- 2nd sems of mit -->
			</div>
		</div><br /><hr>



		<div class="department">
			<h3>Department of Management (BBA)</h3>
		 
						
			<div style="margin-bottom: 70px;" 
				class="cycle-slideshow" 
				data-cycle-fx="fade"
				data-cycle-pause-on-hover="true"
				data-cycle-timeout="4000"
				data-cycle-slides="> div">

			<div> 
				<?php echo "<h2>1<sup>st</sup> Year 1<sup>st</sup> Semester</h2>"; echo show_timetable(1, 2); ?>
			</div>	
			<!-- 1st sems of MGT -->
			<div> 
				<?php echo "<h2>1<sup>st</sup> Year 2<sup>nd</sup> Semester</h2>"; echo show_timetable(3, 2); ?> 
			</div>	
			<!-- 1st sems of MGT -->
			<div> 
				<?php echo "<h2>2<sup>nd</sup> Year 1<sup>st</sup> Semester</h2>"; echo show_timetable(5, 2); ?> 
			</div>	
			<!-- 1st sems of MGT -->
			<div> 
				<?php echo "<h2>2<sup>nd</sup> Year 2<sup>nd</sup> Semester</h2>"; echo show_timetable(2, 2); ?> 
			</div>	
			<!-- 1st sems of MGT -->
			<div> 
				<?php echo "<h2>3<sup>rd</sup> Year 1<sup>st</sup> Semester</h2>"; echo show_timetable(4, 2); ?> 
			</div>	
			<!-- 2nd sems of MGT -->
			<div> 
				<?php echo "<h2>3<sup>rd</sup> Year 2<sup>nd</sup> Semester</h2>"; echo show_timetable(6, 2); ?> 
			</div>	
			<!-- 2nd sems of MGT -->
			<div> 
				<?php echo "<h2>4<sup>th</sup> Year 1<sup>st</sup> Semester</h2>"; echo show_timetable(7, 2); ?> 
			</div>	
			<!-- 2nd sems of MGT -->
			<div> 
				<?php echo "<h2>4<sup>th</sup> Year 2<sup>nd</sup> Semester</h2>"; echo show_timetable(8, 2); ?> 
			</div>	
			<!-- 2nd sems of MGT -->
			</div>
		</div><br /><hr>
		<div class="department">



			<h3>Department of B.Com </h3>
		 
						
			<div style="margin-bottom: 70px;" 
				class="cycle-slideshow" 
				data-cycle-fx="fade"
				data-cycle-pause-on-hover="true"
				data-cycle-timeout="4000"
				data-cycle-slides="> div">

			<div> 
				<?php echo "<h2>1<sup>st</sup> Year 1<sup>st</sup> Semester</h2>"; echo show_timetable(1, 3); ?> 
			</div>	
			<!-- 1st Sems of Bcom -->
			<div> 
				<?php echo "<h2>1<sup>st</sup> Year 2<sup>nd</sup> Semester</h2>"; echo show_timetable(3, 3); ?> 
			</div>	
			<!-- 1st Sems of Bcom -->
			<div> 
				<?php echo "<h2>2<sup>nd</sup> Year 1<sup>st</sup> Semester</h2>"; echo show_timetable(5, 3); ?> 
			</div>	
			<!-- 1st Sems of Bcom -->
			<div> 
				<?php echo "<h2>2<sup>nd</sup> Year 2<sup>nd</sup> Semester</h2>"; echo show_timetable(2, 3); ?> 
			</div>	
			<!-- 1st Sems of Bcom -->
			<div> 
				<?php echo "<h2>3<sup>rd</sup> Year 1<sup>st</sup> Semester</h2>"; echo show_timetable(4, 3); ?> 
			</div>	
			<!-- 2nd Sems of Bcom -->
			<div> 
				<?php echo "<h2>3<sup>rd</sup> Year 2<sup>nd</sup> Semester</h2>"; echo show_timetable(6, 3); ?> 
			</div>	
			<!-- 2nd Sems of Bcom -->
			<div> 
				<?php echo "<h2>4<sup>th</sup> Year 1<sup>st</sup> Semester</h2>"; echo show_timetable(7, 3); ?> 
			</div>	
			<!-- 2nd Sems of Bcom -->
			<div> 
				<?php echo "<h2>4<sup>th</sup> Year 2<sup>nd</sup> Semester</h2>"; echo show_timetable(8, 3); ?> 
			</div>	
			<!-- 2nd Sems of Bcom -->
			</div>
		</div>	

			
		</div>
		<br><hr>

</div>

<?php if(isset($_GET['err'])){error_message($_GET['err']);} ?>
<?php if(isset($_GET['msg'])){message($_GET['msg']);} ?>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery.cycle2/2.1.6/jquery.cycle2.min.js'></script>
<script src="js/jquery.cycle2.min"></script>
<script src="js/jquery.min"></script>
  
</body>
<?php include 'include/footer.html'; ?> <!-- footer section file attachment -->
</html>
