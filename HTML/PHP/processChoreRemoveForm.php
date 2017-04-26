<?php
ini_set("display_errors", true);
error_reporting(E_ALL);
	session_start();
	require_once("functions.php");
	include '../../../dbconnect.php';
	$cTitle = $sql = "";
	$titleErr = "";
	$hasErrors = false;
	$message = "";

	if($_SERVER['REQUEST_METHOD']=='POST'){
			$giD = $_SESSION["gid"];
			$cTitle = cleanData($_POST['remChore']);
			$hasErrors = remove($cTitle, $giD);		
			redirect("../choreSettings.php");

	}//if

	//FUNCTIONS
	function cleanData($data){
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}//cleanData

	function remove($data, $giD) {
				$data = strtolower($data);
				$data = ucfirst($data);
				$sql = "SELECT * FROM chore WHERE title = '$data' AND GID = '$giD'";
				$result = mysqli_query($GLOBALS['db'], $sql);

				$count = mysqli_num_rows($result);
				if($count != 0){
					$sql = "DELETE FROM chore WHERE title = '$data' AND GID = '$giD'";
					$result = mysqli_query($GLOBALS['db'], $sql);
					if($result){
						$message = "Chore successfully deleted!";
					}//if result
					else{
						$message = "Error occurred: delete did not work.";
						$hasErrors = true;			
					}//else
					
				}//if count
				else {
					$message = "Chore does not exist";
					$hasErrors = true;
				}//else
				$message = "Error occurred: did not search for chore.";
				$hasErrors = true;
	}//function remove

?>