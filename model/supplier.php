<?php 
	include '../server/server.php';

	$validation = array('success' => false, 'message' => array());

	$company_id	= $conn->real_escape_string($_POST['company_id']);
	$cname 		= $conn->real_escape_string($_POST['cname']);
	$address 	= $conn->real_escape_string($_POST['address']);
	$email 		= $conn->real_escape_string($_POST['email']);
	$number		= $conn->real_escape_string($_POST['number']);
	$img 		= $_FILES['company_img']['name'];
		

	// change img name
	$newimg = date('dmYHis').str_replace(" ", "", $img);

	// image file directory
  	$target = "../uploads/suppliers/".basename($newimg);

  	// suppurted file
	$supported_image = array('image/gif', 'image/jpg', 'image/jpeg', 'image/png');

	$sql		= "SELECT supplier_id FROM suppliers WHERE supplier_id='$company_id'";
	$result 	= $conn->query($sql);

	if($result->num_rows > 0){
		if(!empty($img) && in_array($_FILES['company_img']['type'], $supported_image)){

			$update  = "UPDATE suppliers SET company_name='$cname', address='$address', email='$email', contact_no='$number', company_img='$newimg' WHERE supplier_id='$company_id'";
			$update_res  = $conn->query($update);

			if($update_res === true){
				$validation['message'] = 'Company information updated!';
				$validation['success'] = true;

				if(move_uploaded_file($_FILES['company_img']['tmp_name'], $target)){
					$validation['message'] = 'Company information updated!';
					$validation['success'] = true;
				}
			}else{
				$validation['message'] = 'Company not save!';
				$validation['success'] = false;
			}

		}else{
			$update  = "UPDATE suppliers SET company_name='$cname', address='$address', email='$email', contact_no='$number' WHERE supplier_id='$company_id'";
			$update_res  = $conn->query($update);

			if($update_res === true){
				$validation['message'] = 'Company information updated!';
				$validation['success'] = true;
			}else{
				$validation['message'] = 'Company not save!';
				$validation['success'] = false;
			}
		}
	}else{
		if(!empty($img) && in_array($_FILES['company_img']['type'], $supported_image)){

			$insert 	= "INSERT INTO suppliers (company_name, email, contact_no, address, company_img) VALUES ('$cname', '$email', '$number', '$address', '$newimg')";	
			$insert_res 	= $conn->query($insert);

			if($insert_res === true){
				if(move_uploaded_file($_FILES['company_img']['tmp_name'], $target)){
					$validation['message'] = 'Company image has been saved!';
					$validation['success'] = true;
				}
				$validation['message'] = 'Company information has been saved!';
				$validation['success'] = true;
			}else{
				$validation['message'] = 'Product not save!';
				$validation['success'] = false;
			}

		}else{
			$insert 	= "INSERT INTO suppliers (company_name, email, contact_no, address) VALUES ('$cname', '$email', '$number', '$address')";	
			$insert_res 	= $conn->query($insert);
			if($insert_res === true){
				$validation['message'] = 'Company information has been saved!';
				$validation['success'] = true;
			}else{
				$validation['message'] = 'Company not save!';
				$validation['success'] = false;
			}
		}
		
	}

	$conn->close();

	echo json_encode($validation);

