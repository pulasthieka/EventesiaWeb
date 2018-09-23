<!DOCTYPE html>
<html lang="en-US">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <title>Eventesia | <?php $string=$_GET['name'];
	  $res = preg_replace("/[^a-zA-Z0-9\s]/", "", $string);echo($res) ?> </title>
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
            <!-- Artist Section Middle box-->             
                                 

               <!-- the following code uses a preset template and uses the database to create teh seperate articles -->            
<?php
//connect to database and check connection
$connection =  mysqli_connect("localhost","eventesi_viewer","ex2A7eywKulb","eventesi_web");
if (!$connection) {
	echo("Oops something went wrong");
	die("Connection failed: " . mysqli_connect_error());
}
//use the name from global _GET variable and strip special characters
$string=$_GET['name'];
$artist =  preg_replace("/[^a-zA-Z0-9\s]/", "", $string);

// find relevant entry by searching for name
$rowconnection = mysqli_query($connection, "SELECT * FROM `bands` WHERE `name` LIKE '$artist'");
$record = mysqli_fetch_array($rowconnection);

//if such a entry exists then make page else throw 404
if(!empty($record)){
$name = $record["name"];
$price = $record["price"];
$propic = $record["profilepic"];
$description=$record["description"];
$video=$record["videos"];
$color=$record["color"];
$type=$record["category"];
$cal=$record["calendar"];
//html template
 echo('  <div class="s-12 m-7 l-9">
         <article class="margin-bottom">
     <div class="line" style="background: none repeat scroll 0 0 '.$color.';"> 
   <div class="s-12 l-11 post-image">
      	<img src="img/'.$propic.'" alt="'.$name.'">
   </div>           
   <div class="s-12 l-1 post-date">
       <!--p class="date"><i class="icon-facebook_circle icon2x"></i></p-->
   </div>
    </div>');	
 // description
 echo(' <div class="post-text">
        <h1>'.$name.'<span style="align:right"><a href="#Availability">
           <button class="bookbutton" style="float:right">Check Availability</button></a></span> </h1>
                     <p>'.$description.' </p> <br> <br>

                     <p> 

                                     

                    </p>');

if(!empty($video)){
	$videos = explode(",", $video);
	for($vids=0;$vids<= sizeof($videos)-1;$vids++){
		echo('<iframe width="100%"  height="380" src="'.$videos[$vids].'" frameborder="0" allowfullscreen></iframe>');}
	}
echo(' <h2>Fees and Charges</h2>
 <p class="author"> '.$price);
 echo(' </p>');
   if(!empty($cal)){
	   echo ('<h2 id="Availability"> Availability</h2>');
echo($cal);}

}
//throw 404
else{echo('<script type="text/javascript">location.href = "notfound.php";</script>');
die();}
mysqli_close($connection);

      ?>         
<!--End of template-->
 
 <!--order form-->
 <h2> Book <?php echo($name); ?> </h2>
 <p style="color:#333"> Please note that by confirming the order you agree to pay the amount mentioned if the Entertainment provider accepts</p>
<article> 
<script type="text/javascript" src="https://form.jotform.me/jsform/70524117607451"></script> </article>

</div>
</article>
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

                     <h3 align="center" style="color:#FFF" ><?php echo($type);?></h3>

                  </div>

                  <!-- Event List -->

                  <div class="aside-block margin-bottom">

                        
<?php 
$link = mysqli_connect("localhost","eventesi_viewer","ex2A7eywKulb","eventesi_web");
if (!$link){
	echo("Something went wrong");
	die("Error is ". mysqli_connect_error());}
$query=mysqli_query($link,"SELECT `name` FROM `bands`  WHERE `category` LIKE '".$type."'  ORDER BY `name` ASC ");
$list = mysqli_fetch_all($query);
	mysqli_close($link);
	echo('<ul>');
	for($line=0; $line<count($list); $line++){
		echo("<li><a href='http://www.eventesia.lk/audio.php?name=".$list[$line][0]."'class= 'artist_list' >");
		echo($list[$line][0]);
		echo("</a></li>");}
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