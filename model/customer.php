<?php 
	include '../server/server.php';

	$validation = array('success' => false, 'message' => array());

	$customer_id= $conn->real_escape_string($_POST['customer_id']);
	$fname 		= $conn->real_escape_string($_POST['fname']);
	$lname 		= $conn->real_escape_string($_POST['lname']);
	$address 	= $conn->real_escape_string($_POST['address']);
	$email 		= $conn->real_escape_string($_POST['email']);
	$number		= $conn->real_escape_string($_POST['number']);
	$img 		= $_FILES['customer_img']['name'];
		

	// change img name
	$newimg = date('dmYHis').str_replace(" ", "", $img);

	// image file directory
  	$target = "../uploads/customers/".basename($newimg);

  	// suppurted file
	$supported_image = array('image/gif', 'image/jpg', 'image/jpeg', 'image/png');

	$sql		= "SELECT customer_id FROM customers WHERE customer_id='$customer_id'";
	$result 	= $conn->query($sql);

	if($result->num_rows > 0){
		if(!empty($img) && in_array($_FILES['customer_img']['type'], $supported_image)){

			$update  = "UPDATE customers SET firstname='$fname', lastname='$lname', address='$address', email='$email', contact_no='$number', customer_img='$newimg' WHERE customer_id='$customer_id'";
			$update_res  = $conn->query($update);

			if($update_res === true){
				$validation['message'] = 'Customer information updated!';
				$validation['success'] = true;

				if(move_uploaded_file($_FILES['customer_img']['tmp_name'], $target)){
					$validation['message'] = 'Customer information updated!';
					$validation['success'] = true;
				}
			}else{
				$validation['message'] = 'Customer not save!';
				$validation['success'] = false;
			}

		}else{
			$update  = "UPDATE customers SET firstname='$fname', lastname='$lname', address='$address', email='$email', contact_no='$number' WHERE customer_id='$customer_id'";
			$update_res  = $conn->query($update);

			if($update_res === true){
				$validation['message'] = 'Customer information updated!';
				$validation['success'] = true;
			}else{
				$validation['message'] = 'Customer not save!';
				$validation['success'] = false;
			}
		}
	}else{
		if(!empty($img) && in_array($_FILES['customer_img']['type'], $supported_image)){

			$insert 	= "INSERT INTO customers (firstname, lastname, email, contact_no, address, customer_img) VALUES ('$fname','$lname', '$email', '$number', '$address', '$newimg')";	
			$insert_res 	= $conn->query($insert);

			if($insert_res === true){
				if(move_uploaded_file($_FILES['customer_img']['tmp_name'], $target)){
					$validation['message'] = 'Customer image has been saved!';
					$validation['success'] = true;
				}
				$validation['message'] = 'Customer information has been saved!';
				$validation['success'] = true;
			}else{
				$validation['message'] = 'Product not save!';
				$validation['success'] = false;
			}

		}else{
			$insert 	= "INSERT INTO customers (firstname, lastname, email, contact_no, address) VALUES ('$fname','$lname', '$email', '$number', '$address')";	
			$insert_res 	= $conn->query($insert);
			if($insert_res === true){
				$validation['message'] = 'Customer information has been saved!';
				$validation['success'] = true;
			}else{
				$validation['message'] = 'Customer not save!';
				$validation['success'] = false;
			}
		}
		
	}

	$conn->close();

	echo json_encode($validation);

