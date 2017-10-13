<?php
try{
	$b = intval($_GET['b']);
	$db = new PDO('sqlite:db/baza.sqlite');
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql="SELECT * FROM zawodnicy LIMIT 10 OFFSET ".$b."";
	$result = $db->query($sql);
	foreach($result as $r) {
	echo "	<div class='row frame count'>
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
	echo "		<div class='row frame'>
					<div class='col-lg-12'>".$sql."</div>
				</div>";
}catch(PDOException $e){
	echo 'Błąd: ' . $e->getMessage();
}
?>