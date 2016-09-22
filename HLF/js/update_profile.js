$("#update_btn").click(function(){
	var cell = document.forms["edit"]["cell"].value;
	var location = document.forms["edit"]["location"].value;
	var citizen = document.forms["edit"]["citizen"].value;
	var alma = document.forms["edit"]["alma"].value;
	var field = document.forms["edit"]["field"].value;
	var spec = document.forms["edit"]["spec"].value;
	var exp = document.forms["edit"]["exp"].value;
	var gender = document.forms["edit"]["gender"].value;
	var religion = document.forms["edit"]["religion"].value;
	var interests = document.forms["edit"]["interests"].value;
	updateAccount(cell, location, citizen, alma, field, spec, exp, gender, religion, interests);

});

var updateAccount = function(a,b,c,d,e,f,g,h,i,j){
	var xttp = new XMLHttpRequest();

	xttp.onreadystatechange = function(){
		if(xttp.readyState === 4 && xttp.status === 200){
			if(xttp.responseText == "done"){
				location.reload();
			}else{
				alert("Please make sure you have provided all the information needed");
			}
		}
	};
	xttp.open("GET", "http://localhost/hlf/update_profile.php?cell="+a+"&c_location="+b+"&citizen="+c+"&alma="+d+"&field="+e+"&specialty="+f+"&exper="+g+"&gender="+h+"&religion="+i+"&interests="+j, true);
	xttp.send();

}