<!DOCTYPE html>
<html lang="en">
<?php session_start();
include '../../dbconnect.php';
require_once("./PHP/functions.php");
if($_SESSION["valid"]==true){?>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Server" >


    <title>Profile Settings</title>

    <!-- Bootstrap Core CSS -->
    <link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
    <!-- room form css -->
    <link href="../CSS/roomForm.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="../CSS/normalize.css"/> <!-- normalize -->
    <link rel="stylesheet" type="text/css" href="../CSS/psuedoWelcome.css"/> <!-- css -->
    <link rel="icon" href="../images/logo.png">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.8.2.js"></script>
    <script type="text/javascript">
      $(function()
      {
          $('#idbtn').click(function()
          {
              $('#idtxt').clone().attr('id', 'idtxt' + $(this).index()).insertAfter('#idtxt');
          })
      })
    </script>
</head>

<body>
<div id="layout">
  <div id="main">

    <div class="header">
        <h1>House Utilities Manager</h1>
        <h2>An application housing all your home management needs. </h2>
    </div>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top2" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="./welcome.php">Dashboard</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                  <ul class="nav navbar-nav">
                      <li><a href="./houseSettings.php">House</a></li>
                      <li><a href="./choreSettings.php">Chores</a></li>
                      <li><a href="./taskSettings.php">Tasks</a></li>
                      <li><a href="./eventSettings.php">Events</a></li>
                      <li><a href="./userSettings.php"> My Settings </a></li>
                      <li><a href="./logout.php"> <span class="glyphicon glyphicon-log-out">
                          </span>Logout </a></li>
                  </ul>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container -->
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
                     <form action="./PHP/processChoreForm.php" method="POST" id="choreForm" name="choreForm">
                       <input type="text" required="" placeholder="Add Chore" value="" name="chore" class="txt">
                       <?php
                         $groupId = $_SESSION["gid"];
                         $sql = "SELECT username, UID FROM user_info WHERE GID = '$groupId'";
                         $result = mysqli_query($db, $sql);
                       ?>
                       <select name="choreOwner" class="form-control">
                        <option value="">--Who is Doing this Chore?--</option>
                        <?php while($room = mysqli_fetch_row($result)):?>
                                <option value="<?php echo $room[1]; ?>"><?php echo $room[0]; ?></option>
                        <?php endwhile; ?>
                       </select>
                       <input type="submit" value="submit" name="submit" class="txt2">
                     </form>
                  </div>
                </div>
            </div>

				<div class="col-md-4">
		            <div class="form_main">
                  <h4 class="heading"><strong>Remove Chores</strong> <span></span></h4>
                  <div class="form">
                    <form action="./PHP/processChoreRemoveForm.php" method="POST" id="removeChoreForm" name="removeChoreForm">
                      <input type="text" id="idtxt" required="" placeholder="Chore to be Removed" value="" name="remChore" class="txt">
                      <!--input type="button" id="idbtn" value="Add Chore to Remove" /-->
                      <br><br>
                      <input type="submit" value="submit" name="submit" class="txt2">
                    </form>
                  </div>
               </div>

            </div><!-- col-md-4 -->
	        </div><!-- row -->
        </div><!-- container -->

        <hr>

        <!-- Footer -->
        <footer class="navbar-fixed-bottom">
            <div class="row">
                <div class="col-lg-12 footer l-box is-center">
                    <p>Copyright &copy; 2016-2017 PLU Capstone. Authors <a target="_blank" href="https://www.linkedin.com/in/gagedgibson">Gage Gibson</a>,
        <a target="_blank" href="https://www.linkedin.com/in/jaymegreer">Jayme Greer</a> and Caleb LaVergne.</p>
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
  </div><!--main-->
</body><!--layout-->

</html>
<?php }//if
else{
  redirect("./login.php");
}?>
