<?php
$servername = "localhost";
$conn = new mysqli($servername, "cs304", "cs304", "project304");

// if($_POST["dep"]!=""){
// 	echo $_POST["dep"];
// }
$dep = $_POST["dep"];
$des = $_POST["arv"];
if($conn){
	echo "Connected";
	echo "<br>";
}

if($_POST["dept"] ==""){
	$q1 = "SELECT * FROM flights WHERE departureLoc LIKE '$dep' AND destination LIKE '$des'";
	$r1 = $conn->query($q1);
	echo $r1->num_rows;
	echo "<br>";
	while($row = $r1->fetch_assoc()){
		printf("%s %s %s %d %d %d %s",$row["flightNo"],$row["departureLoc"],$row["destination"], $row["departureTime"],$row["arrivalTime"],$row["gateNo"],$row["companyName"]); 	
	}
} else {
	$dept = $_POST["dept"];
	$dept = $dept ."_%";
	$q2 = "SELECT * FROM flights WHERE departureLoc LIKE '$dep' AND destination LIKE '$des' AND departureTime LIKE '$dept'";
	//echo $q2;
	$r2 = $conn->query($q2);
	//echo "<br>";
	//echo "FIND";
	echo $r2->num_rows;
	echo "<br>";
	while($row = $r2->fetch_assoc()){
		printf("%s %s %s %d %d %d %s",$row["flightNo"],$row["departureLoc"],$row["destination"], $row["departureTime"],$row["arrivalTime"],$row["gateNo"],$row["companyName"]);
		$deptime = new DateTime($row["departureTime"]);
		$arvtime = new DateTime($row["arrivalTime"]);
		echo "<br>";
		printf("DepTime: ");
		printf($deptime->format("Y-m-d H:i:s"));
		echo "<br>";
		printf("ArvTime: ");
		printf($arvtime->format("Y-m-d H:i:s"));
	}
}
?>

