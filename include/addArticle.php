<?php
	if(array_key_exists("title",$_POST) && array_key_exists("art",$_POST) && array_key_exists("lang",$_POST)){
		try{
			$db = new PDO('sqlite:db/articles.sqlite');
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$msg="";
			$title=$_POST['title'];
			$art=$_POST['art'];
			$lang=$_POST['lang'];
			echo $title."<br>".$art."<br>".$lang."<br>";
			if (!preg_match("/\w{1,}/",$title)) {
				$msg = "&err=Nie podano tytulu b¹dz zosta³ on podany b³êdnie";
				echo "msg=".$msg;
			}else{
				if (!preg_match("/\w{1,}/",$art)) {
					$msg ="&err=Nie wpisano tresci artykulu";
					echo "msg=".$msg;
				}else{
					if (!preg_match("/^[A-Z]{1}[a-z]{1}/",$lang)) {
						$msg ="&err=Jêzyk zostal niepodany lub jest okreslony niepoprawnie";
						echo "msg=".$msg;
					}else{
						$sql="INSERT INTO data (id, title, art, lang) VALUES (null, '$title', '$art', '$lang')";;
						echo "sql=".$sql;
						$result = $db->query($sql);
					}
				}
			}
			header("Location: ../index.php?mod=article".$msg);
		}
		catch(PDOException $e){
			echo 'B³¹d: ' . $e->getMessage();
		}
	}
?>