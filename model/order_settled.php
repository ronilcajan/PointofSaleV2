<?php 
	include '../server/server.php';

	$validation = array('success' => false, 'message' => array());

	$id 	= $conn->real_escape_string($_POST['id']);


	if($id != ''){
		$query 		= "SELECT * FROM orders WHERE order_no = '$id'";
		
		$result 	= $conn->query($query);
		if($result->num_rows > 0){
			$row = $result->fetch_assoc();
			$cus_id = $row['customer_id'];
			$dis = $row['discount'];
			$amn = $row['amount'];
			$sql = "INSERT INTO sales (customer_id,discount,amount) VALUES ($cus_id,$dis,$amn)";

			if($conn->query($sql)){
				$update = "UPDATE orders set status='Paid' WHERE order_no=$id";
				$conn->query($update);
				$validation['message'] = 'Order has been settled!';
				$validation['success'] = true;
			}
		}else{
			$validation['message'] = 'Order not found!';
			$validation['success'] = false;
		}
	}else{
		$validation['message'] = 'Order not found!';
		$validation['success'] = false;
	}

	$conn->close();

	echo json_encode($validation);

