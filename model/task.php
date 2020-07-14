<?php 
	include '../server/server.php';

	$validation = array('success' => false, 'message' => array());

	$username	= $_SESSION['username'];
	$task 		= $conn->real_escape_string($_POST['task']);

	if(!empty($task)){

		$query 		= "INSERT INTO task (username,activity) VALUES ('$username','$task')";	
		$result 	= $conn->query($query);
		if($result === true){

			$validation['message'] = 'Task has been created!';
			$validation['success'] = true;

		}else{
			$validation['message'] = 'Something went wrong!';
			$validation['success'] = false;
		}
	}else{
		$validation['message'] = 'Please enter your task!';
		$validation['success'] = false;
	}

	$conn->close();

	echo json_encode($validation);

