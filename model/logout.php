<?php
	include '../server/server.php';
   	session_destroy();
    unset($_SESSION['username']);
    unset($_SESSION['user_type']);
    header('location: ../login.php');
