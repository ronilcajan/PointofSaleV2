<?php
	include '../server/server.php';
	$search = strval($_POST['query']);

	$query = "SELECT company_name FROM suppliers WHERE company_name LIKE '{$search}%'";
	$result = $conn->query($query);

	if($result->num_rows > 0){
		$suppliers = array();
		while ( $row = $result->fetch_assoc()){
			$suppliers[] = $row['company_name'];
		}
		echo json_encode($suppliers);
	}
	
	$conn->close();

