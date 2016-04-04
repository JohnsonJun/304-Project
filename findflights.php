<?php
$servername = "localhost";
$conn = new mysqli($servername, "cs304", "cs304", "project304");

// if($_POST["dep"]!=""){
// 	echo $_POST["dep"];
// }
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Flight Info
	</title>
</head>
<body style="background:url('https://images.trvl-media.com/media/content/expus/graphics/launch/home/tvly/150324_flights-hero-image_1330x742.jpg')  ">
<center>
<h1>Flight Info</h1>
<?php
$dep = $_POST["dep"];
$des = $_POST["arv"];


if($_POST["dept"] ==""){
	$q1 = "SELECT * FROM flights f, stops_at s, has h WHERE f.departureLoc LIKE '$dep' AND f.destination LIKE '$des' AND f.flightNo = s.flightNo AND f.flightNo=h.flightNo";
	$r1 = $conn->query($q1);
	//echo $q1;
	while($row = $r1->fetch_assoc()){
		printf("<div style='border:1px; display:inline-block; font-size:larger'>FlightNo:<br> %s</div>
			<div style='border:1px; display:inline-block; font-size:larger'>Departure From:<br> %s</div>
			<div style='border:1px; display:inline-block; font-size:larger'>Destination:<br> %s</div>
			<div style='border:1px; display:inline-block; font-size:larger'>Company:<br> %s</div><br>
			<div style = 'font-size:large'>The Boarding Gate Number:<div style='border:1px solid black; display:inline-block;'> %d</div></div>"
			,$row["flightNo"],$row["departureLoc"],$row["destination"],$row["companyName"],$row["gateNo"]);
		$deptime = new DateTime($row["departureTime"]);
		$arvtime = new DateTime($row["arrivalTime"]);
		printf("<div style = 'font-size:large'>DepTime: ");
		printf($deptime->format("Y-m-d H:i:s"));
		printf("</div>");
		printf("<div style = 'font-size:large'>ArvTime: ");
		printf($arvtime->format("Y-m-d H:i:s"));
		printf("<br>");
		printf("------------------------------------------------------------------");
		printf("</div>");

	}
} else {
	$dept = $_POST["dept"];
	$dept = $dept ."_%";
	$q2 = "SELECT * FROM flights f, stops_at s, has h WHERE departureLoc LIKE '$dep' AND destination LIKE '$des' AND departureTime LIKE '$dept' AND s.flightNo=f.flightNo AND h.flightNo = f.flightNo";
	//echo $q2;
	$r2 = $conn->query($q2);
	//echo "<br>";
	//echo "FIND";
	
	
	while($row = $r2->fetch_assoc()){
		printf("<div style='border:1px; display:inline-block; font-size:larger'>FlightNo:<br> %s</div>
			<div style='border:1px; display:inline-block; font-size:larger'>Departure From:<br> %s</div>
			<div style='border:1px; display:inline-block; font-size:larger'>Destination:<br> %s</div>
			<div style='border:1px; display:inline-block; font-size:larger'>Company:<br> %s</div><br>
			<div style = 'font-size:large;font-weight:bold;font-style:italic'>You Will Be Boarding at Gate Number:<div style='border:1px solid black; display:inline-block;'> %d</div></div>"
			,$row["flightNo"],$row["departureLoc"],$row["destination"],$row["companyName"],$row["gateNo"]); 
		$deptime = new DateTime($row["departureTime"]);
		$arvtime = new DateTime($row["arrivalTime"]);
		printf("<div style = 'font-size:large'>DepTime: ");
		printf($deptime->format("Y-m-d H:i:s"));
		printf("</div>");
		printf("<div style = 'font-size:large'>ArvTime: ");
		printf($arvtime->format("Y-m-d H:i:s"));
		printf("<br>");
		printf("------------------------------------------------------------------");
		printf("</div>");
	}
}
?>
</body>
</center>
</html>


