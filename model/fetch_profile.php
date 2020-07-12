<?php 
	$username = $_SESSION['username'];
	
	$query = "SELECT * FROM user_profile WHERE username='$username'";

	$result = $conn->query($query);
	$row = $result->fetch_assoc();

	$name 		= $row['name'];
	$education	= $row['education'];
	$location 	= $row['location'];
	$email		= $row['email'];
	$number 	= $row['contact_no'];
	$notes		= $row['notes'];
	$pic 		= $row['profile_img'];

	$sql = "SELECT * FROM task where username='$username' ORDER BY status DESC";
	$res = $conn->query($sql);
	$task = array();
	while($row = $res->fetch_assoc()){
		$task[] = $row; 
	}

