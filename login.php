<!DOCTYPE html>
<html>
<body>
<?php
$servername = "localhost";

$username = $_POST["username"];
$password = $_POST["password"];
$public = ($username == "public" && $password=="public");
// airline representative
$admin =($username == "admin" && $password=="admin");
$crew = ($username == "crew" && $password=="crew");
$company = ($username == "company" && $password=="company");

$conn = new mysqli($servername, "cs304", "cs304", "project304");
if(!$conn){
	echo "Connect failed: %s\n", conn_connect_error();
} else {
	echo "<center><div style = 'font-size:large;color:#F00'>Login Failed,Wrong Username or Password!</div></center>";
	echo "<br>";
}
if($public){
	echo '<script type="text/javascript">window.location="public.html";</script>';
} else if($admin){
	echo '<script type="text/javascript">window.location="admin.php";</script>';
} else if($crew){
	echo '<script type="text/javascript">window.location="crew.html";</script>';
} else if($company){
	echo '<script type="text/javascript">window.location="company.php";</script>';
}
$conn->close();
?>