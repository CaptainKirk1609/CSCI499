<?php
session_start();
include '../../../dbconnect.php';
require_once("functions.php");
ini_set("display_errors", true);
error_reporting(E_ALL);
	$eTime = $eDate = $sql = "";

	if($_SERVER['REQUEST_METHOD']=='POST' && $_POST){
		$gid = $_SESSION["gid"];
		$uid = $_SESSION["login_user"];
				$eTime = $_POST['eventTime'];
				$eDate = $_POST['eventDate'];
				sendData($eTime, $eDate, $uid, $gid);
				//redirect("../eventSettings.php");		
			}

	}//if

	function validate($data, $gid) {
				$sql = "SELECT * FROM event WHERE name = '$data' AND GID = '$gid'";
				$result = mysqli_query($GLOBALS['db'], $sql);

				$count = mysqli_num_rows($result);
				if($count != 0){
					return "Event of the same name already exists";
				}
				else {
					return "";
				}
	}//function validate

	function sendData($eTitle, $eTime, $eDate, $roomID, $gid){
				$datetime = date('Y-m-d H:i:s', strtotime("$eDate $eTime"));
				$sql = "INSERT INTO event (time, RID, name, GID) VALUES ('$datetime','$roomID','$eTitle','$gid')";
				$result = mysqli_query($GLOBALS['db'], $sql);
				if(!$result){
					die('Error: ' . mysqli_error($GLOBALS['db']));
				}//if
				else{
					echo "Event successfully created!";
				}//else
	}//if
?>
