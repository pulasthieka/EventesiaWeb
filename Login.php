<?php
session_start();
//connect to database and check connection
$connection =  mysqli_connect("localhost","eventesi_viewer","ex2A7eywKulb","eventesi_web");
if (!$connection) {
	echo("Oops something went wrong");
	die("Connection failed: " . mysqli_connect_error());
}
?>
<!DOCTYPE html>
<html lang="en-US">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <title>Eventesia | Login </title>
      <meta name="description" content="Eventesia is the website for all your event needs. DJs are the best"/>
      <meta name="keywords" content="event, bands, dj, photographer, "/>
      <link rel="stylesheet" href="css/components.css">
      <link rel="stylesheet" href="css/icons.css">
      <link rel="stylesheet" href="css/cascadia.css">
      <!-- CUSTOM STYLE --> 
      <link rel="stylesheet" href="css/siteLayout.css">      
      <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,700&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
      <script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
      <script type="text/javascript" src="js/jquery-ui.min.js"></script>       <script type="text/javascript" src="js/cascadia.js"></script>
      <?php include_once("Common elements/favicon.php") ?>
   </head>
<body class="size-1140">
<?php include_once("Common elements/analyticstracking.php") ?>
      <!-- TOP NAV WITH LOGO -->          
      <header class="margin-bottom">
        <?php include "navbar.php";?>
      </header>
      <!-- MAIN SECTION -->                  
     <section id="article-section" class="line">
         <div class="margin">
<?php
if(!empty($_SESSION['LoggedIn']) && !empty($_SESSION['name']))
{
if(!$connection){
$connection =  mysqli_connect("localhost","eventesi_viewer","ex2A7eywKulb","eventesi_web");
if (!$connection) {
	echo("Oops something went wrong");
	die("Connection failed: " . mysqli_connect_error());
}
}
    echo("  <h1>Member Area</h1>
     <p>Thanks for logging in ".$_SESSION['name']." and your email address is ".$_SESSION['description']."</p>");
	 $artist =  preg_replace("/[^a-zA-Z0-9\s]/", "", $_SESSION['name']);
	 echo($artist);
 $info = mysqli_query($connection, "SELECT * FROM `bands` WHERE `name` LIKE '".$artist."' ");
 $record = mysqli_fetch_array($info);
 if(empty($info)){echo "1";}
 
 if(!empty($record)){
$name = $record["name"];
$number = $record["number"];
$price = $record["price"];
$propic = $record["profilepic"];
$description=$record["description"];
$video=$record["videos"];
$color=$record["color"];
$type=$record["category"];
$cal=$record["calendar"];
echo('
 <form method="post" action="Login.php" >
    <fieldset>
	<input type="hidden" id="number" value="'.$number.'">
        <label for=" name">Username:</label><input type="text" name="name" id="name" value="'.$name.'" /><br />
        <label for="password">Password:</label><input type="password" name="password" id="password" value="'.$type.'"/><br />
    </fieldset>
	
	<fieldset>
	<label for="name">Description:</label><input type="text" name="description" id="description" value="'.$description.'" /><br />
	<label for=" name">Color:</label><input type="text" name="color" id="color" value="'.$color.'" /><br />
	<label >Videos (seperated by commas- ,):</label><input type="text" name="calendar" id="video" value="'.$video.'" /><br />
	<label >Calendar:</label><input type="text" name="calendar" id="calendar" value="'.$cal.'" /><br />
	<input type="submit" name="save" id="save" value="Save" />
	</fieldset>
    </form>');}  
else{ echo "Error Please contact Eventesia";}   
}
elseif(!empty($_POST['username']) && !empty($_POST['password']))
{
    $username = mysqli_real_escape_string($connection, $_POST['username']);
    $password = md5(mysqli_real_escape_string($connection, $_POST['password']));
     
    $checklogin = mysqli_query($connection, "SELECT * FROM `bands` WHERE `name` = '".$username."' AND  `category` = '".$password."'");
 
    if(empty($checklogin))
    {
     echo "<h1>Error</h1>";
        echo "<p>Sorry, your account could not be found. Please <a href=\"Login.php\">click here to try again</a>.</p>";  
    }
    else
    {
		 $row = mysqli_fetch_array($checklogin);
        $email = $row['number'];
         
        $_SESSION['name'] = $username;
        $_SESSION['description'] = $email;
        $_SESSION['LoggedIn'] = 1;
         
        echo "<h1>Success</h1>";
        echo "<p>We are now redirecting you to the member area.</p>";
        echo "<meta http-equiv='refresh' content='2' />";
		echo" ";
        
    }
}
else
{
    ?>
     
   <h1>Member Login</h1>
     
   <p>Thanks for visiting! Please either login below, or <a href="../join.php">click here to register</a>.</p>
     
    <form method="post" action="Login.php" name="loginform" id="loginform">
    <fieldset>
        <label for="username">Username:</label><input type="text" name="username" id="username" /><br />
        <label for="password">Password:</label><input type="password" name="password" id="password" /><br />
        <input type="submit" name="login" id="login" value="Login" />
    </fieldset>
    </form>
     
   <?php
}
?>
 </div></section>
</body>
</html>