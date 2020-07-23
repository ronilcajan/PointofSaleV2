<?php 
	include '../server/server.php';

	$validation = array('success' => false, 'message' => array());

	$id 	= $conn->real_escape_string($_POST['id']);


	if($id != ''){
		$query 		= "DELETE FROM products WHERE product_no = '$id'";
		
		$result 	= $conn->query($query);
		
		if($result === true){
			$validation['message'] = 'Product has been removed!';
			$validation['success'] = true;
		}else{
			$validation['message'] = 'Product cannot be removed!';
			$validation['success'] = false;
		}
	}else{
		$validation['message'] = 'Missing product serial number!';
		$validation['success'] = false;
	}

	$conn->close();

	echo json_encode($validation);

