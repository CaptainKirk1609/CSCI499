<?php
session_start();
include '../../../dbconnect.php';
require_once("functions.php");
ini_set("display_errors", true);
error_reporting(E_ALL);
	$gName = $sql = "";
	$nameErr = "";
	$hasErrors = false;

	if($_SERVER['REQUEST_METHOD']=='POST'){
		$gName = cleanData($_POST['groupName']);
		$nameErr = validate($gName, 'groupname');
		if(!empty($nameErr)){
			$hasErrors = true;
		}//if

			if($_SESSION["gid"]==0){
				//create random accesscode for group here
				//$acode = ;
				$sql2 = "INSERT INTO group_info (group_name) VALUES ('$gName');";
				mysqli_query($db, $sql2) or die("Error: ".mysqli_error($db));
				$sql2 = "SELECT GID FROM group_info WHERE group_name = '$gName'";//and access_code = acode
				$result = mysqli_query($db, $sql2) or die("Error: ".mysqli_error($db));
				$temp = mysqli_fetch_object($result);
				$userGID = $temp -> GID;
				$uid = $_SESSION["login_user"];
				$sql2 = "UPDATE user_info SET GID = '$userGID' WHERE UID = '$uid'";
				$result = mysqli_query($db, $sql2) or die("Error: ".mysqli_error($db));
				if($result){
					$_SESSION["gid"] = $userGID;
					echo "Success!";
				}
				else{
					die("Error: ".mysqli_error($db));
				}
				redirect("../houseSettings.php");
			}else{
				sendData($gName, $_SESSION["gid"]);
				redirect("../houseSettings.php");
			}//ifelse
	}//if

	//FUNCTIONS
	function cleanData($data){
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}//cleanData

	function validate($data, $field){
		switch($field){

			case 'groupname': {
				$regex = '/^(*[a-zA-Z0-9][^\'])$/';
				if(!empty($data)){
					if(!preg_match($regex, $data)){
						return "Groupname cannot have single quotes.";
					}//if pregmatch
					else {
						return "Enter a new name if you want to change it.";
					}
				}//if empty
				return "";
			}//case groupname

		}//switch
	}//function validate

	function sendData($name, $gid){
			$sql = "UPDATE group_info SET group_name = '$name' WHERE GID = '$gid'";
			$result = mysqli_query($GLOBALS['db'], $sql);

			if(!$result){
				die('Error: ' . mysqli_error($GLOBALS['db']));
			}
			else{
				//echo "Group name changed!";
			}//ifelse
	}//function sendData
?>
