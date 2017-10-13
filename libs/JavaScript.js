function getCookie(cname) {
	var name = cname + "=";
	var ca = document.cookie.split(';');
	for(var i=0; i<ca.length; i++) {
		var c = ca[i];
		while (c.charAt(0)==' ') c = c.substring(1);
		if (c.indexOf(name) == 0) return c.substring(name.length,c.length);
	}
	return "";
}
var acc = getCookie("accepted");
$(document).ready(function(){
	if (acc=='true') {
		$(".footContent").toggle(0);
		$("#footSwitch").get(0).innerHTML = "<img src='images/MaximButton.png' alt='zminimalizuj'>"
		$("#footSwitch").removeClass("col-lg-6");
		$("#footSwitch").addClass("col-lg-12");
	}
	$("#footSwitch").click(function(){
		$(".footContent").toggle(0);
	});
	$("#footSwitch").click(function(){
		if($("#footSwitch").hasClass("col-lg-6")){
			$("#footSwitch").get(0).innerHTML = "<img src='images/MaximButton.png' alt='zminimalizuj'>"
			$("#footSwitch").removeClass("col-lg-6");
			$("#footSwitch").addClass("col-lg-12");
			if(acc==""){
				document.cookie="accepted=true";
			}
		}else{
			$("#footSwitch").get(0).innerHTML = "<img src='images/MinimButton.png' alt='zminimalizuj'>"
			$("#footSwitch").removeClass("col-lg-12");
			$("#footSwitch").addClass("col-lg-6");
		}
	});
});
