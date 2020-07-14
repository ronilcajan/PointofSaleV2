<?php 
	include '../server/server.php';

	$validation = array('success' => false, 'message' => array());

	$username	= $_SESSION['username'];
	$name 		= $conn->real_escape_string($_POST['name']);
	$education 	= $conn->real_escape_string($_POST['education']);
	$location 	= $conn->real_escape_string($_POST['location']);
	$email 		= $conn->real_escape_string($_POST['email']);
	$number 	= $conn->real_escape_string($_POST['number']);
	$notes 		= $conn->real_escape_string($_POST['notes']);
	$img 		= $_FILES['img']['name'];

	// change img name
	$newimg = date('dmYHis').str_replace(" ", "", $img);

	// image file directory
  	$target = "../uploads/avatar/".basename($newimg);

  	// suppurted file
	$supported_image = array('image/gif', 'image/jpg', 'image/jpeg', 'image/png');

	if(!empty($name) && !empty($education) && !empty($location) && !empty($email) && !empty($number) && !empty($notes) && !empty($newimg)){

		if(isset($_POST['create']) && in_array($_FILES['img']['type'], $supported_image)){

			$query 		= "INSERT INTO user_profile (username,name,education,location,email,contact_no,notes,'profile_img') VALUES ('$username','$name','$education','$location','$email','$number','$notes', '$newimg')";
			
			$result 	= $conn->query($query);

			if($result === true){

				$validation['message'] = 'Profile has been created!';
				$validation['success'] = true;

				if(move_uploaded_file($_FILES['img']['tmp_name'], $target)){
					$validation['message'] = 'Pofile has been created!';
					$validation['success'] = true;
				}

			}else{

				$validation['message'] = 'Something went wrong!';
				$validation['success'] = false;
			}

		}elseif (isset($_POST['edit'])) {

			if(!empty($img) && in_array($_FILES['img']['type'], $supported_image)){
				$query = "UPDATE user_profile SET name='$name', education='$education', location='$location', email='$email', contact_no='$number', notes='$notes', profile_img='$newimg' WHERE username='$username'";

				if($conn->query($query) === true){

					$validation['message'] = 'Profile has been updated!';
					$validation['success'] = true;

					if(move_uploaded_file($_FILES['img']['tmp_name'], $target)){

						$validation['message'] = 'Profile has been updated!';
						$validation['success'] = true;
					}

				}else{
					$validation['message'] = 'Something went wrong!';
					$validation['success'] = false;
				}
			}else{
				$query = "UPDATE user_profile SET name='$name', education='$education', location='$location', email='$email', contact_no='$number', notes='$notes' WHERE username='$username'";

				if($conn->query($query) === true){

					$validation['message'] = 'Profile has been updated!';
					$validation['success'] = true;

					if(move_uploaded_file($_FILES['img']['tmp_name'], $target)){

						$validation['message'] = 'Profile has been updated!';
						$validation['success'] = true;
					}

				}else{
					$validation['message'] = 'Something went wrong!';
					$validation['success'] = false;
				}
			}
		
		}else{

			$validation['message'] = 'Invalid format. Please select an image!';
			$validation['success'] = false;
		}

	}else{

		$validation['message'] = 'Please complete the form!';
		$validation['success'] = false;
	}

	$conn->close();

	echo json_encode($validation);

