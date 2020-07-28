<?php 
	$supplier_id = $_GET['supplier_id'];
	
	$query = "SELECT * FROM suppliers WHERE supplier_id='$supplier_id'";

	$result = $conn->query($query);
	$row = $result->fetch_assoc();

	$supplier_id= $row['supplier_id'];
	$cname		= $row['company_name'];
	$address 	= $row['address'];
	$email		= $row['email'];
	$number 	= $row['contact_no'];
	$pic		= $row['company_img'];

	// === Pagination query ======
	// if(isset($_GET['pageno'])){
	// 	$pageno = $_GET['pageno'];
	// }else{
	// 	$pageno = 1;
	// }
	// $no_of_records_per_page = 10;
	// $offset = ($pageno-1)*$no_of_records_per_page;

	// $total_pages_sql = "SELECT * FROM sales JOIN customers ON customers.customer_id=sales.customer_id where customers.customer_id='$customer_id'";
	// $total_res = $conn->query($total_pages_sql);

	// $total_rows = $total_res->num_rows;

 // 	$total_pages = ceil($total_rows / $no_of_records_per_page);

	// $sql = "SELECT * FROM sales JOIN customers ON customers.customer_id=sales.customer_id where customers.customer_id='$customer_id' ORDER BY sales.date DESC LIMIT $offset, $no_of_records_per_page";

	// $res = $conn->query($sql);


