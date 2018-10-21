<?php
	session_start();
	include 'database/dbconn.php';
	

?>
<?php include 'include/head.html'; ?>
<body>

<?php include 'include/topbar.php'; ?> <!-- login/logout top bar section file attachment -->
<?php include 'include/navigation.php'; ?>	
	 <div class="about">
	 	<h2 style="margin: 5px 0px;">About</h2><hr>
		<p style="text-align: justify; color:#4e4e4e; ">CMS is a web-based classroom management system developed for Faculty of Management &amp; Commerce of South Eastern University of Sri Lanka. That automates most of the functions which are previously done by manually.  
				</p>
			<p style="text-align: justify; color:#4e4e4e; ">
			The Faculty of Management and Commerce of South Eastern University was established in 1996 at the university premises. It offers three (03) major degrees (departments) for its students. From the beginning to the present there is no any proper classroom management system have to seen. Therefore, most of the times the staff, lecturers and students have to face some sort of inconveniences and problems. All lecture time tables, classrooms, notices managed by ordinary level (manually) like as other universities.
			</p>
			<p style="text-align: justify; color:#4e4e4e; ">
			More than 2000 of students are currently studying at the institute, more than 50 lecturers and 50 non-academic staff are working at there. And also in the present UGC has been increased the capacity of student recruitments for the FMC. As a result of that, the limited classroom space is not enough for the education of the students, conduct the lectures, and also the timetables are changing frequently. 
			</p>
			<p style="text-align: justify; color:#4e4e4e; ">
			After considering all the factors which are founded by the analysis work, that the institute highly needed a computerized management system. To address this problem, I have decided to develop a computerized web based Classroom Management System.
			</p>
			<!-- <hr> -->
				
			<cite style="float: right; color: #898989; margin-right: 15px;"> - Developed by D.G.K.L. Nakandala</cite><br>	
	</p>
	</div>
<?php if(isset($_GET['err'])){error_message($_GET['err']);} ?>
<?php if(isset($_GET['msg'])){message($_GET['msg']);} ?> <!-- if there is a message this function will execute -->
</body>
<?php include 'include/footer.html'; ?> <!-- footer section file attachment -->
</html>
