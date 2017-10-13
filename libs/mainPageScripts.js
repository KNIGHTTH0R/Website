function loadArticles(str){
	if (str==''){
		document.getElementById('section').innerHTML='';
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
			document.getElementById('section').innerHTML=xmlhttp.responseText;
		}
	}
	xmlhttp.open('GET','include/getArticlesFromSql.req.php?b='+str,true);
	xmlhttp.send();
}
function loadData(str){
	if (str==''){
		document.getElementById('section').innerHTML='';
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
			document.getElementById('section').innerHTML=xmlhttp.responseText;
		}
	}
	xmlhttp.open('GET','include/getArticleFromSql.req.php?b='+str,true);
	xmlhttp.send();
}