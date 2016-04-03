<!DOCTYPE html>
<html>
<body>
<?php
$servername = "localhost";

$username = $_POST["username"];
$password = $_POST["password"];
$public = ($username == "public" && $password=="public");
$admin =($username == "admin" && $password=="admin");
$conn = new mysqli($servername, "cs304", "cs304", "project304");
if(!$conn){
	echo "Connect failed: %s\n", conn_connect_error();
} else {
	echo "Database Connected";
	echo "<br>";
}
if($public){
	echo '<script type="text/javascript">window.location="public.html";</script>';
} else if($admin){
	echo '<script type="text/javascript">window.location="admin.html";</script>';
}
$conn->close();
?>