<h1>home page</h1>

<h2>news</h2>

<h2>check also</h2>
<h3><a href="/bootstrap/include/Games/">SpadającyŚnieg</a></h3>
<h2>...</h2>
<br>
<a id="hidden" href="/bootstrap/include/art/index.htm">SUPER SECRET</a>
<br>
<?php
	try{
		$db = new PDO('sqlite:include/db/articles.sqlite');
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql="SELECT * FROM data ORDER BY id DESC LIMIT 5 OFFSET 0";
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
							<br><button onClick='loadData(this.value)' value='".$r[0]."'>Czytaj dalej</button> Language: <span class=' ".$r[3]." Special'> ".$r[3]."</span>";
				}
		echo"		</div>
				</div>
				";
	}
	echo"
		<hr class='thickerHR'>
		<div class='row'>
			<div class='col-lg-12 centerSwitch'>
				<button onClick='loadArticles(this.value)' value='5'>More articles</button>
			</div>
		</div>
		<script src='libs/mainPageScripts.js'></script>
	";
		
	}
	catch(PDOException $e){
		echo 'Błąd: ' . $e->getMessage();
	}
	require_once("include/carousel.template.inc.php");
?>