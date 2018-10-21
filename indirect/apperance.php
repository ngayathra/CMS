<?php
	include 'database/dbconn.php';
	session_start();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Messages | Notices</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="css/style.css"/>
		<link rel="stylesheet" type="text/css" href="css/style2.css"/>
		<link rel="stylesheet" type="text/css" href="css/css/font-awesome.min.css"/>
		<script src="js/script.js"></script>
</head>
<body>	

<?php include 'include/topbar.php' ?>

<div class="dashboard_container" id="d">
<header><div id="item-name"> DashBoard</div></header>

	<?php include 'include/dashboard-items.php' ?> 	<!-- calling dashboard items -->

</div>
<script>		// toggle function of the admin's dashboard panel

	function toggle() {
    var i = document.getElementById("item-name");
    var i1 = document.getElementById("item-name2");
    var i2 = document.getElementById("item-name3");
    var i3 = document.getElementById("item-name4");
    var i4 = document.getElementById("item-name5");
    var i5 = document.getElementById("item-name6");
    var i6 = document.getElementById("item-name7");
    var i7 = document.getElementById("item-name8");
    if (i.style.display === "none") {
        i.style.display = "block";
        i1.style.display = "block";
        i2.style.display = "block";
        i3.style.display = "block";
        i4.style.display = "block";
        i5.style.display = "block";
        i6.style.display = "block";
        i7.style.display = "block";
        i.style.width = "170px";
        i.style.transition = "ease-in-out 0.7s";

      
    } else {
        i.style.display = "none";
        i1.style.display = "none";
        i2.style.display = "none";
        i3.style.display = "none";
        i4.style.display = "none";
        i5.style.display = "none";
        i6.style.display = "none";
        i7.style.display = "none";
        i.style.width = "0px";
      	
    }
    
}
		
</script>

<main id="content" class="content">
<div class="appearence">
	<h2>Apperance of the site</h2>
	<hr><br>
	<form method="POST" action="appearence.html">
		Color of the top Bar :		<SELECT>
										<OPTION>Gray</OPTION>
										<OPTION>Dark Blue</OPTION>
										<OPTION>Pal Yellow</OPTION>
										<OPTION>Green</OPTION>
									</SELECT><br>
		Color of the background :	<SELECT>
										<OPTION>Gray</OPTION>
										<OPTION>Dark Blue</OPTION>
										<OPTION>Pal Yellow</OPTION>
										<OPTION>Green</OPTION>
									</SELECT><br>
		Color of the divs :			<SELECT>
										<OPTION>Gray</OPTION>
										<OPTION>Dark Blue</OPTION>
										<OPTION>Pal Yellow</OPTION>
										<OPTION>Green</OPTION>
									</SELECT><br>


		<button  class="apply_btn" name="apply" value="submit" type="submit">Apply</button>
	</form>
	
</div>
</main>
<?php include 'include/footer.html' ?>
</body>
</html>