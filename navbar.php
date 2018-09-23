<?php 
session_start();
/* include the config file which creates the connection */
include_once("config.php");

/* initialise variables */
$username = $password = "";
$username_error = $password_error ="";

/* Rn script only if POST (for security)*/
if($_SERVER["REQUEST_METHOD"] == "POST"){
	if(isset($_POST["Login"])){
		
	/*Check if username or password is empty and assign variables */
	if(empty($_POST["username"])){
		$username_error = "username is empty";
	}
	else{
		$username= htmlspecialchars(trim($_POST["username"]));
	}
	
	if(empty($_POST["password"])){
		$password_error="passsword is empty";
	}
	else{
		$password= htmlspecialchars(trim($_POST["password"]));
	}
	
	/* check username from database and compare password only if there is a username*/
	if(empty($password_error) && empty($username_error)){
		$search_username = "SELECT username, password FROM user_details WHERE username = ?";
		if($stmt_u = $connection->prepare($search_username)){

                // Bind variables to the prepared statement as parameters
                $stmt_u->bind_param("s", $username);
			if($stmt_u->execute()){
				$stmt_u->store_result();
				//validate username
				if($stmt_u->num_rows ==1){
					$stmt_u->bind_result($username, $hashed_password);
					/*see if there is such a record*/
					if($stmt_u->fetch()){
						/* verify password*/
						if(password_verify($password, $hashed_password)){
							$_SESSION["ID"] = $username;
							header("location:".htmlentities($_SERVER['PHP_SELF']));
						}
						else{
							$password_error="Password you entered is incorrect";
						}
					}
					else{
						$username_error ="No account found with that username";
					}
				}
				else{
					$username_error ="No account found with that username";
				}
			}
		}
		$stmt_u->close();
	}
	
	
}
}
?>

<div class="line">
<nav>
<div class="top-nav">
<p class="nav-text"></p>
<a class="logo" href="">Eventesia<span>.lk</span> </a>
<ul class="top-ul right">
	<li><a href="Home.php">Home</a></li>
	<li><a href="artists.php?type=Bands">Bands </a></li>
    <li><a href="artists.php?type=Singers">Singers </a></li>
    <li><a href="artists.php?type=Photographers">Photographers </a></li>
	<li><a href="artists.php?type=Others">Other</a></li>
	<?php 
				if(isset($_SESSION["ID"])){
					
					echo('<li><a href="myaccount.php">My Profile</a></li><li><a href="logout.php">Logout</a></li>');
										}
				else{
					echo(' <li><a onClick="toggle_visibility(\'form\')">Login</a></li>');
					
					
				}
				?>
    
<div class="social right">
<a target="_blank" href="https://www.facebook.com/Eventesia.lk/">
                        <i class="icon-facebook_circle icon2x"></i>
                        </a> </div>

</ul>
</div>
	</nav>
	
	<!-- code to show and hide the login form -->
	<script type="text/javascript">
    function toggle_visibility(id) {
       var e = document.getElementById(id);
       if(e.style.display == 'block')
          e.style.display = 'none';
       else
          e.style.display = 'block';
    }
</script>
	<!-- Login Form -->
	
	<form  method="post" id="form" class="loginform" <?php if(isset($_POST["Login"])){echo 'style="display: block"';} ?>>
	<div class="form-element">
		
	<input type="text" id="username" name="username" placeholder="Email" value="<?php echo($username); ?>">
		 <span class="help-block"><?php echo $username_error; ?></span>
		</div>
		<div class="form-element">
			<input type="password" id="password" name="password" placeholder="Password" value = "<?php echo($password); ?>">
			 <span class="help-block"><?php echo $password_error; ?></span>
		</div>
		<input type="submit" name="Login" value="Login" class="btn snip1582">
		<p> Don't Have an Account? <br>
		<a href="join.php">Sign Up</a></p>
	</form>
		
	
</div>