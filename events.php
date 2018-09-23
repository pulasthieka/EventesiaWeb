<!DOCTYPE html>

<html lang="en-US">

   <head>

      <meta charset="UTF-8">

      <meta name="viewport" content="width=device-width, initial-scale=1.0" />

      <title>Eventesia | Events </title>

      <meta name="description" content="Eventesia is the website for all your event needs."/>

      <meta name="keywords" content="event, bands, dj, photographer, "/>

      <link rel="stylesheet" href="css/components.css">

      <link rel="stylesheet" href="css/icons.css">

      <link rel="stylesheet" href="css/cascadia.css">

      <!-- CUSTOM STYLE --> 

      <link rel="stylesheet" href="css/siteLayout.css">      

      <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,700&subset=latin,latin-ext' rel='stylesheet' type='text/css'>

      <script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>

      <script type="text/javascript" src="js/jquery-ui.min.js"></script>       <script type="text/javascript" src="js/cascadia.js"></script>             

   </head>

   <body class="size-1140">

      <!-- TOP NAV WITH LOGO -->          
<?php include_once("Common elements/analyticstracking.php") ?>
      <header class="margin-bottom">
<?php include "navbar.php";?>

      </header>

      <!-- MAIN SECTION -->                  

      <section id="article-section" class="line">

         <div class="margin" >

            <!-- ARTICLES -->             

            <div class="s-12 m-7 l-9">

            <h2 class="join-block margin-bottom" style="text-align:center; background-color:#339966; color:#FFFFFF"> Event Review</h2>

              <!-- WE+ post  -->               

               <article class="post-2 line post-text" style="color:#FFFFFF ">
               <style>
			   #heading{color:#ffffff;
			   }
			   .latest-posts, .a{
				   color:#637693 !important;}
               
               </style>
             
<?php include "Common elements/eventlist.php";?> 
                

                  <!-- text -->                 

                  </article></div>

            <!-- SIDEBAR -->

             <div class="s-12 m-5 l-3">

              <aside>

               		<a href="join.php"><div class="join-block margin-bottom">

                     <h3 align="center" style="color:#FFF" >JOIN </h3><h6 align="center" style="color:#FFF">Eventesia</h6>

                  </div></a>

                  </aside>

             </div>             

            <div class="s-12 m-5 l-3">

               <aside>

               		<div class="aside-block margin-bottom" style="padding:0; background-color:transparent">

                     <h3 align="center" style="color:#FFF" >Featured Artists</h3>

                  </div>

                  <!-- Event List -->

                  <div class="aside-block margin-bottom">

                     <a class="latest-posts" href="photographers/clickz.php">

                        <h5>Clickz Labs</h5>

                        <p> Memories are invaluable. Call us to to capture yours</p>

                     </a>

                     <a class="latest-posts" href="bands/pointfive.php">

                        <h5>PointFive</h5>

                        <p>PointFive is about five freelancers who are born for music </p>

                     </a>

                    

                     <a class="latest-posts" href="bands/PiyathRajapakse.php">

                        <h5>Piyath Rajapakse</h5>

                        <p>Sri Lankan solo singer, songwriter,musician and an instrumentalist.</p>

                     </a>
                     

                    

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