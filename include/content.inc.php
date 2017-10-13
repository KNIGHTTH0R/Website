<?php
	if (!array_key_exists('mod', $_GET)){
		$mod='glowna';
	}
	else {
		$mod=$_GET['mod'];
	}
	$found=false;
	$foundMenu=false;
	$foundError=false;
	$which=0;
	if(isset($_SESSION['lang'])){
		if(file_exists("include/menu/bootstrap.mod.".$_SESSION['lang'].".inc.php")){
			$requireMenu="include/menu/bootstrap.mod.".$_SESSION['lang'].".inc.php";
			$foundMenu=true;
		}
		if(file_exists("include/art/page_".$_SESSION['lang']."_".$mod.".inc.php")){
			$requireArt="include/art/page_".$_SESSION['lang']."_".$mod.".inc.php";
			$found=true;
		}else if(file_exists("include/art/page_".$_SESSION['lang']."_blad.inc.php")){
			$requireArt="include/art/page_".$_SESSION['lang']."_blad.inc.php";
			$foundError=true;
		}
	}
	$lang=(explode(',', $_SERVER['HTTP_ACCEPT_LANGUAGE']));
	foreach($lang as $x => $x_value) {
		$lang[$x]=substr($x_value,0,2);
	}
	$lang=array_unique($lang);
	foreach($lang as $x => $x_value){
		if(file_exists("include/menu/mod.".$x_value.".inc.php") && $foundMenu!=true){
			$requireMenu="include/menu/bootstrap.mod.".$x_value.".inc.php";
			$foundMenu=true;
		}else if($foundMenu!=true){
			$requireMenu="include/menu/bootstrap.mod.pl.inc.php";
		}
		if(file_exists("include/art/page_".$x_value."_".$mod.".inc.php") && $found!=true){
			$requireArt="include/art/page_".$x_value."_".$mod.".inc.php";
			$found=true;
		}else if($found!=true){
			if(file_exists("include/art/page_".$x_value."_blad.inc.php") && $foundError!=true){
				$requireArt="include/art/page_".$x_value."_blad.inc.php";
				$foundError=true;
			}else if($foundError!=true){
				$requireArt="include/art/page_pl_blad.inc.php";
			}
			if(file_exists("include/art/page_pl_".$mod.".inc.php")){
				$requireArt="include/art/page_pl_".$mod.".inc.php";
			}
		}
	}
?>