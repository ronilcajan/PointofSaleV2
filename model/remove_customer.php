<?php 
	include '../server/server.php';

	$validation = array('success' => false, 'message' => array());

	$id 	= $conn->real_escape_string($_POST['id']);


	if($id != ''){
		$query 		= "DELETE FROM customers WHERE customer_id = '$id'";

		$result 	= $conn->query($query);
	
		if($result){
			$validation['message'] = 'Customer has been removed!';
			$validation['success'] = true;
		}else{
			$validation['message'] = 'Customer cannot be removed!';
			$validation['success'] = false;
		}
		
	}else{
		$validation['message'] = 'Missing customer id number!';
		$validation['success'] = false;
	}

	$conn->close();

	echo json_encode($validation);

