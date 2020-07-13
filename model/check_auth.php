<?php

if(!$_SESSION['username']){
    header("location: ../login.php");
}

// = for sidevar name and profile 
$usn = $_SESSION['username'];
$pr = "SELECT name,profile_img FROM user_profile WHERE username='$usn'";
$re = $conn->query($pr);
$row = $re->fetch_assoc();
$n = $row['name'];
$im = $row['profile_img'];	