<?php
	session_start();
	include 'database/dbconn.php';
	include 'function.php';

?>

<?php include 'include/head.html'; ?>
<body>

<?php include 'include/topbar.php'; ?> <!-- login/logout top bar section file attachment -->
<?php include 'include/navigation.php'; ?>


<!-- 	<div class="search_bar_container">
			<form action="lb.php" method="POST">
				<input type="search" name="search" placeholder="Search">
			</form>
	</div> -->

<div class="department_container">
	<h2 style="margin: 15px 0px 5px 0px;">Lecturer Board of Faculty of Management &amp; Commerce</h2><hr>
	
		<div class="department">
			<h3>Department of Management &amp; Information Technology (MIT)</h3>
			<?php echo lecturer_info(1); ?>
		</div>
		<br><hr>

		<div class="department">
			<h3>Department of BBA</h3>
			<?php echo lecturer_info(2) ?>
		</div>
		<br><hr>
		
		<div class="department">
			<h3>Department of B.com</h3>
			<?php echo lecturer_info(3) ?><br>
		</div>
</div>

<?php if(isset($_GET['err'])){error_message($_GET['err']);} ?>
<?php if(isset($_GET['msg'])){message($_GET['msg']);} ?>
<?php include 'include/footer.html'; ?> <!-- footer section file attachment -->

</body>
</html>