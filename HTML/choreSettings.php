<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Profile Settings</title>

    <!-- Bootstrap Core CSS -->
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../bootstrap/css/4-col-portfolio.css" rel="stylesheet">

    <!-- room form css -->
    <link href="../CSS/roomForm.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="./welcome.php">Profile</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="./houseSettings.php">House</a>
                    </li>
                    <li>
                        <a href="./choreSettings.php">Chores</a>
                    </li>
                    <li>
                        <a href="./taskSettings.php">Tasks</a>
                    </li>
                    <li>
                        <a href="./eventSettings.php">Events</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Chore Settings
                    <small>Add Chores, remove chores, and assign chores to house members.</small>
                </h1>
            </div>
        </div>
        <!-- /.row -->

        <div class="container">
	         <div class="row">
             <div class="col-md-4">

		             <div class="form_main">
                   <h4 class="heading"><strong>Add/Assign Chores</strong> <span></span></h4>
                   <div class="form">
                     <form action="" method="POST" id="choreForm" name="choreForm">
                       <input type="text" required="" placeholder="Add Chore" value="" name="chore" class="txt">
                       <input type="text" required="" placeholder="Who is doing this chore?" value="" name="choreMem" class="txt">
		       <hr>
                       <input type="text" required="" placeholder="Add Chore" value="" name="chore" class="txt">
                       <input type="text" required="" placeholder="Who is doing this chore?" value="" name="choreMem" class="txt">
		       <hr>
                       <input type="text" required="" placeholder="Add Chore" value="" name="chore" class="txt">
                       <input type="text" required="" placeholder="Who is doing this chore?" value="" name="choreMem" class="txt">
		       <hr>
                       <input type="text" required="" placeholder="Add Chore" value="" name="chore" class="txt">
                       <input type="text" required="" placeholder="Who is doing this chore?" value="" name="choreMem" class="txt">
		       <hr>
                       <input type="text" required="" placeholder="Add Chore" value="" name="chore" class="txt">
                       <input type="text" required="" placeholder="Who is doing this chore?" value="" name="choreMem" class="txt">
		       <hr>

                       <input type="submit" value="submit" name="submit" class="txt2">
                     </form>
                  </div>
                </div>

		            <div class="form_main">
                  <h4 class="heading"><strong>Remove Chores</strong> <span></span></h4>
                  <div class="form">
                    <form action="" method="POST" id="removeChoreForm" name="removeChoreForm">
                      <input type="text" required="" placeholder="Chore to be Removed" value="" name="remChore" class="txt">
                      <input type="text" required="" placeholder="Chore to be Removed" value="" name="remChore" class="txt">
                      <input type="text" required="" placeholder="Chore to be Removed" value="" name="remChore" class="txt">
                      <input type="text" required="" placeholder="Chore to be Removed" value="" name="remChore" class="txt">
                      <input type="text" required="" placeholder="Chore to be Removed" value="" name="remChore" class="txt">

                      <input type="submit" value="submit" name="submit" class="txt2">
                    </form>
                  </div>
               </div>

            </div><!-- col-md-4 -->
	        </div><!-- row -->
        </div><!-- container -->

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12 footer l-box is-center">
                    <p>Copyright &copy; 2016-2017 PLU Capstone. Authors: Jayme Greer, Gage Gibson, Caleb LaVergne</p>
                </div>
            </div>
            <!-- /.row -->
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
