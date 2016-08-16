<?php
// Load settings and database connection details to use.
include("config.php");
?>

<!DOCTYPE html>
<html>
<head>
<title><?php echo $website_name; ?> | Others</title>
<meta name="description" content="<?php echo $description; ?>">
<meta name="keywords" content="<?php echo $keywords; ?>">
<meta name="google-site-verification" content="<?php echo $google; ?>" />
<meta name="msvalidate.01" content="<?php echo $bing; ?>" />

<link rel="stylesheet" type="text/css" href="stylesheet.css" />
</head>
<body>
<div id="page-wrap">
<div id="break">

<h1>Recent Listings <em>in Others</em></h1>

<?php

// Target the table.
$listings = mysqli_query($connect,"SELECT * FROM others ORDER BY id DESC");

// Suck the rows and display them.
while($listing = mysqli_fetch_array($listings)) {
   echo "<br>";
   echo "<br>";
   echo "<h2>" . strip_tags($listing['title']) . "</h2>";
   echo "<p>" . strip_tags($listing['text']) . "</p>";
   echo "<br>";
   echo "<b>#ID: " . $listing['id'] . "</b>";
   echo "<br>";
   echo "<b>Date: " . $listing['date'] . "</b>";
   echo "<br>";
   echo "<br>";
   echo "<big><big>Seeking Price: $" . strip_tags($listing['price']) . "</big></big>";
   echo "<br>";
   echo "<big><big>Phone: " . strip_tags($listing['phone']) . "</big></big>";
   }

mysqli_close($connect);

?>

<br>
<br>
<br>
<br>
<br>
<div align="center">
<a href="list.php" class="button1"/>List your item</a>
</div>
<br>
<br>

</div>
</div>
</body>
</html>
