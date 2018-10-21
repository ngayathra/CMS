<?php
	include 'database/dbconn.php';
	session_start();
    include 'function.php';
?>

<?php 
    // create a new notice
    if(isset($_POST['post-message'])){ //if the post-message button set then get the values in the input boxes
        // $name = $_POST['name'];
        $user_id = $_POST['user_id'];
        $news = real_input($_POST['message']);
        $date = $_POST['date'];
    
    $sql = "INSERT INTO news_table(admin_id, news, news_date) VALUES ('$user_id', '$news', '$date')";
    $result = mysqli_query($conn, $sql);
    if($result){
        header('Location: message.php?msg=news was posted successfully');
    }
    else {
        header('Location: message.php?err=news was not posted');
    }
}
 ?>

 <?php 
    if(isset($_GET['update_news'])){
       $news_id = $_GET['news_id'];
       $news = real_input($_GET['news']);
       $news_date = $_GET['news_date'];

       $sql ="UPDATE news_table SET news = '{$news}', news_date = '{$news_date}' WHERE id = '{$news_id}'";
       $result = mysqli_query($conn, $sql);
       if($result){
        header('Location: message.php?msg=news was updated successfully');
    }
    else {
        header('Location: message.php?err=news was not updated');
    }
}
  ?>

 <?php 
    if(isset($_GET['remove_news'])){
       $news_id = $_GET['news_id'];

       $sql ="DELETE FROM news_table  WHERE id = '{$news_id}' LIMIT 1";
       $result = mysqli_query($conn, $sql);
       if($result){
        header('Location: message.php?msg=news was deleted successfully');
        }
        else {
        header('Location: message.php?err=news was not deleted');
        }
    }
  ?>  
<?php include 'include/head.html'; ?>
    <body>

<?php include 'include/topbar.php' ?>

<div class="dashboard_container" id="d">
<header><div id="item-name"><a href="dashboard.php" style="text-decoration: none; color: white;"> DashBoard</a> </div></header>

	<?php include 'include/dashboard-items.php' ?> 	<!-- calling dashboard items -->

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
	<div class="message_container" style="width: 400px;">
		<h2>Post a New Notice</h2>
		<hr><br>
			<form action="message.php" method="POST" >
 				<input type="hidden" name="name" value="<?php $name = $_SESSION['name']; echo '$name'; ?>" />
                <input type="hidden" name="user_id" value="<?php $user_id = $_SESSION['id']; echo '$user_id'; ?>" />
				<input type="text" name="message" placeholder="Type your message| news here" required="required"/>
				<input type="date" name="date">
                <div style="width: 100%; height: 47px; overflow: hidden; margin-top: 15px;">
                    <button type="submit" name="post-message" style="float: none; margin: 0 auto; display: inherit;">Post</button>
                </div>
			</form>
	</div>

    <div class="message_container" style="width: 700px;">
        <h2>Manage Notices</h2>
        <hr><br>
        <?php listnews(); ?>
    </div>

</main>

<?php if(isset($_GET['err'])){error_message($_GET['err']);} ?>
<?php if(isset($_GET['msg'])){message($_GET['msg']);} ?>
<?php include 'include/footer.html' ?>
</body>
</html>
