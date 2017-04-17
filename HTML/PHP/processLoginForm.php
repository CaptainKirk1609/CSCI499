<?php
	ini_set("display_errors", true);
	error_reporting(E_ALL);
	require_once("functions.php");
	$hasErrors = false;
	$flag = 0;

	include "/../../../dbconnect.php";

	if($_SERVER["REQUEST_METHOD"] == "POST") {

		//username and password sent from form
		$myusername = mysqli_real_escape_string($db, $_POST['usnm']);
		//echo $myusername."\n";
		$myusername = cleanData($myusername);
		$mypassword = mysqli_real_escape_string($db, $_POST['pswd']);
		//echo $mypassword."\n";
		$mypassword = cleanData($mypassword);

		//Database queries
		$sqlPswd = "SELECT password FROM user_info WHERE username= '$myusername'";//grab stored hashed password

		/*get the hashed password from the db in form of a string*/
		$pswdResult = mysqli_query($db, $sqlPswd);
		//$temp = mysqli_fetch_object($pswdResult);
		//$dbpassword = $temp->password;

		/*DEBUG BLOCK*/
		//$booltest = password_verify($mypassword, $dbpassword);

		//if statement to allow login and start session if account exists and password is correct
		if(password_verify($mypassword, $pswdResult)){
			$sql = "SELECT UID, GID FROM user_info WHERE username = '$myusername'";
			$result = mysqli_query($db, $sql);
			$count = mysqli_num_rows($result);
			if($count == 1){
				/*this block splits up the result from sql into uid and gid*/
				$obj = mysqli_fetch_object($result);
				$myusername = $obj->UID;
				$GID = $obj->GID;
				/*end block*/
    		session_start();
				$_SESSION["login_user"] = $myusername;
				$_SESSION["valid"] = true;
				$_SESSION["gid"] = $GID;
	    	$_SESSION["timeout"] = time() + 300;
				//echo "validated";
				redirect("../welcome.php");
			}//if
		} else {
			$hasErrors = true;
			echo $mypassword."\n";
			echo $booltest;	//NOT PRINTING???
			echo $dbpassword."\n";
			//redirect("../login.php");
		}//ifelse
	}//POST if

	function cleanData($data){
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}//cleanData
?>
