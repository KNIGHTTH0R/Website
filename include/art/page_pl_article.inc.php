<?php
if(array_key_exists('err',$_GET)){
	echo"<div class='row'>
			<div class='col-lg-12'>
				<span class='warn'>".$_GET['err']."</span>
			</div>
		</div>";
}
require_once("include/forms/form_addArticle.inc.php");
?>