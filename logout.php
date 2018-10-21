<?php
	session_start();
	session_unset();
	session_destroy();
	header('Location:index.php?msg=you have successfully logout');