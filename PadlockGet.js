"use  strict";
var x = document.getElementById("demo");
var loclon = " ";
var loclat = " ";
var locnumber = 27;

    // Replace the value of the key parameter :  own API key for www.xpens.co.uk. 
    //<script async defer
    //src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAVV8rhkFyg1BButVxbzZ2DAVPSSxHravQ&callback=initMap">
    //
function init() {		 
 	// not used code		 		
		var a = 1;
		var bad = 0;
	 
       }

function poparray1(){
	var listArry = [];	
	var myresult = " ";
	var loclan = "0";
	var loclat = "0";
	//get the current location or display all the padlocks if unable to get the location
	
	getLocation();
  
 }   

function getLocation() 
{
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
        var z = document.getElementById("gnumber");
		// z.innerHTML = "12";
		//z1.innerHTML = "Grafitti.... found";

    } else {
        x.innerHTML = "Geolocation is not supported by this browser.";      
    }    
}

// use global variables loclon and loclat
function showPosition(position) {
	var z1 = document.getElementById("gtext");
	var z = document.getElementById("gnumber");
    var z2 = document.getElementById("plat");
    var z3 = document.getElementById("plon");

	z1.innerHTML = "Padlocks found:..	";
	loclat = position.coords.latitude;
	loclon = position.coords.longitude;
	z2.innerHTML= position.coords.latitude;
    z3.innerHTML= position.coords.longitude;

	
	document.getElementById("lat1").innerHTML = loclat;
    document.getElementById("lat1").innerHTML = loclon;
    document.getElementById("graflat").value = loclat;
    document.getElementById("graflong").value = loclon;

    var latlon = position.coords.latitude + "," + position.coords.longitude;
    var img_url = "https://maps.googleapis.com/maps/api/staticmap?center="
    +latlon+"&zoom=16&size=400x150&sensor=false";

    Getnumber(loclon,loclat);
   
   document.getElementById("mapholder").innerHTML = "<img src='"+img_url+"'>";
   //z.innerHTML = locnumber;
}
// 
// get the number of grafitti entered in this latitude:longitude, called from getlocation()
function Getnumber(wsloclon,wsloclat)
{
	var str =  wsloclon  + ":"  + wsloclat;
	var z = document.getElementById("gnumber");
	locnumber = 0;
    if (wsloclat == "" || wsloclon == "") {
        document.getElementById("demo").innerHTML = "Location not marked";
        return;
    }	 else { 
        		if (window.XMLHttpRequest) {
            	// code for IE7+, Firefox, Chrome, Opera, Safari
            								xmlhttp = new XMLHttpRequest();
        									} 
    		   }
           		 xmlhttp.onreadystatechange = function() {
            				if (this.readyState == 4 && this.status == 200) {
                			document.getElementById("gnumber").innerHTML = this.responseText;
            				}
        		};
        xmlhttp.open("POST","padlockGetPhpNo.php?q="+str,true);
        xmlhttp.send();
        if (locnumber != 0){
   		       z.innerHTML = locnumber;};
		// locnumber = str;
}
//
//
// use local storage for something, not yet used in graffiti
function Getsecret()
{
	//alert ("start getsecret");
	var phoneNear = "N";
	//SaveNewCode();
	getGeoLocation();
	//use the location detail to determine
		//if a graffiti message was created in facinity
		//IF PHONE IS NEAR THE LOCATION. list all the message names.
	poparray1();
	/*if (phoneNear = 'Y')
	{
		document.getElementById("showMessage").value = " this is a test message, message near ";
	}	
	if (phoneNear = 'N') 
	{
		document.getElementById("showMessage").value = " this is a test message, message is still far away!! ";
	}*/
}
/*
function SaveNewCode(){
	var codeadd = document.getElementById("codeAd")
	var lexdate = Date.now();
	document.getElementById("demo").innerHTML = lexdate;
	var textf = document.getElementById("codeAd").value;
    var n = "msgcode" + (localStorage.length + 1);
	var myresult = lexdate + ", " + codeadd
	localStorage.setItem(n,myresult);
	
}*/
function loadDoc(lon,lat){	
	 if (lat == "") {
        document.getElementById("grafData").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        var  str = lat+','+lon;
        xmlhttp.open("POST","graffitigetajax.php?q="+str,true);
        xmlhttp.send();
    }
}
