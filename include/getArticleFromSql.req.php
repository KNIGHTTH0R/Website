<?php
try{
	$b = intval($_GET['b']);
	$db = new PDO('sqlite:db/articles.sqlite');
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql="SELECT * FROM data WHERE id=".$b."";
	$result = $db->query($sql);
	foreach($result as $r) {
		echo "<h2 class='lineH'>".$r[1]."</h2> <span class='".$r[3]." Special'>".$r[3]."</span><br>
			<span class='quote'>
				".$r[2]."
			</span>
			<br><a href='index.php'><button>Wróć do strony głównej</button></a>";
	}
}catch(PDOException $e){
	echo 'Błąd: ' . $e->getMessage();
}
?>