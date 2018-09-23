 
<!DOCTYPE html>
<html lang="en-US">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"><meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title> My Account | Eventesia</title>
	<?php include_once("header.php") ?>
</head>
<body class="size-1140"><!-- TOP NAV WITH LOGO -->
<header class="margin-bottom">
<?php include "navbar.php";?>
	<?php 
/*include config file that creates the connection*/
include_once("config.php");

/* initialise variables for login */
$username  = $password = "";
$username_error = $password_error ="";

/* define variables need two for each column, one for showing the data, other for the erroes*/
$name = $description =$calendar =$maxfee =$minfee =$facebook =$media = $email = $phone=$confirm_pass= $category="";
$name_err = $description_err =$calendar_err =$maxfee_err =$minfee_err = $facebook_err= $media_err = $email_err = $phone_err =$confirm_pass_err= $category_err ="";
$other_user="";
//file handling variables
	$profilepic =$coverpic = "";
	$profilepic_err=$coverpic_err="";
/*processing the from begins if its post method*/
if(empty($_SESSION["ID"])){
	header("location:Home.php");
}
else{
	$username = $_SESSION["ID"];

$find_email = "SELECT email FROM user_details WHERE username = ?";
	if($stmt1 = $connection->prepare($find_email)){
			// Bind variables to the prepared statement as parameters
                $stmt1->bind_param("s", $username);
			if($stmt1->execute()){
				$stmt1->store_result();
				//validate username
				if($stmt1->num_rows ==1){
					$stmt1->bind_result($email);	
					$stmt1->fetch();
					$find_all = "SELECT name,category,phone,profilepic, coverpic,maxfee,minfee,facebook,description,calendar,media FROM private_details WHERE email = ?";
	if($stmt = $connection->prepare($find_all)){
			// Bind variables to the prepared statement as parameters
                $stmt->bind_param("s", $email);
			if($stmt->execute()){
				$stmt->store_result();
				//validate username
				if($stmt->num_rows ==1){
					$stmt->bind_result($name,$category,$phone,$profilepic,$coverpic,$maxfee,$minfee,$facebook,$description,$calendar,$media);	
					$stmt->fetch();
						}
					}
					$stmt->close();
				}
			  }
		  }
			$stmt1->close();
		
		}
} 
//---------------processing updates -------------------------------------
if($_SERVER["REQUEST_METHOD"]=="POST"){
	//check for duplicate usernames(nic)
	if(empty(htmlspecialchars(trim($_POST["username"])))){
		$username_error="username cannot be empty";
	}
	
	/* checking for duplicate emails*/
	if(empty(htmlspecialchars(trim($_POST["email"])))){
		$email_err="Email cannot be empty. We won't spam";
	}
	else{
		$search = "SELECT username, email FROM user_details WHERE email = ?";
		if($stmt =$connection->prepare($search)){
			$stmt->bind_param("s",$param_email);
			$param_email =htmlspecialchars(trim($_POST["email"]));
			if($stmt->execute()){
				$stmt->store_result();
				if($stmt->num_rows == 1){
					$stmt->bind_result($other_user, $email);
					if($stmt->fetch()){
						if($username!=$other_user){
							$email_err = "This Email is already registered"; 
						}
						else{
							$email=htmlspecialchars(trim($_POST["email"]));
						}
					}
					
				}
				else{
					$email=htmlspecialchars(trim($_POST["email"])); 
				}
			}
			else{
				echo("Oops! Something is wrong, try again later");
			}
		}
		$stmt->close();
	}
	
		
	/* validate if anything is blank, only the necessary items are validated */
	
	//.............. for field that need validation .....................
	if(empty($_POST["name"])){
		$name_err ="Name cannot be empty";
	}
	else{
		$name = htmlspecialchars(trim($_POST["name"]));
	}
	//.................add smilar code for other fields.......................
	
	//------------for non-validated fields----------------
	$phone = htmlspecialchars(trim($_POST["phone"]));
	$description = htmlspecialchars(trim($_POST["description"]));
	$facebook = htmlspecialchars(trim($_POST["facebook"]));
	$maxfee = htmlspecialchars(trim($_POST["maxfee"]));
	$minfee=htmlspecialchars(trim($_POST["minfee"]));
	$category=htmlspecialchars(trim($_POST["category"]));
	$phone=htmlspecialchars(trim($_POST["phone"]));
	
	//--------------------------------------------------*/
	
	/* Require the entering of the password to confirm edits*/
	$password=$_POST["password"];
		$search = "SELECT  password FROM user_details WHERE username = ?";
		if($stmt = $connection->prepare($search)){

                // Bind variables to the prepared statement as parameters
                $stmt->bind_param("s", $username);
			if($stmt->execute()){
				$stmt->store_result();
				//validate username
				if($stmt->num_rows ==1){
					$stmt->bind_result($hashed_password);
					/*see if there is such a record*/
					if($stmt->fetch()){
						$stmt->close();
						/* verify password*/
						if(password_verify($password, $hashed_password)){
						/* enter the UPDATE query here */
						if(empty($username_error)&& empty($password_error)&& empty($confirm_pass_err)&& empty($email_err)){
							
		/* inserting the private details */
		$insert = "UPDATE private_details SET  name=?,category=?,phone=?,profilepic=?,coverpic=?,maxfee=?,minfee=?,facebook=?,description=?,calendar=?,media=? WHERE private_details.email =?";
		if($stmt = $connection->prepare($insert)){
			$stmt->bind_param("ssssssssssss", $name,$category,$phone,$profilepic,$coverpic,$maxfee,$minfee,$facebook,$description,$calendar,$media,$email);
			if($stmt->execute()){
				
			}
			else{
				echo("Database entering not happening");
			}
			$stmt->close();
		}
		else{
			echo("cannot prepare statement update");
		}		
	
	}					
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
					echo("Oops! we missed. Something went wrong. Please try again.");
				}
			}
		}
			
	
	/* insert information to the server */
	
	$connection->close();
}



//------------------------end

	

?>
</header>
<!-- MAIN SECTION -->

<section class="line" id="article-section">
<div class="margin"><!-- ARTICLES -->
<div class="s-12 m-7 l-9"><!-- ARTICLE 1 -->
<article class="margin-bottom"><!-- text -->
<div class="post-text">
<!-- the sign up form ---------------------->
	<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data">
		 <h2> Login Information</h2>
		<input  type="hidden" id="username" name="username" placeholder="Username" value="<?php echo $username; ?>" readonly>
		<span class="help-block"><?php echo $username_error; ?></span>
		<input type="email"  id="email" name="email" placeholder="Email" value="<?php echo $email; ?>" required>
		<span class="help-block"><?php echo $email_err; ?></span>
		
		
		
                              <h2>Personal Details</h2>
                          <input type="text" name="name" id="name" value="<?php echo $name; ?>" placeholder="Name" required>                   <span class="help-block"><?php echo $name_err; ?></span>               
                                        <input type="number"  id="phone" name="phone" value="<?php echo $phone; ?>" placeholder="Phone Number" required>
										<span class="help-block"><?php echo $phone_err; ?></span>
                                     <input type="text" id="facebook" name="facebook" value="<?php echo $facebook; ?>" placeholder="Facebook link">
										
                                  <h2>Profile Details</h2>
		<select class="form-control" id="category" name="category" required value="<?php echo $category; ?>">
										<option value="band"><p>Band</p></option>
										<option value="singer"><p>Singer</p></option>
										<option value="DJ"><p>Disk Jockey (DJ)</p></option>
										</select>
		<textarea class="form-control" name="description" id="description" value="<?php echo $description; ?>" >   A brief description for your band  </textarea>              <span class="help-block"><?php echo $description_err; ?></span> 
		<input class="form-control" type="file" name="profilepic" accept=".png, .jpg, .jpeg">
										<?php echo($profilepic_err);?>
		<input class="form-control" type="file" name="coverpic" accept=".png, .jpg, .jpeg">
										<?php echo($coverpic_err);?>
	 <input type="number" name="maxfee" id="maxfee" value="<?php echo $maxfee; ?>" placeholder="Maximum fees you will charge">                   <span class="help-block"><?php echo $maxfee_err; ?></span>  
		<input type="number" name="minfee" id="minfee" value="<?php echo $minfee; ?>" placeholder="Minimum fee you will charge" required>                   <span class="help-block"><?php echo $minfee_err; ?></span> 
		<input  class="form-control" type="password" id="password" name="password" placeholder="Enter Password to Update" value="<?php echo $password; ?>" required >
		<span class="help-block"><?php echo $password_error; ?></span>		
		<input type="submit" name="Update" value="Update" class="btn snip1582">
		
			        </form>
<!---------------------------->
</div>
</article>
</div>
</div>
<!--FOOTER-->

<div class="line">
<footer>
<div class="s-12 l-8">
<p>2017, Cascadia Solutions (Pvt) Ltd</p>
</div>

<div class="s-12 l-4"><a class="right" href="javascript:void(0)">Designed by Cascadia Solutions (Pvt) Ltd. </a></div>
</footer>
</div>
<script type="text/javascript" src="../js/cascadia.js"></script></section>
</body>
</html>