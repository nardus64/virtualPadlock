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