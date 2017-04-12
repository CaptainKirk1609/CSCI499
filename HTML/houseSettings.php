<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Capstone" >

    <title>Profile Settings</title>

    <!-- Bootstrap Core CSS -->
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <!--<link href="../bootstrap/css/4-col-portfolio.css" rel="stylesheet">-->

    <!-- room form css -->
    <link href="../CSS/roomForm.css" rel="stylesheet">

    <!-- scripts for dynamic buttons -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.1/jquery-ui.min.js"></script>
    <script type="text/javascript" src="jquery-1.3.2.min.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <?php include '../../dbconnect.php'; ?>
    <?php include './PHP/createRoom.php'; ?>
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
                <h1 class="page-header">House Settings
                    <small>Add rooms, invite members, or move out.</small>
                </h1>
            </div>
        </div>
        <!-- /.row -->

        <div class="container">
	         <div class="row">
             <div class="col-md-4">
<<<<<<< HEAD
                <?php require_once('../../dbconnect.php')?>
                <?php require_once('/PHP/createRoom.php')?>
                <script type="text/javascript">
					$(document).ready(function(){
    					var counter = 2;
   	 					$("#addButton").click(function () {
						if(counter>10){
            				alert("Only 10 textboxes allow");
            			return false;
						}

						var newTextBoxDiv = $(document.createElement('div'))
	     				.attr("id", 'TextBoxDiv' + counter);
						newTextBoxDiv.after().html('<label>Textbox #'+ counter + ' : </label>' +
	      				'<input type="text" name="textbox' + counter +
	      				'" id="textbox' + counter + '" value="" >');

						newTextBoxDiv.appendTo("#TextBoxesGroup");
						counter++;
     				});
     				$("#getButtonValue").click(function () {
						var msg = '';
						for(i=1; i<counter; i++){
   	  						msg += "\n Textbox #" + i + " : " + $('#textbox' + i).val();
						}
    	 				alert(msg);
     				});
  				});
				</script>
                
		             <div class="form_main">
=======
                <div class="form_main">
>>>>>>> 18abd91a46a3f993b353e4c2ed8451871cd2a016
                   <h4 class="heading"><strong>Add Rooms</strong> <span></span></h4>
                   <div class="form">
                     <form action="./PHP/createRoom.php" method="POST" id="roomForm" name="roomForm">
                       <input type="text" required="" placeholder="Add Room" value="" name="room1" class="txt">

<<<<<<< HEAD
					   <input type="button" id="addButton" value="Add Room" /> <br>
                       
=======
					   <input type="button" id="btAdd" value="Add Room" class="bt" /> <br>

>>>>>>> 18abd91a46a3f993b353e4c2ed8451871cd2a016
                       <input type="submit" value="Submit" name="submit" class="txt2">
                     </form>
                  </div>
                </div>
            </div>

					<div class="col-md-4">
		            <div class="form_main">
                  <h4 class="heading"><strong>Invite Members</strong> <span></span></h4>
                  <div class="form">
                    <form action="" method="POST" id="inviteForm" name="inviteForm">
                      <input type="text" required="" placeholder="Add Member" value="" name="room" class="txt">
<<<<<<< HEAD
                     
					  <input type="button" id="addButton" value="Add Member" class="bt" /> <br>
                     
=======

					  <input type="button" id="btAdd" value="Add Member" class="bt" /> <br>

>>>>>>> 18abd91a46a3f993b353e4c2ed8451871cd2a016
                      <input type="submit" value="Submit" name="submit" class="txt2">
                    </form>
                  </div>
               </div>

            </div><!-- col-md-4 -->
	        </div><!-- row -->
        </div><!-- container -->

        <hr>
                  <h4 class="heading"><strong>Ready to Move Out?<strong> <span></span></h4>
		  <form action="" method="POST" id="leaveGroupForm" name="leaveGroupForm">
                      <input type="submit" value="Leave Group" name="submit" class="txt2">
		  </form><!-- action = "./PHP/leaveGroup.php" or something like that -->

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