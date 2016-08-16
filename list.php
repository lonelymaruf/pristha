<?php 
include("config.php");
$date = date("Y-m-d");
?>
<!DOCTYPE html>
<html>
<head>
<title><?php echo $website_name; ?> | List Your Item</title>
<meta name="description" content="<?php echo $description; ?>">
<meta name="keywords" content="<?php echo $keywords; ?>">
<meta name="google-site-verification" content="<?php echo $google; ?>" />
<meta name="msvalidate.01" content="<?php echo $bing; ?>" />

<link rel="stylesheet" type="text/css" href="stylesheet.css" />

<style type="text/css">

body{
	font-family: Trebuchet MS, Lucida Sans Unicode, Arial, sans-serif;	/* Font to use */
	margin:0px;

}

.dsc_question{	/* Styling question */
	/* Start layout CSS */
	color:#FFF;
	font-size:0.9em;
	background-color:#317082;
	width:500px;
	margin-bottom:2px;
	margin-top:2px;
	padding-left:2px;
	background-image:url('images/bg_answer.gif');
	background-repeat:no-repeat;
	background-position:top right;
	height:35px;

	/* End layout CSS */

	overflow:hidden;
	cursor:pointer;
}
.dsc_answer{	/* Parent box of slide down content */
	/* Start layout CSS */
	border:1px solid #317082;
	background-color:#E2EBED;
	width:500px;

	/* End layout CSS */

	visibility:hidden;
	height:0px;
	overflow:hidden;
	position:relative;

}
.dsc_answer_content{	/* Content that is slided down */
	padding:1px;
	font-size:0.9em;
	position:relative;
}

</style>

<script type="text/javascript">

/************************************************************************************************************

Show hide content with slide effect

Copyright (C) August 2010  DTHMLGoodies.com, Alf Magne Kalleland

Edited date: 31st October 2014


************************************************************************************************************/

var dsc_slideSpeed = 10;	// Higher value = faster
var dsc_timer = 10;	// Lower value = faster

var objectIdToSlideDown = false;
var dsc_activeId = false;
var dsc_slideInProgress = false;
var dsc_slideInProgress = false;
var dsc_expandMultiple = false; // true if you want to be able to have multiple items expanded at the same time.

function showHideContent(e,inputId)
{
	if(dsc_slideInProgress)return;
	dsc_slideInProgress = true;
	if(!inputId)inputId = this.id;
	inputId = inputId + '';
	var numericId = inputId.replace(/[^0-9]/g,'');
	var answerDiv = document.getElementById('dsc_a' + numericId);

	objectIdToSlideDown = false;

	if(!answerDiv.style.display || answerDiv.style.display=='none'){
		if(dsc_activeId &&  dsc_activeId!=numericId && !dsc_expandMultiple){
			objectIdToSlideDown = numericId;
			slideContent(dsc_activeId,(dsc_slideSpeed*-1));
		}else{

			answerDiv.style.display='block';
			answerDiv.style.visibility = 'visible';

			slideContent(numericId,dsc_slideSpeed);
		}
	}else{
		slideContent(numericId,(dsc_slideSpeed*-1));
		dsc_activeId = false;
	}
}

function slideContent(inputId,direction)
{

	var obj =document.getElementById('dsc_a' + inputId);
	var contentObj = document.getElementById('dsc_ac' + inputId);
	height = obj.clientHeight;
	if(height==0)height = obj.offsetHeight;
	height = height + direction;
	rerunFunction = true;
	if(height>contentObj.offsetHeight){
		height = contentObj.offsetHeight;
		rerunFunction = false;
	}
	if(height<=1){
		height = 1;
		rerunFunction = false;
	}

	obj.style.height = height + 'px';
	var topPos = height - contentObj.offsetHeight;
	if(topPos>0)topPos=0;
	contentObj.style.top = topPos + 'px';
	if(rerunFunction){
		setTimeout('slideContent(' + inputId + ',' + direction + ')',dsc_timer);
	}else{
		if(height<=1){
			obj.style.display='none';
			if(objectIdToSlideDown && objectIdToSlideDown!=inputId){
				document.getElementById('dsc_a' + objectIdToSlideDown).style.display='block';
				document.getElementById('dsc_a' + objectIdToSlideDown).style.visibility='visible';
				slideContent(objectIdToSlideDown,dsc_slideSpeed);
			}else{
				dsc_slideInProgress = false;
			}
		}else{
			dsc_activeId = inputId;
			dsc_slideInProgress = false;
		}
	}
}



function initShowHideDivs()
{
	var divs = document.getElementsByTagName('DIV');
	var divCounter = 1;
	for(var no=0;no<divs.length;no++){
		if(divs[no].className=='dsc_question'){
			divs[no].onclick = showHideContent;
			divs[no].id = 'dsc_q'+divCounter;
			var answer = divs[no].nextSibling;
			while(answer && answer.tagName!='DIV'){
				answer = answer.nextSibling;
			}
			answer.id = 'dsc_a'+divCounter;
			contentDiv = answer.getElementsByTagName('DIV')[0];
			contentDiv.style.top = 0 - contentDiv.offsetHeight + 'px';
			contentDiv.className='dsc_answer_content';
			contentDiv.id = 'dsc_ac' + divCounter;
			answer.style.display='none';
			answer.style.height='1px';
			divCounter++;
		}
	}
}
window.onload = initShowHideDivs;
</script>


</head>

<body>

<div id='page-wrap'>
<div align="center">

<h1>Sell your books:</em></h1>
<br>
<br>


<div class="dsc_question"><big><b>Computers Science</b></big></div>
<div class="dsc_answer">
<div>

<?php

if(isset($_POST['submit1'])) {

$verify11=trim($_POST["title1"]);
$verify21=trim($_POST["text1"]);
$verify31=trim($_POST["price1"]);
$verify41=trim($_POST["phone1"]);

if($verify11 == "") {
  echo "You did not enter a name. ";

}

elseif($verify21 == "") {
  echo "You did not write about the product. ";

}

elseif($verify31 == "") {
  echo "You didn't enter the seeking price. ";
}

// Check for the numerical value
  elseif(is_numeric(trim($verify31)) == false){
  echo "Please enter numeric value in price field. ";
}

elseif($verify41 == "") {
  echo "You didn't enter your phone. ";
}

// Check for the numerical value
  elseif(is_numeric(trim($verify41)) == false){
  echo "Please enter numeric value in phone field. ";
}



else{

// Get ID data and start incrementing

$GetID1 = mysqli_query($connect,"SELECT * FROM CSE");
$Fetch1 = mysqli_fetch_array($GetID1);
$CurrentID1 = $Fetch1['id'];
$NextID1 = $CurrentID1+1;

// Anti-injection

$title1 = mysqli_real_escape_string($connect,$verify11);
$text1 = mysqli_real_escape_string($connect,$verify21);
$price1 = mysqli_real_escape_string($connect,$verify31);
$phone1 = mysqli_real_escape_string($connect,$verify41);

// Uploads data to the DB.
$assign1 = "INSERT INTO CSE
(id,title,text,price,phone,date) VALUES ('$NextID1','$title1','$text1','$price1','$phone1','$date')";

// Execute the query
if (mysqli_query($connect,$assign1)) {
echo "Thank you!! Your ad. has been posted.";
       exit;
} else {
    die("Opps! Something bad happened, please call the engineers." . mysqli_error($connect));
}

// closes database connection
mysqli_close($connect);


}
}

?>


<form method="post" action="list.php">
<h2>Title:</h2><input type="text" name="title1" id="title1" placeholder="Name of your listing">
<br>
<br>
<h2>Body:</h2>
<textarea name="text1" id="text1" placeholder="Details about your listing. Writing about product condition, purchase date would help the seekers. Elaborate as much as possible."></textarea>
<br>
<br>
<h2>Seeking Price:</h2><input type="text" name="price1" id="price1" placeholder="$$$ (without $ sign)">
<br>
<br>
<h2>Phone:</h2><input type="text" name="phone1" id="phone1" placeholder="Your phone number?">
<br>
<br>
<input name="submit1" type="submit" class="button" value="Post" placeholder="Post">
<br>
<br>
</form>
</div>
</div>

<br>

<div class="dsc_question"><big><b>Business Administration</b></big></div>
<div class="dsc_answer">
<div>

<?php

if(isset($_POST['submit2'])) {

$verify12=trim($_POST["title2"]);
$verify22=trim($_POST["text2"]);
$verify32=trim($_POST["price2"]);
$verify42=trim($_POST["phone2"]);

if($verify12 == "") {
  echo "You did not enter a name. ";

}

elseif($verify22 == "") {
  echo "You did not write about the product. ";

}

elseif($verify32 == "") {
  echo "You didn't enter the seeking price. ";
}

// Check for the numerical value
  elseif(is_numeric(trim($verify32)) == false){
  echo "Please enter numeric value in price field. ";
}

elseif($verify42 == "") {
  echo "You didn't enter your phone. ";
}

// Check for the numerical value
  elseif(is_numeric(trim($verify42)) == false){
  echo "Please enter numeric value in phone field. ";
}



else{

// Get ID data and start incrementing

$GetID2 = mysqli_query($connect,"SELECT * FROM bba");
$Fetch2 = mysqli_fetch_array($GetID2);
$CurrentID2 = $Fetch2['id'];
$NextID2 = $CurrentID2+1;

// Anti-injection

$title2 = mysqli_real_escape_string($connect,$verify12);
$text2 = mysqli_real_escape_string($connect,$verify22);
$price2 = mysqli_real_escape_string($connect,$verify32);
$phone2 = mysqli_real_escape_string($connect,$verify42);

// Uploads data to the DB.
$assign2 = "INSERT INTO bba
(id,title,text,price,phone,date) VALUES ('$NextID2','$title2','$text2','$price2','$phone2','$date')";

// Execute the query
if (mysqli_query($connect,$assign2)) {
echo "Eureka, Eureak! You did it. You have successfully submitted your listing.";
       exit;
} else {
    die("Opps! Something bad happened, please call the engineers." . mysqli_error($connect));
}

// closes database connection
mysqli_close($connect);


}
}

?>


<form method="post" action="list.php">
<h2>Title:</h2><input type="text" name="title2" id="title2" placeholder="Name of your listing">
<br>
<br>
<h2>Body:</h2>
<textarea name="text2" id="text2" placeholder="Details about your listing. Writing about product condition, purchase date would help the seekers. Elaborate as much as possible."></textarea>
<br>
<br>
<h2>Seeking Price:</h2><input type="text" name="price2" id="price2" placeholder="$$$ (without $ sign)">
<br>
<br>
<h2>Phone:</h2><input type="text" name="phone2" id="phone2" placeholder="Your phone number?">
<br>
<br>
<input name="submit2" type="submit" class="button" value="Post" placeholder="Post">
<br>
<br>
</form>
</div>
</div>

<br>

<div class="dsc_question"><big><b>Mathematics</b></big></div>
<div class="dsc_answer">
<div>

<?php

if(isset($_POST['submit3'])) {

$verify13=trim($_POST["title3"]);
$verify23=trim($_POST["text3"]);
$verify33=trim($_POST["price3"]);
$verify43=trim($_POST["phone3"]);

if($verify13 == "") {
  echo "You did not enter a name. ";

}

elseif($verify23 == "") {
  echo "You did not write about the product. ";

}

elseif($verify33 == "") {
  echo "You didn't enter the seeking price. ";
}

// Check for the numerical value
  elseif(is_numeric(trim($verify33)) == false){
  echo "Please enter numeric value in price field. ";
}

elseif($verify43 == "") {
  echo "You didn't enter your phone. ";
}

// Check for the numerical value
  elseif(is_numeric(trim($verify43)) == false){
  echo "Please enter numeric value in phone field. ";
}



else{

// Get ID data and start incrementing

$GetID3 = mysqli_query($connect,"SELECT * FROM mathematics");
$Fetch3 = mysqli_fetch_array($GetID3);
$CurrentID3 = $Fetch3['id'];
$NextID3 = $CurrentID3+1;

// Anti-injection

$title3 = mysqli_real_escape_string($connect,$verify13);
$text3 = mysqli_real_escape_string($connect,$verify23);
$price3 = mysqli_real_escape_string($connect,$verify33);
$phone3 = mysqli_real_escape_string($connect,$verify43);

// Uploads data to the DB.
$assign3 = "INSERT INTO mathematics
(id,title,text,price,phone,date) VALUES ('$NextID3','$title3','$text3','$price3','$phone3','$date')";

// Execute the query
if (mysqli_query($connect,$assign3)) {
echo "Eureka, Eureak! You did it. You have successfully submitted your listing.";
       exit;
} else {
    die("Opps! Something bad happened, please call the engineers." . mysqli_error($connect));
}

// closes database connection
mysqli_close($connect);


}
}

?>


<form method="post" action="list.php">
<h2>Title:</h2><input type="text" name="title3" id="title3" placeholder="Name of your listing">
<br>
<br>
<h2>Body:</h2>
<textarea name="text3" id="text3" placeholder="Details about your listing. Writing about product condition, purchase date would help the seekers. Elaborate as much as possible."></textarea>
<br>
<br>
<h2>Seeking Price:</h2><input type="text" name="price3" id="price3" placeholder="$$$ (without $ sign)">
<br>
<br>
<h2>Phone:</h2><input type="text" name="phone3" id="phone3" placeholder="Your phone number?">
<br>
<br>
<input name="submit3" type="submit" class="button" value="Post" placeholder="Post">
<br>
<br>
</form>
</div>
</div>

<br>

<div class="dsc_question"><big><b>Medical</b></big></div>
<div class="dsc_answer">
<div>

<?php

if(isset($_POST['submit4'])) {

$verify14=trim($_POST["title4"]);
$verify24=trim($_POST["text4"]);
$verify34=trim($_POST["price4"]);
$verify44=trim($_POST["phone4"]);

if($verify14 == "") {
  echo "You did not enter a name. ";

}

elseif($verify24 == "") {
  echo "You did not write about the product. ";

}

elseif($verify34 == "") {
  echo "You didn't enter the seeking price. ";
}

// Check for the numerical value
  elseif(is_numeric(trim($verify34)) == false){
  echo "Please enter numeric value in price field. ";
}

elseif($verify44 == "") {
  echo "You didn't enter your phone. ";
}

// Check for the numerical value
  elseif(is_numeric(trim($verify44)) == false){
  echo "Please enter numeric value in phone field. ";
}



else{

// Get ID data and start incrementing

$GetID4 = mysqli_query($connect,"SELECT * FROM medical");
$Fetch4 = mysqli_fetch_array($GetID4);
$CurrentID4 = $Fetch4['id'];
$NextID4 = $CurrentID4+1;

// Anti-injection

$title4 = mysqli_real_escape_string($connect,$verify14);
$text4 = mysqli_real_escape_string($connect,$verify24);
$price4 = mysqli_real_escape_string($connect,$verify34);
$phone4 = mysqli_real_escape_string($connect,$verify44);

// Uploads data to the DB.
$assign4 = "INSERT INTO medical
(id,title,text,price,phone,date) VALUES ('$NextID4','$title4','$text4','$price4','$phone4','$date')";

// Execute the query
if (mysqli_query($connect,$assign4)) {
echo "Eureka, Eureak! You did it. You have successfully submitted your listing.";
       exit;
} else {
    die("Opps! Something bad happened, please call the engineers." . mysqli_error($connect));
}

// closes database connection
mysqli_close($connect);


}
}

?>


<form method="post" action="list.php">
<h2>Title:</h2><input type="text" name="title4" id="title4" placeholder="Name of your listing">
<br>
<br>
<h2>Body:</h2>
<textarea name="text4" id="text4" placeholder="Details about your listing. Writing about product condition, purchase date would help the seekers. Elaborate as much as possible."></textarea>
<br>
<br>
<h2>Seeking Price:</h2><input type="text" name="price4" id="price4" placeholder="$$$ (without $ sign)">
<br>
<br>
<h2>Phone:</h2><input type="text" name="phone4" id="phone4" placeholder="Your phone number?">
<br>
<br>
<input name="submit4" type="submit" class="button" value="Post" placeholder="Post">
<br>
<br>
</form>
</div>
</div>

<br>

<div class="dsc_question"><big><b>Magazine</b></big></div>
<div class="dsc_answer">
<div>

<?php

if(isset($_POST['submit5'])) {

$verify15=trim($_POST["title5"]);
$verify25=trim($_POST["text5"]);
$verify35=trim($_POST["price5"]);
$verify45=trim($_POST["phone5"]);

if($verify15 == "") {
  echo "You did not enter a name. ";

}

elseif($verify25 == "") {
  echo "You did not write about the product. ";

}

elseif($verify35 == "") {
  echo "You didn't enter the seeking price. ";
}

// Check for the numerical value
  elseif(is_numeric(trim($verify35)) == false){
  echo "Please enter numeric value in price field. ";
}

elseif($verify45 == "") {
  echo "You didn't enter your phone. ";
}

// Check for the numerical value
  elseif(is_numeric(trim($verify45)) == false){
  echo "Please enter numeric value in phone field. ";
}



else{

// Get ID data and start incrementing

$GetID5 = mysqli_query($connect,"SELECT * FROM magazine");
$Fetch5 = mysqli_fetch_array($GetID5);
$CurrentID5 = $Fetch5['id'];
$NextID5 = $CurrentID5+1;

// Anti-injection

$title5 = mysqli_real_escape_string($connect,$verify15);
$text5 = mysqli_real_escape_string($connect,$verify25);
$price5 = mysqli_real_escape_string($connect,$verify35);
$phone5 = mysqli_real_escape_string($connect,$verify45);

// Uploads data to the DB.
$assign5 = "INSERT INTO magazine
(id,title,text,price,phone,date) VALUES ('$NextID5','$title5','$text5','$price5','$phone5','$date')";

// Execute the query
if (mysqli_query($connect,$assign5)) {
echo "Eureka, Eureak! You did it. You have successfully submitted your listing.";
       exit;
} else {
    die("Opps! Something bad happened, please call the engineers." . mysqli_error($connect));
}

// closes database connection
mysqli_close($connect);


}
}

?>


<form method="post" action="list.php">
<h2>Title:</h2><input type="text" name="title5" id="title5" placeholder="Name of your listing">
<br>
<br>
<h2>Body:</h2>
<textarea name="text5" id="text5" placeholder="Details about your listing. Writing about product condition, purchase date would help the seekers. Elaborate as much as possible."></textarea>
<br>
<br>
<h2>Seeking Price:</h2><input type="text" name="price5" id="price5" placeholder="$$$ (without $ sign)">
<br>
<br>
<h2>Phone:</h2><input type="text" name="phone5" id="phone5" placeholder="Your phone number?">
<br>
<br>
<input name="submit5" type="submit" class="button" value="Post" placeholder="Post">
<br>
<br>
</form>
</div>
</div>

<br>

<div class="dsc_question"><big><b>Fiction</b></big></div>
<div class="dsc_answer">
<div>

<?php

if(isset($_POST['submit6'])) {

$verify16=trim($_POST["title6"]);
$verify26=trim($_POST["text6"]);
$verify36=trim($_POST["price6"]);
$verify46=trim($_POST["phone6"]);

if($verify16 == "") {
  echo "You did not enter a name. ";

}

elseif($verify26 == "") {
  echo "You did not write about the product. ";

}

elseif($verify36 == "") {
  echo "You didn't enter the seeking price. ";
}

// Check for the numerical value
  elseif(is_numeric(trim($verify36)) == false){
  echo "Please enter numeric value in price field. ";
}

elseif($verify46 == "") {
  echo "You didn't enter your phone. ";
}

// Check for the numerical value
  elseif(is_numeric(trim($verify46)) == false){
  echo "Please enter numeric value in phone field. ";
}



else{

// Get ID data and start incrementing

$GetID6 = mysqli_query($connect,"SELECT * FROM fiction");
$Fetch6 = mysqli_fetch_array($GetID6);
$CurrentID6 = $Fetch6['id'];
$NextID6 = $CurrentID6+1;

// Anti-injection

$title6 = mysqli_real_escape_string($connect,$verify16);
$text6 = mysqli_real_escape_string($connect,$verify26);
$price6 = mysqli_real_escape_string($connect,$verify36);
$phone6 = mysqli_real_escape_string($connect,$verify46);

// Uploads data to the DB.
$assign6 = "INSERT INTO fiction
(id,title,text,price,phone,date) VALUES ('$NextID6','$title6','$text6','$price6','$phone6','$date')";

// Execute the query
if (mysqli_query($connect,$assign6)) {
echo "Eureka, Eureak! You did it. You have successfully submitted your listing.";
       exit;
} else {
    die("Opps! Something bad happened, please call the engineers." . mysqli_error($connect));
}

// closes database connection
mysqli_close($connect);


}
}

?>


<form method="post" action="list.php">
<h2>Title:</h2><input type="text" name="title6" id="title6" placeholder="Name of your listing">
<br>
<br>
<h2>Body:</h2>
<textarea name="text6" id="text6" placeholder="Details about your listing. Writing about product condition, purchase date would help the seekers. Elaborate as much as possible."></textarea>
<br>
<br>
<h2>Seeking Price:</h2><input type="text" name="price6" id="price6" placeholder="$$$ (without $ sign)">
<br>
<br>
<h2>Phone:</h2><input type="text" name="phone6" id="phone6" placeholder="Your phone number?">
<br>
<br>
<input name="submit6" type="submit" class="button" value="Post" placeholder="Post">
<br>
<br>
</form>
</div>
</div>

<br>

<div class="dsc_question"><big><b>Others</b></big></div>
<div class="dsc_answer">
<div>

<?php

if(isset($_POST['submit7'])) {

$verify17=trim($_POST["title7"]);
$verify27=trim($_POST["text7"]);
$verify37=trim($_POST["price7"]);
$verify47=trim($_POST["phone7"]);

if($verify17 == "") {
  echo "You did not enter a name. ";

}

elseif($verify27 == "") {
  echo "You did not write about the product. ";

}

elseif($verify37 == "") {
  echo "You didn't enter the seeking price. ";
}

// Check for the numerical value
  elseif(is_numeric(trim($verify37)) == false){
  echo "Please enter numeric value in price field. ";
}

elseif($verify47 == "") {
  echo "You didn't enter your phone. ";
}

// Check for the numerical value
  elseif(is_numeric(trim($verify47)) == false){
  echo "Please enter numeric value in phone field. ";
}



else{

// Get ID data and start incrementing

$GetID7 = mysqli_query($connect,"SELECT * FROM others");
$Fetch7 = mysqli_fetch_array($GetID7);
$CurrentID7 = $Fetch7['id'];
$NextID7 = $CurrentID7+1;

// Anti-injection

$title7 = mysqli_real_escape_string($connect,$verify17);
$text7 = mysqli_real_escape_string($connect,$verify27);
$price7 = mysqli_real_escape_string($connect,$verify37);
$phone7 = mysqli_real_escape_string($connect,$verify47);

// Uploads data to the DB.
$assign7 = "INSERT INTO others
(id,title,text,price,phone,date) VALUES ('$NextID7','$title7','$text7','$price7','$phone7','$date')";

// Execute the query
if (mysqli_query($connect,$assign7)) {
echo "Eureka, Eureak! You did it. You have successfully submitted your listing.";
       exit;
} else {
    die("Opps! Something bad happened, please call the engineers." . mysqli_error($connect));
}

// closes database connection
mysqli_close($connect);


}
}

?>


<form method="post" action="list.php">
<h2>Title:</h2><input type="text" name="title7" id="title7" placeholder="Name of your listing">
<br>
<br>
<h2>Body:</h2>
<textarea name="text7" id="text7" placeholder="Details about your listing. Writing about product condition, purchase date would help the seekers. Elaborate as much as possible."></textarea>
<br>
<br>
<h2>Seeking Price:</h2><input type="text" name="price7" id="price7" placeholder="$$$ (without $ sign)">
<br>
<br>
<h2>Phone:</h2><input type="text" name="phone7" id="phone7" placeholder="Your phone number?">
<br>
<br>
<input name="submit7" type="submit" class="button" value="Post" placeholder="Post">
<br>
<br>
</form>
</div>
</div>
<br>
</form>
</div>
</div>


</div>
</div>
</body>