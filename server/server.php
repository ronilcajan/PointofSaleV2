<?php
	$database	= 'pos';
	$username	= 'root';
	$host		= 'localhost';
	$password	= '';

	ini_set('display_errors',1);
	error_reporting(E_ALL);
	mysqli_report(MYSQLI_REPORT_ERROR | E_DEPRECATED);

	$conn = new mysqli($host,$username,$password,$database);

	if($conn->connect_error){
		die("Connection Failed: ". $conn->connect_error());
	}

	if(!isset($_SESSION)){
		session_start();	
	}
