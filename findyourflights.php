<?php
$servername = "localhost";
$conn = new mysqli($servername, "cs304", "cs304", "project304");
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Boading Pass
	</title>
</head>
<body style="background:url('http://www.clipartbest.com/cliparts/aie/RaE/aieRaEozT.png') top center no-repeat; ">
<center>
<!--h1>Boading Pass</h1-->
<?php
$pass = $_POST["passport"];
$pname = $_POST["pname"];
$q1 = "SELECT * FROM passengers p, flights f WHERE p.flightNo = f.flightNo AND p.name = '$pname' AND p.passportNo = '$pass'";
//echo "<br>";
//echo $q1;

echo "<h1>".$pname."'s Boarding Pass</h1>";
$r1 = $conn->query($q1);
//echo "<br>";
while($row = $r1->fetch_assoc()){
	printf("<body style =>
		<div style='border:1px solid; display:inline-block; font-size:larger'>Class:<br> %s</div> 
		<div style='border:1px solid; display:inline-block; font-size:larger'>SeatNo:<br>%s</div>
		<div style='border:1px solid; display:inline-block; font-size:larger'>FlightNo:<br> %s</div><br>
		<div style='border:1px solid; display:inline-block; font-size:larger'>DepartureFrom:<br> %s</div>
		<div style='border:1px solid; display:inline-block; font-size:larger'>Destination:<br> %s</div><br>
		<div style='border:1px solid; display:inline-block; font-size:larger'>Company:<br> %s</div><br>
		<div style = 'font-size:large;font-weight:bold;font-style:italic'>Boarding at Gate Number:<div style='border:1px solid black; display:inline-block;'> %d</div>", $row["class"],$row["seatNo"],$row["flightNo"],$row["departureLoc"],$row["destination"],$row["companyName"],$row["gateNo"]);
}

?>
</body>
</center>
</html>