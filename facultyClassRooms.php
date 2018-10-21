<?php session_start();
	include 'database/dbconn.php';
	include 'function.php';
?>

<?php include 'include/head.html'; ?>
<body>
<?php include 'include/topbar.php' ?>
<?php include 'include/navigation.php' ?>
	<div style="width: 95%; height: auto; /*float: left;*/ margin: auto; margin-bottom:70px; overflow: hidden; background-color: gainsboro; box-shadow: 0px 1px 13px 1px #0000004f;">
		<h2 style="text-align: center; color: rgba(105, 105, 105, 0.73); margin: 15px 0px 5px 0px;  ">
			Lecture Halls of the Faculty of Management &amp; Commerce
		</h2><hr>

		<div class="floor">
		<header>Ground Floor</header>
			<div style="width: 95%; margin: auto; overflow: auto;">
			<?php echo classroom("Ground"); ?>
			</div>
		</div>

		<div class="floor" style="margin-bottom: 20px;">
		<br /><hr />
		<header>First Floor</header>
			<div style="width: 95%; margin: auto; overflow: auto;">
			<?php echo classroom("First"); ?>
			</div>
		</div>
	</div>
<?php if(isset($_GET['err'])){error_message($_GET['err']);} ?>
<?php if(isset($_GET['msg'])){message($_GET['msg']);} ?>
<?php include 'include/footer.html' ?>

</body>
</html>