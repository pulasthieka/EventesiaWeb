

<?php

// Include config file which has the database details

require_once 'config.php';



// Define variables and initialize with empty values

$username = $password = "";

$username_err = $password_err = "";



// Processing form data when form is submitted

if($_SERVER["REQUEST_METHOD"] == "POST"){
   
    // Check if username is empty

    if(empty(trim($_POST["username"]))){

        $username_err = 'Please enter username.';

    } else{

        $username = trim($_POST["username"]);

    }


    // Check if password is empty

    if(empty(trim($_POST['password']))){

        $password_err = 'Please enter your password.';

    } else{

        $password = trim($_POST['password']);

    }



    // Validate credentials

    if(empty($username_err) && empty($password_err)){

        // Prepare a select statement

        $sql = "SELECT username, password FROM log_in WHERE username = ?";



        if($stmt = $conn->prepare($sql)){

            // Bind variables to the prepared statement as parameters

            $stmt->bind_param("s", $param_username);



            // Set parameters

            $param_username = $username;



            // Attempt to execute the prepared statement

            if($stmt->execute()){

                // Store result

                $stmt->store_result();



                // Check if username exists, if yes then verify password

                if($stmt->num_rows == 1){

                    // Bind result variables

                    $stmt->bind_result($username, $hashed_password);

                    if($stmt->fetch()){
                    
                        if(password_verify($password, $hashed_password)){

                            /* Password is correct, so start a new session and

                            save the username to the session */

                            session_start();

                            $_SESSION['ID'] = $username;

                            $role=mysqli_fetch_array($conn->query("select role from log_in WHERE username ='{$_SESSION['ID']}'"));
                            $_SESSION['role']= $role;
                            if($_SESSION['role']='user'){

                                header("location: Home.php");

                            }

                            elseif($_SESSION['role']='Admin'){
                                header("location: artists.php");
                            }


                        } else{

                            // Display an error message if password is not valid

                            $password_err = 'The password you entered was not valid.';

                        }

                    }

                } else{

                    // Display an error message if username doesn't exist

                    $username_err = 'No account found with that username.';

                }

            } else{

                echo "Oops! Something went wrong. Please try again later.";

            }

        }



        // Close statement

        $stmt->close();

    }



    // Close connection

    $conn->close();

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
      <header class="margin-bottom">
        <?php include "navbar.php";?>
      </header>
      <!-- MAIN SECTION -->                
     <section id="article-section" class="line archive">
         <div class="margin">
			<div class="s-12 m-7 l-9">
	<article class="margin-bottom"><!-- text -->
	
	<div class="post-text">
		
    <h2>Login</h2>

    <p>Please fill in your credentials to login.</p>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="customform">

        <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">

            <label>Username</label>

            <input type="text" name="username"class="form-control" value="<?php echo $username; ?>">

            <span class="help-block"><?php echo $username_err; ?></span>

        </div>

        <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">

            <label>Password</label>

            <input type="password" name="password" class="form-control">

            <span class="help-block"><?php echo $password_err; ?></span>

        </div>

        <div class="form-group">

            <input type="submit" class="btn btn-primary" value="Login">

        </div>
     

        <!--                <p>Don't have an account? <a href="register.php">Sign up now</a>.</p>-->

    </form>

		</div>
	</article>
			 </div>
 </div></section>
</body>
</html>