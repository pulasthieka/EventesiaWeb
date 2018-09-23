<!DOCTYPE html>

<html lang="en-US">

   <head>

      <meta charset="UTF-8">

      <meta name="viewport" content="width=device-width, initial-scale=1.0" />

      <title>Eventesia | About </title>

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
   <script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '1813401682255717',
      xfbml      : true,
      version    : 'v2.8'
    });
    FB.AppEvents.logPageView();
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8&appId=1813401682255717";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
      <!-- TOP NAV WITH LOGO -->          

      <header class="margin-bottom">

         <?php include "navbar.php";?>

      </header>

      <!-- MAIN SECTION -->                  

      <section id="article-section" class="line">

         <div class="margin">

            <!-- ARTICLES -->             

            <div class="s-12 m-7 l-9">

               <!-- ARTICLE 1 -->               

               <article class="margin-bottom">

                  <!-- text -->                 

                  <div class="post-text">

                     <h1>About Us</h1>

                     <img src="img/EventesiaLogo.png" style="margin-left: auto;	margin-right: auto;	display: block; max-height:250px; padding:20px " />
                     <p>

                        Founded by 4 near strangers who were banded together by fate to win a random competition no one had ever heard of but then realised that their idea had true commercial potential. On pursuing this venture they overcame numerous trials and the bonds between them strengthened with every obstacle conquered and lost. 

                        

                     </p>

                     <br>

                     <blockquote>

                       Eventesia was created with the intention of ensuring that events, parties, concerts, festivals; any large social gathering of potential life long friends and matchless memories would be set in the most fun environment possible with someone always available to capture that memory and allow you to treasure it for years to come.

                     </blockquote>

                     <br>
                    Like Us <div
  class="fb-like"
  data-share="true"
  data-width="450"
  data-show-faces="true">
</div>
                  </div>

               </article>               

            </div>

            <!-- SIDEBAR -->             

            <div class="s-12 m-5 l-3">

               <aside>

                  <!-- LATEST POSTS -->

                  <div class="aside-block margin-bottom">

                     <h3>User Reviews</h3>

                   <div class="fb-comments" data-href="http://eventesia.lk/about.php" data-width="100%" data-numposts="5"></div>

                  </div>

               </aside>

            </div>

         </div>

      </section>

     <!-- FOOTER -->       

      <?php include "Common elements/footer.php"; ?>

      <script type="text/javascript" src="../js/cascadia.js"></script>

   </body>

</html>