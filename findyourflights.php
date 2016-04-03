<?php
$servername = "localhost";
$conn = new mysqli($servername, "cs304", "cs304", "project304");

$pass = $_POST["passport"];
$pname = $_POST["pname"];

if($conn){
	echo "Connected";
	echo "<br>";
}

$q1 = "SELECT * FROM passengers p, flights f WHERE p.flightNo = f.flightNo AND p.name = '$pname' AND p.passportNo = '$pass'";
//echo "<br>";
//echo $q1;
$r1 = $conn->query($q1);
//echo "<br>";
echo $r1->num_rows;
echo "<br>";
while($row = $r1->fetch_assoc()){
	printf("%s %s %S %s %s %s %s %s %d %s", $row["passportNo"],$row["name"],$row["specialAssistant"],$row["class"],$row["seatNo"],$row["flightNo"],$row["departureLoc"],$row["destination"],$row["gateNo"],$row["companyName"]);
}

?>