<?php
	require_once('conf/config.php');
	if(array_key_exists('PHPSESSID',$_COOKIE)){
		if(array_key_exists('login', $_POST) && array_key_exists('pass',$_POST)){
			if($login==$_POST['login'] && $pass==$_POST['pass']){
				echo'zalogowany jako '.$_POST['login'].'. Milego dnia!<br>';
				session_start();
				$_SESSION['user']=$_POST['login'];
				$_SESSION['log']=true;
				$_SESSION['ip']=$_SERVER['REMOTE_ADDR'];
				header("Location: ../index.php");
			}else{
				header("Location: ../index.php");
			}
		}else{
			header("Location: ../index.php");
		}
	}else{
		header("Location: ../index.php?err=1");
	}
?>