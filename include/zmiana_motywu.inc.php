<?php
	if(isset($_POST['motyw'])){
		session_start();
		$_SESSION['motyw']=$_POST['motyw'];
		header("Location: ../index.php");
	}else{
		header("Location: ../index.php");
	}
?>