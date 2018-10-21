
<?php
	$host ='localhost';
	$username = 'root';
	$password = '';
	$dbase = 'CMS';

	$conn = mysqli_connect($host, $username, $password, $dbase);

	if(!$conn){

		die("Database could not connected<br>"  . mysqli_connect_error()) ;
	}
// #creating database if not exists, named as "loginsystem"
	// $sql = "CREATE DATABASE loginsystem";
	// if (mysqli_query($conn, $sql)) {
		
	// 	$d = "database created<br>";
	// }else{
	// 	$d ="database already exists<br>";
	// }

// //creatind a table in the database if not exists, named as "usertable"
	// $sql = "CREATE TABLE usertable(
	// id INT (9)  NOT NULL PRIMARY KEY AUTO_INCREMENT,
	// username VARCHAR (255) NOT NULL,
	// password VARCHAR (15) NOT NULL,
	// name VARCHAR (255) NOT NULL,
	// birthday DATE NOT NULL
	// );";
	// if (mysqli_query($conn, $sql)) {
	// 	$u ="table created<br>";
	// }else{
	// 	$u = "table not created<br>";
	// }

// // //creating a table in the database if not exists, named as "news_table"
	// $sql = "CREATE TABLE news_table(
	// id INT (9) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	// u_id VARCHAR (255) NOT NULL,
	// news VARCHAR (2000) NOT NULL,
	// date DATE NOT NULL
	// );";
	// if (mysqli_query($conn, $sql)) {
		
	// 	$c = "comment table created<br>";
	// }
	// else{
	// 	$c = "comment table is exists/not created<br>";
	// }
	
	

// // //creating a table in the database if no exists, named as
	// $sql = "CREATE TABLE lecturer_attendance_table(
	// id INT (3)  NOT NULL PRIMARY KEY AUTO_INCREMENT,
	// u_id VARCHAR (255) NOT NULL,
	// password VARCHAR (15) NOT NULL,
	// name VARCHAR (100) NOT NULL,
	// department VARCHAR (250) NOT NULL,
	// pro_pic_location VARCHAR (5000) NOT NULL,
	// description VARCHAR (1000) NOT NULL,
	// attendance BOOLEAN NOT NULL
	// );";
	// if ($conn->query($sql)) {
	// 	$p ="table created<br>";
	// }
	// else{
	// 	$p = "table not created<br>";
	// }

	// echo "<div class='alert'>";
	// echo "<span class ='closebtn' id= 'closebtn' onclick='close()'> &times; </span>";
	// echo ucwords($d . " " . $u ." " . $c . " " . $p);
	
	// echo 	"</div>";
?>