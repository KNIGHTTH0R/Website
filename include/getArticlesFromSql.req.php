<?php
	try{
		$b = intval($_GET['b']);
		$tresc="";
		$rows=0;
		$db = new PDO('sqlite:db/articles.sqlite');
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql="SELECT * FROM data ORDER BY id DESC LIMIT 5 OFFSET ".$b."";
		$result = $db->query($sql);
	$i=0;
	foreach($result as $r) {
		echo"
				<hr class='thickerHR'>
				<div class='row'>
					<div class='col-lg-12'>
						<h2>".$r[1]."</h2>";
		if(strlen($r[2])<30){
			echo"			<span class='quote'>".$r[2]."</span><span class=' ".$r[3]." Special'> ".$r[3]."</span>";
		}else{
			echo"			<span class='quote'>Fragment: ".substr($r[2], 0, 30)."...</span>
							<br><button onClick='loadData(this.value)' value='".$r[0]."'>Czytaj dalej</button> Jezyk: <span class=' ".$r[3]." Special'> ".$r[3]."</span>";
		}
		echo"		</div>
				</div>
				";
		$rows++;
	}
	if($rows<5){
		$b-=5;
		$tresc="<button onClick='loadArticles(this.value)' value='".$b."'>Poprzednie artykuly</button>";
	}else{
		if($b>0){
			$bb=$b-5;
			$tresc2="<button onClick='loadArticles(this.value)' value='".$bb."'>Poprzednie artykuly</button>";
		}else{
			$tresc="";
		}
		$b+=5;
		$tresc=$tresc2."<button onClick='loadArticles(this.value)' value='".$b."'>Nastepne artykuly</button>";
	}
	echo"
		<hr class='thickerHR'>
		<div class='row'>
			<div class='col-lg-12 centerSwitch'>
				".$tresc."
			</div>
		</div>
		<script src='libs/mainPageScripts.js'></script>";
		
	}
	catch(PDOException $e){
		echo 'B³¹d: ' . $e->getMessage();
	}
	require_once("carousel.template.inc.php");
?>