<!DOCTYPE html>
<?php
	if(isset($_SESSION['motyw'])){
		if($_SESSION['motyw']){
			echo'<html id="breath">';
		}else{
			echo'<html id="rainbow">';
		}
	}else{
		echo'<html>';
	}
?>
	<head>
		<title>Tytul</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="opis strony">
		<meta name="keywords" content="HTML,CSS,JavaScript">
		<meta name="author" content="Rafał Bernat">
		<link href="libs/bootstrap-3.3.6-dist/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="styles/styles.css">
		<link rel="stylesheet" type="text/css" href="styles/animation.styles.css">
	</head>
	<body>