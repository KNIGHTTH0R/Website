<?php
	if(isset($_POST['lang']) && strlen($_POST['lang'])){
		session_start();
		$_SESSION['lang']=$_POST['lang'];
		header("Location: ../index.php?mod=ustawienia");
	}else{
		header("Location: ../index.php?mod=ustawienia");
	}
?>