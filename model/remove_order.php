<?php 
	include '../server/server.php';

	$validation = array('success' => false, 'message' => array());

	$id 	= $conn->real_escape_string($_POST['id']);


	if($id != ''){
		$query 		= "DELETE FROM orders WHERE order_no = '$id'";
		
		$result 	= $conn->query($query);
		
		if($result === true){
			$validation['message'] = 'Order has been removed!';
			$validation['success'] = true;
		}else{
			$validation['message'] = 'Order cannot be removed!';
			$validation['success'] = false;
		}
	}else{
		$validation['message'] = 'Username or password is empty!';
		$validation['success'] = false;
	}

	$conn->close();

	echo json_encode($validation);

