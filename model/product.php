<?php 
	include '../server/server.php';

	$validation = array('success' => false, 'message' => array());

	$serial 	= $conn->real_escape_string($_POST['product_no']);
	$desc 		= $conn->real_escape_string($_POST['description']);
	$name 		= $conn->real_escape_string($_POST['name']);
	$price 		= $conn->real_escape_string($_POST['price']);
	$stocks		= $conn->real_escape_string($_POST['stocks']);
	$unit 		= $conn->real_escape_string($_POST['unit']);
	$min_stck 	= $conn->real_escape_string($_POST['min_stocks']);
	$remarks 	= $conn->real_escape_string($_POST['remarks']);
	$location 	= $conn->real_escape_string($_POST['location']);
	$img 		= $_FILES['product_img']['name'];

	// change img name
	$newimg = date('dmYHis').str_replace(" ", "", $img);

	// image file directory
  	$target = "../uploads/products/".basename($newimg);

  	// suppurted file
	$supported_image = array('image/gif', 'image/jpg', 'image/jpeg', 'image/png');

	$sql		= "SELECT product_no FROM products WHERE product_no='$serial'";
	$result 	= $conn->query($sql);

	if($result->num_rows > 0){
		if(!empty($img) && in_array($_FILES['product_img']['type'], $supported_image)){
			$update  = "UPDATE products SET name='$name', description='$desc', sell_price=$price, stocks=$stocks, unit='$unit', min_stocks=$min_stck, remarks='$remarks', location='$location', product_image='$newimg' WHERE product_no='$serial'";
			$update_res  = $conn->query($update);

			if($update_res === true){
				$validation['message'] = 'Product information has been saved!';
				$validation['success'] = true;

				if(move_uploaded_file($_FILES['product_img']['tmp_name'], $target)){
					$validation['message'] = 'Product image has been saved!';
					$validation['success'] = true;
				}
			}else{
				$validation['message'] = 'Product not save!';
				$validation['success'] = false;
			}

		}else{
			$update  = "UPDATE products SET name='$name', description='$desc', sell_price=$price, stocks=$stocks, unit='$unit', min_stocks=$min_stck, remarks='$remarks', location='$location' WHERE product_no='$serial'";
			$update_res  = $conn->query($update);

			if($update_res === true){
				$validation['message'] = 'Product information has been updated!';
				$validation['success'] = true;
			}else{
				$validation['message'] = 'Product not save!';
				$validation['success'] = false;
			}
		}
	}else{
		if(!empty($img) && in_array($_FILES['product_img']['type'], $supported_image)){
			$insert 	= "INSERT INTO products (product_no, name, description, sell_price, stocks, unit, min_stocks, remarks, location, product_image) VALUES ('$serial','$name', '$desc', $price, $stocks, '$unit', $min_stck, '$remarks', '$location', '$newimg')";	
			$insert_res 	= $conn->query($insert);

			if($insert_res === true){
				if(move_uploaded_file($_FILES['product_img']['tmp_name'], $target)){
					$validation['message'] = 'Product image has been saved!';
					$validation['success'] = true;
				}
				$validation['message'] = 'Product information has been saved!';
				$validation['success'] = true;
			}else{
				$validation['message'] = 'Product not save!';
				$validation['success'] = false;
			}

		}else{
			$insert 	= "INSERT INTO products (product_no, name, description, sell_price, stocks, unit, min_stocks, remarks, location) VALUES ('$serial','$name', '$desc', $price, $stocks, '$unit', $min_stck, '$remarks', '$location')";	
			$insert_res 	= $conn->query($insert);
			if($insert_res === true){
				$validation['message'] = 'Products information has been saved!';
				$validation['success'] = true;
			}else{
				$validation['message'] = 'Product not save!';
				$validation['success'] = false;
			}
		}
		
	}

	$conn->close();

	echo json_encode($validation);

