<h1>Baza</h1>
<br><a href="index.php?mod=article"><button>Dodaj artykuł</button></a><br>
<h2>ćwiczenie 10/11</h2>
<form action="include/userAdd.php" method="POST">
<input type="text" name="imie" pattern="[A-Z]{1,1}[a-z]{1,}" placeholder="imie" title="Imie musi zawierac jedna duza litere oraz conajmniej jedna mala">
<input type="number" name="wiek" min="1" max="150" placeholder="wiek" title="Wartość liczbowa w zakresie od 1 do 150">
<button class="przycisk">wyslij</button>
</form>

<?php
	try{
		$db = new PDO('sqlite:include/db/baza.sqlite');
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql="SELECT * FROM zawodnicy LIMIT 10 OFFSET 0";
		$result = $db->query($sql);
	echo"	<div class='container table frame' id='topTable'>";
		if(array_key_exists('err',$_GET)){
			echo"
				<div class='row frame'>
					<div class='col-lg-12 warn'>".$_GET['err']."</div>
				</div>";
		}
		echo"	<div class='row'>
					<div class='col-lg-12 centerSwitch'>
						<button onClick='reloadData(this.value)' id='prevbut' value='0'>poprzednie 10 wznikow</button>
						<button onClick='reloadData(this.value)' id='nextbut' value='10'>nastepne 10 wznikow</button>
					</div>
				</div>
				<div class='row frame'>
					<div class='col-lg-1'>ID</div>
					<div class='col-lg-3'>Imię</div>
					<div class='col-lg-8'>Wiek</div>
				</div>";
		echo"
			</div>
			<div class='container table frame' id='bottomTable'>";
	foreach($result as $r) {
		echo"	<div class='row frame'>
					<form action='include/userMod.php' method='POST'>
						<div class='col-lg-1'>
							<input type='text' name='id' value='".$r[0]."' style='display:none' title='Imie musi zawierać jedna duża i conajmniej jedna małą litere'>".$r[0]."
						</div>
						<div class='col-lg-3'>
							<input type='text' name='name' value='".$r[1]."' pattern='[A-Z]{1,1}[a-z]{1,}' title='Imie musi zawierać jedna duża i conajmniej jedna małą litere'>
						</div>
						<div class='col-lg-3'>
							<input type='number' name='age' min='1' max='150' value='".$r[2]."' title='Wartość liczbowa w zakresie od 1 do 150'>
						</div>
						<div class='col-lg-3'>Czynność do wykonania 
							<select name='mod'>
								<option value='1'>Edit</option>
								<option value='0'>Del</option>
							</select>
						</div>
						<div class='col-lg-2'>
							<button class='przycisk'>Wyslij</button>
						</div>
					</form>
				</div>";
		}
	
	echo"		<div class='row frame'>
					<div class='col-lg-12'>".$sql."</div>
				</div>
			</div>
		<script>
			function reloadData(str){
				if (str==''){
					document.getElementById('bottomTable').innerHTML='';
					return;
				} 
				if (window.XMLHttpRequest){
					// code for IE7+, Firefox, Chrome, Opera, Safari
					xmlhttp=new XMLHttpRequest();
				} else {
					// code for IE6, IE5
					xmlhttp=new ActiveXObject('Microsoft.XMLHTTP');
				}
				xmlhttp.onreadystatechange=function(){
					if (xmlhttp.readyState==4 && xmlhttp.status==200) {
						document.getElementById('bottomTable').innerHTML=xmlhttp.responseText;
						if(document.getElementsByClassName('count').length<10){
							document.getElementById('nextbut').style.display='none';
						}else{
							if(document.getElementById('nextbut').style.display=='none'){
								document.getElementById('nextbut').style.display='initial';
							}
							document.getElementById('nextbut').value=parseInt(str)+10;
						}
						if(parseInt(str)<=0){
							document.getElementById('prevbut').style.display='none';
						}else{
							document.getElementById('prevbut').style.display='initial';
							document.getElementById('prevbut').value=parseInt(str)-10;
						}
					}
				}
				xmlhttp.open('GET','include/getDataFromSql.req.php?b='+str,true);
				xmlhttp.send();
			}
		</script>
	";
		
	}
	catch(PDOException $e){
		echo 'Błąd: ' . $e->getMessage();
	}
?>