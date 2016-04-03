<?php
// mysqli
$servername = "localhost";
$username = "cs304";
$password = "cs304";
// Create connection
$conn = new mysqli($servername, $username, $password);
if(! $conn){
	echo "failed";
} else {
	echo "succ";
}

$sql = "CREATE DATABASE myDB";
if(mysqli_query($conn,$sql)){
	echo "Data base created";
} else {
	echo "Error creating Database";
} 
$conn->close();
?>