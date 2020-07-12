<?php 
	include '../server/server.php';

	$validation = array('success' => false, 'message' => array());

	$id 	= $_POST['id'];

	if (!empty($id)) {
		$query	= "DELETE FROM task WHERE task_id='$id'";
		$result 	= $conn->query($query);
		if($result === true){

			$validation['message'] = 'Task successfully deleted!';
			$validation['success'] = true;

		}else{
			$validation['message'] = 'Something went wrong!';
			$validation['success'] = false;
		}
	}else{
		$validation['message'] = 'Something went wrong!';
		$validation['success'] = false;
	}

	$conn->close();

	echo json_encode($validation);