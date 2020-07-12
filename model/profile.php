<?php 
	include '../server/server.php';

	$validation = array('success' => false, 'message' => array());

	$username	= $_SESSION['username'];
	$name 		= $conn->real_escape_string($_POST['name']);
	$education 	= $conn->real_escape_string($_POST['education']);
	$location 	= $conn->real_escape_string($_POST['location']);
	$email 		= $conn->real_escape_string($_POST['email']);
	$number 	= $conn->real_escape_string($_POST['number']);
	$notes 		= $conn->real_escape_string($_POST['notes']);

	$action 	= $conn->real_escape_string($_POST['profile']);

	if($action == 'create'){
		$query 		= "INSERT INTO user_profile (username,name,education,location,email,contact_no,notes) VALUES ('$username','$name','$education','$location','$email','$number','$notes')";
		
		$result 	= $conn->query($query);
		if($result === true){

			$validation['message'] = 'Your profile has been created!';
			$validation['success'] = true;

		}else{

			$validation['message'] = 'Something went wrong!';
			$validation['success'] = false;
		}
	}elseif ($action == 'edit') {
		$query = "UPDATE user_profile SET name='$name', education='$education', location='$location', email='$email', contact_no='$number', notes='$notes' WHERE username='$username'";

		if($conn->query($query)){
			$validation['message'] = 'Your profile has been updated!';
			$validation['success'] = true;

		}else{
			$validation['message'] = 'Something went wrong!';
			$validation['success'] = false;
		}
	
	}else{

		$validation['message'] = 'Something went wrong!';
		$validation['success'] = false;

	}

	$conn->close();

	echo json_encode($validation);

