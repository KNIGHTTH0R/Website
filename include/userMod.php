<?php
	try{
		$db = new PDO('sqlite:db/baza.sqlite');
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$msg="";
		if(array_key_exists('mod',$_POST)){
			$mod=$_POST['mod'];
			$id=$_POST['id'];
			$sql="";
			if($mod!=0){	//edit
				$imie=$_POST['name'];
				$wiek=intval($_POST['age']);
				echo"imie ".$imie."<br>wiek ".$wiek."<br>";
				if (!preg_match("/^[A-Z]{1,1}[a-z]{1,}$/",$imie)) {
					$msg = "&err=Imie musi zawierac jedna duza litere oraz conajmniej jedna mala";
					echo $msg;
				}else{
					if (!preg_match("/^[0-9]{1,3}$/",$wiek) && $wiek <= 150 && $wiek > 0) {
						$msg += "&err=Tylko liczby z zakresu od 1 do 150 sa dozwolone";
						echo $msg;
					}else{
						$sql="UPDATE zawodnicy SET imie='".$imie."', wiek='".$wiek."' WHERE id='".$id."'";
					}
				}
			}else{//del
				$sql="DELETE FROM zawodnicy WHERE id='".$id."'";
			}
			echo $sql;
			$result = $db->query($sql);
		}
		header("Location: ../index.php?mod=baza".$msg);
	}
	catch(PDOException $e){
		echo 'Błąd: ' . $e->getMessage();
	}
?>