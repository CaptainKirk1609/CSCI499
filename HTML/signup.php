<!DOCTYPE html>

<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>HUM signup</title>
		<meta http-equiv="cache-control" content="no-cache"/>
		<link rel="stylesheet" href="../CSS/pure-min.css"/>
		<link rel="stylesheet" type="text/css" href="../CSS/normalize.css">
		<link rel="stylesheet" type="text/css" href="../CSS/signup.css"/>
		<link rel="icon" href="../images/logo.png"/>
		<link rel="stylesheet" type="text/css" href="../CSS/psuedoWelcome.css"/>

		<title>Signup</title>
		<!-- bootstrap -->
		<link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
		<link href="../bootstrap/css/starter-template.css" rel="stylesheet">
		<link href="../bootstrap/css/sticky-footer-navbar.css" rel="stylesheet">
		<link href="../bootstrap/css/signin.css" rel="stylesheet">

		<!--[if lte IE 8]>
		<link rel="stylesheet" href="/combo/1.18.13?/css/layouts/side-menu-old-ie.css">
	    <![endif]-->
    	<!--[if gt IE 8]><!-->
    	<!--<![endif]-->
	<!--[if lt IE 9]>
    	<script src="http://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7/html5shiv.js"></script>
	 <![endif]-->

	</head>

	<body data-gr-c-s-loaded="true">
		<nav class="navbar navbar-inverse navbar-fixed-top">
			<div class="container">
				<div class="navbar-header">
					<a class="navbar-brand" href="../index.html"> House Utilities Manager </a>
				</div>
			</div><!--./container -->
		</nav>

		<div class="container">
			<div class="starter-template">
				<div class="header">
	 	    	<h1>House Utilities Manager</h1>
	 	      <h2>An application for all your home management needs. </h2>
	 	    </div><!-- header -->

	<?php include '../../dbconnect.php'; ?>
	<?php include './PHP/processSignupForm.php'; ?>

	<?php if($_SERVER['REQUEST_METHOD']=="GET" || $hasErrorsEmail || $hasErrorsPw){
		if($hasErrorsEmail){ ?>
			<div class="alert alert-danger">
				<strong>Error!</strong> User email already exists.
			</div>
		<?php }//if
		 	if($hasErrorsPw){ ?>
				<div class="alert alert-danger">
					<strong>Error!</strong> Password must contain a number and be 6+ characters.
				</div>
			<?php }//if ?>
				 <div class="content">
						 <form id="SignUp" class="form-signin" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
						 <h2 class="form-signin-heading"> Sign Up </h2>

						 <input type="email" id="useremail" class="form-control"
						 		name="email" placeholder="Email Address" autofocus required/>

						 <input type="username" id="username" class="form-control"
							  name="username" placeholder="Username" autofocus required/>

						 <input type="password" id="pswd" name="pswd"
						 		pattern="(?=.*\d).{6,}" class="form-control"
						 		placeholder="Password" required/>

						 <label for="rpswd" class="sr-only"> Re-Enter Password </label>
						 <input type="password" id="rpswd" name="rpswd"
						 		pattern="(?=.*\d).{6,}" class="form-control"
						 		placeholder="Re-Enter Password" required/>

						 <button class="btn btn-lg btn-primary btn-block" type="submit">Sign up</button>
						 Already have an account? <a href="./login.php"> Log in </a>
	 </form>

			 </div><!-- /.content -->
		 </div><!--/.starter template -->
	 </div> <!-- /.container -->

		<?php }//if
			if($_SERVER['REQUEST_METHOD']=="POST" && !$hasErrors){
					$accesskey = uniqid();
					$sql = "INSERT INTO user_info (username, password, email, accesskey) VALUES ('$username','$hash', '$email', '$accesskey')";
          			$result = mysqli_query($db, $sql);
								if($result){
									include './PHP/phpmailer.php';
									?>
									<div class="alert alert-success">
								    <strong>Congratulations!</strong> You have successfully registered.
								    You should receive an account activation email shortly. Click on the link in the email to activate your account.
								  </div>
									<?php
								}//if
			}//if
		?>
		<footer class="footer">
		 <div class="container">
			 <p class="text muted">Capstone Production: September 2016 - May 2017. Authors <a target="_blank" href="https://www.linkedin.com/in/gagedgibson">Gage Gibson</a>,
				 <a target="_blank" href="https://www.linkedin.com/in/jaymegreer">Jayme Greer</a> and Caleb LaVergne.</p>
			</div><!--/.container-->
		</footer>

		<script src="./ui.js"></script>
	</body>
</html>
