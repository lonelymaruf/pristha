<?php
// Load settings and database connection details to use.
include("config.php");
?>

<!DOCTYPE html>
<html>
<head>
<title><?php echo $website_name; ?> |  Used Business Administration boks</title>
<meta name="description" content="<?php echo $description; ?>">
<meta name="keywords" content="<?php echo $keywords; ?>">
<meta name="google-site-verification" content="<?php echo $google; ?>" />
<meta name="msvalidate.01" content="<?php echo $bing; ?>" />

<link rel="stylesheet" type="text/css" href="stylesheet.css" />
<!-- CSS
================================================== -->
<link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/bootstrap-responsive.css">
<link rel="stylesheet" href="css/custom-styles.css">
</head>

<body class="home">
    <!-- Color Bars (above header)-->
	<div class="color-bar-1"></div>
    <div class="color-bar-2 color-bg"></div>
    
    <div class="container">
    
      <div class="row header"><!-- Begin Header -->
      
        <!-- Logo
        ================================================== -->
        <div class="span5 logo">
        	<a href="index.htm"><img src="img/piccolo-logo.png" alt="" /></a>
            <h5>Sell used books!</h5>
        </div>
        
        <!-- Main Navigation
        ================================================== -->
        <div class="span7 navigation">
            <div class="navbar hidden-phone">
            
            <ul class="nav">
            <li class="dropdown active">
                <a class="dropdown-toggle" href="index.php">Home <b class="caret"></b></a>
            </li>
           <li><a href="cse.php">Computer Science</a></li>
            <li> <a href="bba.php">BBA</a>
			 <li> <a href="magazine.php">Magazine</a>
			 <li> <a href="mathematics.php">Mathmetics</a>
			 
            </ul>
            </div>
                </form>

        </div>
        
      </div><!-- End Header -->
        <!-- Page Left Sidebar
        ================================================== --> 
        <div class="span3 sidebar page-left-sidebar"><!-- Begin sidebar column -->

            <!--Navigation-->
            <h5 class="title-bg">Navigation</h5>
            <ul class="post-category-list">
                <li><a href="#"><i class="icon-plus-sign"></i>About Us</a></li>
                <li><a href="#"><i class="icon-plus-sign"></i>Services</a></li>
                <li><a href="#"><i class="icon-plus-sign"></i>Mission</a></li>
                <li><a href="#"><i class="icon-plus-sign"></i>Clients</a></li>
            </ul>

            <!--Latest News-->
            <h5 class="title-bg">Latest News</h5>
            <ul class="popular-posts">
                <li>
                    <a href="#"><img src="img/gallery/gallery-img-2-thumb.jpg" alt="Popular Post"></a>
                    <h6><a href="#">Lorem ipsum dolor sit amet consectetur adipiscing elit</a></h6>
                    <em>Posted on 09/01/15</em>
                </li>
                <li>
                    <a href="#"><img src="img/gallery/gallery-img-2-thumb.jpg" alt="Popular Post"></a>
                    <h6><a href="#">Nulla iaculis mattis lorem, quis gravida nunc iaculis</a></h6>
                    <em>Posted on 09/01/15</em>
                <li>
                    <a href="#"><img src="img/gallery/gallery-img-2-thumb.jpg" alt="Popular Post"></a>
                    <h6><a href="#">Vivamus tincidunt sem eu magna varius elementum</a></h6>
                    <em>Posted on 09/01/15</em>
                </li>
            </ul>
        </div><!-- End sidebar column -->

        <!-- Page Content
        ================================================== --> 
        <div class="span7"><!--Begin page content column-->

            <h2 class="title-bg">Recent books in Business Administration </h2>
<?php

// Target the table.
$listings = mysqli_query($connect,"SELECT * FROM bba ORDER BY id DESC");

// Suck the rows and display them.
while($listing = mysqli_fetch_array($listings)) {
   echo "<br>";
   echo "<br>";
   echo "<h2>" . strip_tags($listing['title']) . "</h2>";
   echo "<p>" . strip_tags($listing['text']) . "</p>";
   echo "<br>";
   echo "<b>BOOKID: " . $listing['id'] . "</b>";
   echo "<br>";
   echo "<b><em>Posted on: " . $listing['date'] . "</em></b>";
   echo "<br>";
   echo "<br>";
   echo "<big><big>Seeking Price: ৳" . strip_tags($listing['price']) . "</big></big>";
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
<a href="list.php" class="button1"/><?php echo $selltext; ?></a>
</div>
<br>
<br>

</div>
</div>
</body>
</html>
