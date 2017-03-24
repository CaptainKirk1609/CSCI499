<?php
	include '../dbconnect.php';
	/*$cid = */$cTitle = $cDesc = $username = $sql = "";
	/*$cidErr = */$nameErr = $descErr = $uidErr = "";
	$hasErrors = false;
	
	if($_SERVER['REQUEST_METHOD']=='POST' && $_POST){
		$cTitle = cleanData($_POST['title']);
			$titleErr = validate($cTitle, 'cTitle');
			if(!empty($titleErr)){
				$hasErrors = true;			
			}//if
		$cDesc = cleadData($_POST['description']);
			$descErr = validate($cDesc, 'cDesc');
			if(!empty($descErr)){
				$hasErrors = true;			
			}//if
		$username = cleanData($_POST['username']);
			$uidErr = validate($username, 'username');
			if(!empty($uidErr)){
				$hasErrors = true;			
			}//if
		
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
			case 'cTitle':{
				$sql = "SELECT * FROM chore WHERE title = '$data'";
				$result = mysqli_query($db, $sql) /*or die("could not connect to DB")*/;
				
				$count = mysqli_num_rows($result);				
				if($count != 0){
					return 'Chore already exists';				
				}
				else {
					return "";				
				}
			}//case cTitle
			case 'cDesc':{
				
			}//case cDesc
			case 'username':{
				
			}//case username
		}
	}
?>