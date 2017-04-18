<?php
ini_set("display_errors", true);
error_reporting(E_ALL);
	$roomName = $sql = "";
	$roomErr = "";
	$hasErrors = false;

	if($_SERVER['REQUEST_METHOD']=='POST' && $_POST){
		$roomName = cleanData($_POST['room1']); //will need to fix when js increments name for added boxes
			$roomErr = validate($roomName, 'room');
			if(!empty($roomErr)){
				$hasErrors = true;
			}//if
			else{
				/*for testing*/
				$giD = $_SESSION["gid"];
				sendData($roomName, $giD);
			}//ifelse

	}//if

	//FUNCTIONS
	function cleanData($data){
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}//cleanData

	function validate($data, $field) {
		switch($field) {
			case 'room1':{
				$data = strtolower($data);
				$data = ucfirst($data);
				$sql = "SELECT * FROM room WHERE title = '$data'"/* AND GID = '$gid'"*/;
				$result = mysqli_query($db, $sql) /*or die("could not connect to DB")*/;

				$count = mysqli_num_rows($result);
				if($count != 0){
					return "Room already exists";
				}
				else {
					return "";
				}//ifelse
			}//case cTitle
		}//switch
	}//function validate

	function sendData($name, $group){
		if($_SERVER['REQUEST_METHOD']=='POST' && $_POST){
      $sql = "INSERT INTO room (name, GID) VALUES ('$name', $group)";
      $result = mysqli_query($db, $sql);
      if(!$result){
        die('Error: ' . mysqli_error($db). ' Error: '. mysqli_errno($db));
      }//if
      else{
        echo "Room(s) successfully created!";
      }//else
		}//if
	}//function sendData
?>
