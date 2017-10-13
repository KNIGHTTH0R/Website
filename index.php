<?php
	//var_dump($_SERVER['HTTP_ACCEPT_LANGUAGE']); tu jest akceptowany jezyk
	session_start();
	require_once("include/template.inc.php");
	//require_once('include/conf/config.php');//zapotrzebowanie na plik (jezeli go nie bedzie to dalej sie nie bedzie wykonywac) !jednokrotne!
	if(array_key_exists('log',$_SESSION) && $_SESSION['ip']==$_SERVER['REMOTE_ADDR']){
		$Profil=$_SESSION['user'];
		require_once("include/form_logout.inc.php");
		require_once("include/content.inc.php");
		require_once($requireMenu);
		require_once("include/article.inc.php");
	}else{
		if(array_key_exists('err',$_GET) && $_GET['err']==1){
			echo'
				<style>
					#loginForm{
						margin-top:0!important;
					}
				</style>
				<div style="margin:0 auto;margin-top:10%;color:white;width:400px;text-align:center;">
					Masz wyłączoną obsługe plików cookie...
				</div>';
		}
		require_once("include/form_login.inc.php");
		session_destroy();
	}
	require_once("include/template.end.inc.php");
?>