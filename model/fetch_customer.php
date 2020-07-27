<?php 
	$customer_id = $_GET['customer_id'];
	
	$query = "SELECT * FROM customers WHERE customer_id='$customer_id'";

	$result = $conn->query($query);
	$row = $result->fetch_assoc();

	$cus_id 	= $row['customer_id'];
	$fname 		= $row['firstname'];
	$lname		= $row['lastname'];
	$address 	= $row['address'];
	$email		= $row['email'];
	$number 	= $row['contact_no'];
	$pic		= $row['customer_img'];

	if(isset($_GET['pageno'])){
		$pageno = $_GET['pageno'];
	}else{
		$pageno = 1;
	}
	$no_of_records_per_page = 10;
	$offset = ($pageno-1)*$no_of_records_per_page;

	$total_pages_sql = "SELECT * FROM sales JOIN customers ON customers.customer_id=sales.customer_id where customers.customer_id='$customer_id'";
	$total_res = $conn->query($total_pages_sql);

	$total_rows = $total_res->num_rows;

 	$total_pages = ceil($total_rows / $no_of_records_per_page);

	$sql = "SELECT * FROM sales JOIN customers ON customers.customer_id=sales.customer_id where customers.customer_id='$customer_id' ORDER BY sales.date DESC LIMIT $offset, $no_of_records_per_page";
	// $sql = "SELECT * FROM sales JOIN customers ON customers.customer_id=sales.customer_id where customers.customer_id='$customer_id' ORDER BY sales.date DESC";
	$res = $conn->query($sql);


