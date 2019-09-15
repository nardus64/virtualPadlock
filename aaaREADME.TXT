Padlock system 
Program list
Main screen
padlockPutDB.html
	added stripe here
		need jquery to run use google api, v3.3.1
			must have - will return program not found if this is not included
	sub screens
	payment screens:
			styles.css
			charge.js -copied from stripe
			charge.php -- create user and charge account. see the link to the success page copied from 		traversy
			success.php - using bootstrap - return the succesfull message with the stripe code 

	level 1
		bridgeList.php 
			scripts - location.js
			style sheets - 	w3school
						 -	/text/style/style.css
						 - styling in html part of php
		level 2
			bridgeList2.php
				style sheets - 	w3school
							 -	/text/style/style.css
							 - styling in html part of php
			
			level 3a
				--pladd.html
				pladdphp.php  use php not html
				     -	style sheets - 	w3school
					 -	/text/style/style.css
					 - styling in html
					level 4
						pladd.php -- add the message to the pcmessage table, update the padlockcodes- pcused = Y
						plgetkey.php -- read the list of unused keys using the email address and display
			level 3b
				padlocklistrep.php

javascript
	location.js
	myfunctions.js --> copy text in success.php
			 - https://codepen.io/shaikmaqsood/pen/XmydxJ
			copy the stripe key code to memory
			to do : add the stripe code to a local dtabase as in the xpenses app
style sheets:
	/text/style/style.css(in roor of padlock)
	adminstyle.css  - use in the admin area adminPL.html
	
admin area:
adminPL.html
	adminlogin.php - test the users use (development)na@a.com,Test1234 (production)nardus@gmail.com,Test12345
	adminPL.php menu for changes 
		manage bridges. add/delete/edit
	PLlogout.php
		logout the user and return to adminPL.html
		PLAddBridge.php -- find location, add a name and the latitude and longitude to 				table:padlockbridge
	PLlistBridge - list all the bridges in the table.
	
use this to test connection and sql return.
// var_dump($result);
// echo mysqli_error($con);

TO DO LIST
in production:
version in /users/nardus/javascript/padlock
n) on pladdphp.php - te names input area should only display 45 charagter wide not accross the whole screen and centred see email address.
l.1) Add the code to copy stripe key to local area in success.php
l.2) copy the key button in success.php fix the copy- it does not copy code to memmory!!!
m)CANCEL THIS - do not use local storage without permission - add listing of local storage for the keys from stripe

e1) display a map in screen bridgelist.php after allow  acces to location.
e2) display bridges on the map displayed.
i) sticky menu bar/fixed menu bar
j) test if php can be replaced with python code on godaddy server.

f) stripe
	f3) test stripe code  in production live values
	f4) add the metro account to stripe -- done

Done
a) check/validate the recaptcha return value before saving 
b) exit from pladd.html to front screen href="padlockPutDB.html"  to avoid errors -> done
c) exit from plpadlocklstrep.php to front screen href="padlockPutDB.html"  to avoid errors
d) add the location check in bridgelist2.php before listing the bridges - done
a.1)when adding the padlock names, populate the bridge id and do not allow change - done
f2) test the stripe code pladd.php
1)bridgeList2.php do not connect to dbase:
		change the development setting in conn.
g) add search padlocks by email address names -both names. screen padlocklistrep.php
	add search padlocks on secret code screen padlocklistrep.php
i) create a nice warning when the location was not marked in bridgelist.php
f) stripe
	//f1) save stripe codes to database
	//	f1.a)read email and save to text file,
	activate stripe
	
	
deploy code for changes:
don = copied to javascript - still need to check the dev/test environment changes
done = moved to godaddy production.

3/3/19
done location.js 
done pladdphp.php 
done  padlockPutDB.html
done bridgeList.php



 2/2/2019
done bridgeList.php - add a stripe payment 
!!!!fix the return from stripe to this page
input type=.. autocomplete="off" -- add this to the key field.
autofocus

padlockPutDB.html -- remove stripe code, move the jpeg image, change the pitch paragraph add a border 
	test new version
	padlockPutDB-v2.html - add the bridgeList.php code to this screen
pladd.php - add userdate  and various error checks
location.js - remove map url - this do not work anymore and neeed more investigation.
pladdphp.php - add stripe payment button, 
	errors: 1) REMOVED THIS STILL NOT WORK-> it should return to this page.
			  2) display a button only not a line accross the page.
			  3) REMOVED THIS->added share buttons for facebook and twitter do not work. 
20/12/18

done plgetkey.php - fix the search to search for pcused = 'N' not spaces.
fixed message key is still not updated and not inserted into the pcmessage table.


09/12/18
done - padlockPutDB.html -- added stripe error 
done - charge.php -- remove echo, save email, hash email using php password_hash -reset dev to production.   
done - pladdphp.php - show listing of keys by accept and send email to plgetkey
done - plgetkey.php - new add ability to search a key on email address - use password_verify() to select correct email
donee - bridgelist2.php -- add test for db CONNECTION result test, reset dev to prod
done- bridgelist3.php -- add test for db CONNECTION result test, reset dev to prod
add pcemail to the padlockcodes table
29/09/18
test - display the grafitti 1 on a page and allow page down.


29/9/2018
new back ground 98873.jpg
default.html



23/09/18
default.html, 
other.html
wall.gif

23/09/2018 done.
PLlistBridge2
AdminPL.php





22/9/18
pladdbridge.php - changed thefont size and closed the label tag, allowingmore respomsive screen display
adminstyle.css
done
adminpl.php



15/09/2018
adminPL.html- done
adminPL.php  - done
adminstyle.css done
PLAddBridge.php - add fieldset and labels, increase font size -- done

16/09/18:fix the plbridgeadd.php  to display in grid format

test script:
1) test if only 1 row is update, inserted into a table, 
	a)padlockcodes update only intended row after the message was added to pcmessage.