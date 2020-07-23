<?php 
	include '../server/server.php';

	$validation = array('success' => false, 'message' => array(), 'products' => array());

	$serial = $conn->real_escape_string($_POST['serial_no']);

	$sql 	= "SELECT * FROM products WHERE product_no='$serial'";

	$result = $conn->query($sql);

	if($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			$validation['products'] = $row; 
		}
		$validation['success'] = true;
		$validation['message'] = 'Products found!';

	}else{

		$validation['success'] = false;
		$validation['message'] = 'No products found!';
	
	}

	$conn->close();
	echo json_encode($validation);
