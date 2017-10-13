<?php
	try{
		$db = new PDO('sqlite:db/baza.sqlite');
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$msg="";
		if(array_key_exists('imie',$_POST) && array_key_exists('wiek',$_POST)){
			$sql = "";
			$imie=$_POST['imie'];
			$wiek=intval($_POST['wiek']);
			echo"imie ".$imie."<br>wiek ".$wiek."<br>";
			if (!preg_match("/^[A-Z]{1,1}[a-z]{1,}$/",$imie)) {
				$msg = "&err=Imie musi zawierac jedna duza litere oraz conajmniej jedna mala";
				echo $msg;
			}else{
				if (!preg_match("/^[0-9]{1,3}$/",$wiek && $wiek <= 150 && $wiek > 0)) {
					$msg += "&err=Tylko liczby z zakresu od 1 do 150 sa dozwolone";
					echo $msg;
				}else{
					$sql="INSERT INTO zawodnicy (id, imie, wiek) VALUES (null, '$imie', '$wiek')";;
					echo $sql;
					$result = $db->query($sql);
				}
			}
		}
		header("Location: ../index.php?mod=baza".$msg);
	}
	catch(PDOException $e){
		echo 'Błąd: ' . $e->getMessage();
	}
?>