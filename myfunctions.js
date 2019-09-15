function copyFunction(element) {
  /* Get the text field */
  var $temp = $("<input>");
  $("body").append($temp);
  $temp.val($(element).text()).select();
  document.execCommand("copy");
  $temp.remove();
}
function copyFunctionD(element){
	
}
// save key to local data 
function savemycode(){
	var NumD = document.getElementById("idDistance").value;
	var NumS = document.getElementById("idSpeed").value;
	var NumA = document.getElementById("idAngle").value;
	var NumT = document.getElementById("idTime").value;
	var Datf = document.getElementById("lexdate").value;
	var textf = document.getElementById("idDesc").value;
	var str1 = Datf.slice(0,4);
	var str2 = Datf.slice(5,7);
	var str3 = Datf.slice(8,10);
	var str4 = str1 + str2 + str3;

	if (Datf != " " && NumD != " "  && NumS != " "){
		var n = "exercisegc" + (localStorage.length + 1);
		var myresult = str4 + ", " + NumD   + ", " + NumS  + ", "+ NumA  + ", "+ textf + ", ";
		localStorage.setItem(n,myresult);
		cleanfields();
		poptextarea();
		
	}
	else
	{
		alert ("Please enter values.");
	}
}