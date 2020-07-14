<?php 
	include '../server/server.php';

	$validation = array('success' => false, 'message' => array());

	$username 	= $conn->real_escape_string($_POST['username']);
	$password	= md5($conn->real_escape_string($_POST['password']));


	if($username != '' AND $password != ''){
		$query 		= "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
		
		$result 	= $conn->query($query);
		
		if($result->num_rows > 0){
			while ($row = $result->fetch_assoc()) {
				$_SESSION['username'] = $row['username'];
				$_SESSION['user_type'] = $row['user_type'];
			}
			$validation['message'] = 'dashboard.php';
			$validation['success'] = true;
		}else{
			$validation['message'] = 'Username or password is incorrect!';
			$validation['success'] = false;
		}
	}else{
		$validation['message'] = 'Username or password is empty!';
		$validation['success'] = false;
	}

	$conn->close();

	echo json_encode($validation);

