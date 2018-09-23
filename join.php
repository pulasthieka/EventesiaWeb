<?php 
/*include config file that creates the connection*/
include_once("config.php");

/* initialise variables for login */
$username  = $password = "";
$username_error = $password_error ="";

/* define variables need two for each column, one for showing the data, other for the erroes*/
$name = $description =$calendar =$maxfee =$minfee =$facebook =$media = $email = $phone=$confirm_pass= $category="";
$name_err = $description_err =$calendar_err =$maxfee_err =$minfee_err = $facebook_err= $media_err = $email_err = $phone_err =$confirm_pass_err= $category_err ="";
//file handling variables
	$profilepic =$coverpic = "";
	$profilepic_err=$coverpic_err="";
/*processing the from begins if its post method*/
if($_SERVER["REQUEST_METHOD"]=="POST"){
	if(isset($_POST["Register"])){
	//check for duplicate usernames(nic)
	if(empty(htmlspecialchars(trim($_POST["username"])))){
		$username_error="Please enter username/email";
	}
	else{
		$search_user = "SELECT username FROM user_details WHERE username = ?";
		if($stmt =$connection->prepare($search_user)){
			$stmt->bind_param("s",$param_nic);
			$param_nic =htmlspecialchars(trim($_POST["username"])); //param_nic is needed as: Only variables should be passed by reference
			if($stmt->execute()){
				$stmt->store_result();
				if($stmt->num_rows == 1){
					$username_error = "This username is already taken. Please enter a new one"; /*add a login link here*/
				}
				else{
					$username=htmlspecialchars(trim($_POST["username"]));
				}
			}
			else{
				echo("Oops! Something is wrong, try again later");
			}
		}
		$stmt->close();
	}
	/* checking for duplicate emails*/
	if(empty(htmlspecialchars(trim($_POST["email"])))){
		$email_err="Email cannot be empty. We won't spam";
	}
	else{
		$search = "SELECT email FROM user_details WHERE email = ?";
		if($stmt =$connection->prepare($search)){
			$stmt->bind_param("s",$param_email);
			$param_email =htmlspecialchars(trim($_POST["email"]));
			if($stmt->execute()){
				$stmt->store_result();
				if($stmt->num_rows == 1){
					$email_err = "This Email is already registered"; /*add a login link here*/
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
	
	/* checking the password. Assuming that other field need no checking */
	if(empty($_POST["password"])){
		$password_err ="Password cannot be empty";
	}
	else{
		if(strlen(trim($_POST["password"]))<6){
			$password_err ="Please enter a password longer than 6 character";
		}
		else{
			$password = trim($_POST["password"]);
		}
	}
	
	if(empty($_POST["confirm_pass"])){
		$confirm_pass_err ="Please re-enter the password";
	}
	else{
		$confirm_pass = trim($_POST["confirm_pass"]);
		if($password!=$confirm_pass){
			$confirm_pass_err = "Passwords do not match";
		}
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
	
	//--------------------------------------------------*/
		
		// ......................... file handling ...................
		if(empty($_FILES['profilepic']['name'])){
		$profilepic_err ="No picture selected";
	}
	else{
		// file upload code 
		$extension = explode(".", $_FILES["profilepic"]["name"]);
		$location ="img/userimages/";
		$image       = $username.'.' . end($extension); 
    	$temp_name  = $_FILES['profilepic']['tmp_name'];
    if(isset($image)){
        if(!empty($image)){      
                  
            }       
    }  
		else {
		   $profilepic_err ="You should select a file to upload !!";
	}
	}
	
		
	/* insert information to the server*/ 
	if(empty($username_error)&& empty($password_error)&& empty($confirm_pass_err)&& empty($email_err)&&empty($profilepic_err)){
		if(move_uploaded_file($temp_name, $location.$image)){ 
				$profilepic= $location.$image;
            }
		/* inserting the private details */
		$insert = "INSERT INTO private_details (email,name,category,profilepic, coverpic,maxfee,minfee,facebook,description,calendar,media) VALUES (?,?,?,?,?,?,?,?,?,?,?)";
		if($stmt = $connection->prepare($insert)){
			$stmt->bind_param("sssssssssss", $email,$name,$category,$profilepic,$coverpic,$maxfee,$minfee,$facebook,$description,$calendar,$media);
			if($stmt->execute()){
				/*inserting to the user_details page */
		$register = "INSERT INTO user_details (username, email, password) VALUES (?,?,?)";
		if($stmt2 = $connection->prepare($register)){
			$stmt2->bind_param("sss",$username,$email,$hashed_pass);
			//setting the customer-id and encrypting the password
			$hashed_pass = password_hash($password,PASSWORD_DEFAULT);
			
			if($stmt2->execute()){
				session_start();
				$_SESSION["ID"] = $username;
				header("location:Home.php"); /* redirect to the page of your choice */
			}
			else{
				echo("something went wrong entering to the user_details database");
			}
		}
		$stmt2->close();
			}
			else{
				echo("Database entering not happening");
			}
		}
		else{
			echo("cannot prepare statement");
		}
		$stmt->close();
		
		/*inserting to the user_details page 
		$register = "INSERT INTO user_details (username, email, password) VALUES (?,?,?)";
		if($stmt2 = $connection->prepare($register)){
			$stmt2->bind_param("sss",$username,$email,$hashed_pass);
			//setting the customer-id and encrypting the password
			$hashed_pass = password_hash($password,PASSWORD_DEFAULT);
			
			if($stmt2->execute()){
				$_SESSION["ID"] = $username;
				header("location:Home.php"); /* redirect to the page of your choice /
			}
			else{
				echo("something went wrong entering to the user_details database");
			}
		}
		$stmt2->close();*/
	}
	$connection->close();
  }
	
}
	

?> 
<!DOCTYPE html>
<html lang="en-US">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"><meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Eventesia | Join</title>
	<?php include_once("header.php") ?>
</head>
<body class="size-1140"><!-- TOP NAV WITH LOGO -->
<header class="margin-bottom">
<?php include "navbar.php";?>
</header>
<!-- MAIN SECTION -->

<section class="line" id="article-section">
<div class="margin"><!-- ARTICLES -->
<div class="s-12 m-7 l-9"><!-- ARTICLE 1 -->
<article class="margin-bottom"><!-- text -->
<div class="post-text">
<h1>Got talent bruh? &nbsp;Join Eventesia</h1>

<p style="color:#333">Eventesia is a website which will brings all entertainment providers to one place. Right now we are open for entertainment providers to register with us.&nbsp;</p>

<table border="1" cellpadding="1" cellspacing="1" style="width:96%;">
	<colgroup>
		<col width="60%" />
	</colgroup>
	<tbody>
		<tr>
			<td><span style="font-size:1em;"><strong>What You get:</strong></span></td>
			
		</tr>
		<tr>
			<td>
			<p style="color:#333"><strong>01. Personalised Profile</strong><br />
			Create your own personalised profile on our site!</p>

			<p style="color:#333"><br />
			<strong>02. Advertising</strong><br />
			&ldquo;Eventesia&rdquo; would be the most effective place for advertising as there are no time limits for your videos and no restrictions on the number of uploads and updates.</p>

			<p style="color:#333"><br />
			<strong>03. On-site Calendar</strong><br />
			&ldquo;Eventesia&rdquo; will provide a platform on which you can manage your engagements with an on-site calendar.&nbsp;</p>

			<p style="color:#333"><br />
			<strong>04. Platform for customer reviews</strong><br />
			&ldquo;Eventesia&rdquo; users will choose you based on your past performances which is what makes you special!&nbsp;</p><br>

			<p style="color:#333"><strong>05. Greater exposure to events</strong><br />
			Dry periods will only be a distant memory hereafter as you&rsquo;ll be overflowing with events!&nbsp;</p>
			</td>
			<!--<td valign="TOP"><strong>Registration Fee Rs. 1,000</strong><br />
			(To be paid before user account is created)<br />
			
			<br />
			<strong>Commission 5% on orders through us</strong><br />
<br/>
</td> -->
		</tr>
	</tbody>
</table>

<p style="color:#333"><br />
<br />
&nbsp;</p>
<!-- the sign up form ---------------------->
	<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data">
		 <h2> Login Information</h2>
		<input  type="text" id="username" name="username" placeholder="Username" value="<?php echo $username; ?>" required>
		<span class="help-block"><?php echo $username_error; ?></span>
		<input type="email"  id="email" name="email" placeholder="Email" value="<?php echo $email; ?>" required>
		<span class="help-block"><?php echo $email_err; ?></span>
		<input  class="form-control" type="password" id="password" name="password" placeholder="Password" value="<?php echo $password; ?>" required >
		<span class="help-block"><?php echo $password_error; ?></span>
		<input  class="form-control" type="password" id="confirm_pass" name="confirm_pass" placeholder="Confirm Password" required>
		<span class="help-block"><?php echo $confirm_pass_err; ?></span>
		
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
				
		<input type="submit" name="Register" value="Register" class="btn snip1582">
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