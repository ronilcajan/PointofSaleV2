<?php 
	include '../server/server.php';

	$validation = array('success' => false, 'message' => array());

	$username	= $_SESSION['username'];
	$pass		= md5($conn->real_escape_string($_POST['pass']));

	if(!empty($pass)){

		$query 		= "UPDATE user SET password = '$pass' WHERE username = '$username'";	
		$result 	= $conn->query($query);
		if($result === true){

			$validation['message'] = 'Password updated!';
			$validation['success'] = true;

		}else{
			$validation['message'] = 'Something went wrong!';
			$validation['success'] = false;
		}
	}else{
		$validation['message'] = 'Please enter your password!';
		$validation['success'] = false;
	}

	$conn->close();

	echo json_encode($validation);

