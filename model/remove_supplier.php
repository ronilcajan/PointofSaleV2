<?php 
	include '../server/server.php';

	$validation = array('success' => false, 'message' => array());

	$id 	= $conn->real_escape_string($_POST['id']);


	if($id != ''){
		$query 		= "DELETE FROM suppliers WHERE supplier_id = '$id'";

		$result 	= $conn->query($query);
	
		if($result){
			$validation['message'] = 'Supplier has been removed!';
			$validation['success'] = true;
		}else{
			$validation['message'] = 'Supplier cannot be removed!';
			$validation['success'] = false;
		}
		
	}else{
		$validation['message'] = 'Missing supplier id number!';
		$validation['success'] = false;
	}

	$conn->close();

	echo json_encode($validation);

