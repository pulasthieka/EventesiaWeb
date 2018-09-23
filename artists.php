<!DOCTYPE html>
<html lang="en-US">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <title>Eventesia | <?php $title=preg_replace("/[^a-zA-Z0-9\s]/", "", $_GET["type"]); echo($title);?> </title>
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

      <section id="article-section" class="line" style="line-height:normal">
         <div class="margin">
            <!-- ARTICLES -->             
            <div class="s-12 m-7 l-9" id="home-section">
               <?php // the following code uses a preset template and uses the database to create the seperate articles ?>            
<?php
//connect to database and check connection
$connection =  mysqli_connect("localhost","eventesi_viewer","ex2A7eywKulb","eventesi_web");
if (!$connection) {
	echo("Oops something went wrong");
	die("Connection failed: " . mysqli_connect_error());
}

$last_row = mysqli_query($connection, "SELECT COUNT(number) FROM bands");
$last = mysqli_fetch_array($last_row);
// filter $_GET for security
$category = preg_replace("/[^a-zA-Z0-9\s]/", "", $_GET["type"]);
if($category!= "Singers" && $category!= "Photographers" && $category!= "Bands"&& $category!= "Others" && $category!= "DJs" ){
echo('<script type="text/javascript">location.href = "notfound.php";</script>');
die();}
//loop for all records
for ($rows=1; $rows <= $last[0]; $rows++){
$rowconnection = mysqli_query($connection, "SELECT * FROM `bands` WHERE `number` = $rows");
$record = mysqli_fetch_array($rowconnection);
$name = $record["name"];
$price = $record["minprice"];
$propic = $record["smallpic"];
$description=$record["description"];
$color=$record["color"];
$type=$record["category"];

if($type==$category){
if ($rows % 2 == 0){
	//the html template
	echo('<article id="'.$name.'" class="post-2 right-align line" style="background-color:'.$color.'">');} 
	else{
	echo('<article id="'.$name.'" class="post-2 line" style="background-color:'.$color.'">');}
echo('<div class="s-12 l-6 post-image">                   
       <a href="../audio.php?name='.$name.'">
       <img class="full-img" src="img/'.$propic.'" alt="'.$name.'">
		</a>                
		</div>
   <div class="s-12 l-5 post-text">
                <a href="audio.php?name='.$name.'"><h2>');
				 echo($name); echo('</h2> </a>
 <p>');
 $string = strip_tags($description);
    if (strlen($string) > 100) {
    // truncate string
    $stringCut = substr($string, 0, 100);
    // make sure it ends in a word so assassinate doesn't become ass...
    $string = substr($stringCut, 0, strrpos($stringCut, ' '));
    }
	
	echo($string.' <a href="../audio.php?name='.$name.'" colour="#ffffff">... <small>Read More</small></a></p>
  </div>

   <div class="s-12 l-1 post-date">
 <p class="date"><img src="img/Icons/');
 if($type=="Bands"){
	 echo('band.png');}
	 elseif($type=="dj"){
		echo('dj.png'); }
	 elseif($type=="Photographers"){
		echo('photo.png'); }
	 elseif($type=="Singers"){
		echo('vocal.png'); }
	 else{
		echo('band.png'); }	
 echo('"></p>
   <p class="month"></p>
  </div>  </article>');
			  }}
mysqli_close($connection);

//end of template      ?>         

<article id="This spot is yours!" class="post-2 line" style="background-color:Black"><div class="s-12 l-6 post-image">                   
       <a href="javascript:void(0)">
       <img class="full-img" src="img/band2.png" alt="This spot is yours!">
		</a>                
		</div>
   <div class="s-12 l-5 post-text">
                <a href=""><h2>This spot is yours!</h2> </a>
 <p>We have reserved this  spot for amazing <?php echo($category);?>. Think its you? Just click on the big yellow Join Button and we'll set you up.</p>
  </div>

   <div class="s-12 l-1 post-date">
 <p class="date" style="float:left"><img src="img/Icons/band.png"></p>
 <p class="date" style="float:left"><img src="img/Icons/vocal.png"></p>
 <p class="date" style="float:left"><img src="img/Icons/dj.png"></p>
 <p class="date" style="float:left"><img src="img/Icons/photo.png"></p>
   <p class="month"></p>
  </div>  </article>
                       </div>

           <!-- SIDEBAR -->

             <div class="s-12 m-5 l-3">

              <aside>

               		<a href="join.php"><div class="margin-bottom">

<button class="snip1582">Sign Up </button>
                  </div></a>


                  </aside>

             </div>             

            <div class="s-12 m-5 l-3">

               <aside>

               		<div class="aside-block margin-bottom" style="padding:0; background-color:transparent">

                     <h3 align="center" style="color:#FFF" >  </h3>

                  </div>

                  <!-- Event List -->

                  <div class="aside-block margin-bottom">

                        <h5 align="center">List of Artists in Alphabetical order</h5>
<?php 
$link = mysqli_connect("localhost","eventesi_viewer","ex2A7eywKulb","eventesi_web");
if (!$link){
	echo('Something went wrong');
	die("Error is ". mysqli_connect_error());}
$query=mysqli_query($link,"SELECT `name` FROM `bands` ORDER BY `name` ASC ");
$list = mysqli_fetch_all($query);
	mysqli_close($link);
	echo('<ul>');
	for($line=0; $line<count($list); $line++){
		echo('<li><a href="../audio.php?name='.$list[$line][0].'" class= "artist_list" >');
		echo($list[$line][0]);
		echo('</a></li>');}
echo('</ul>');		
?>
<h2 align="center" id="heading"> Events </h2><br>
<?php                     
   $event_connection = mysqli_connect("localhost","eventesi_viewer","ex2A7eywKulb","eventesi_web");
   if (!$event_connection) {
	echo("Oops something went wrong");
	die("Connection failed: " . mysqli_connect_error());
}  
$last_row = mysqli_query($event_connection, "SELECT COUNT(EventName) FROM events");
$last = mysqli_fetch_array($last_row);
for ($rows=1; $rows <=$last[0] ; $rows++){
$rowconnection = mysqli_query($event_connection, "SELECT * FROM `events` WHERE `No` = $rows" );
$record = mysqli_fetch_array($rowconnection);
$event_name = $record["EventName"];
$date=$record["Date"]; 
$link=$record["LinktoEvent"];   
$location=$record["Location"]; 
$time=$record["Time"];
$description=$record["Description"];
 echo('                    
<span class="event-date"> '.$date.'</span>
<a class="latest-posts" href="'.$link.'">

                        <h5 id="heading">'.$event_name.'</h5>

                        <p><strong>@
'.$location.'<br />'.$time.'</strong><br />'.$description.' </p></a>');}
                    
?>
                  </div>

                  

              </aside>

            </div>

         </div>

      </section>

     <!-- FOOTER -->       

       <?php include "Common elements/footer.php";?> 

      <script type="text/javascript" src="../js/cascadia.js"></script>

   </body>

</html>