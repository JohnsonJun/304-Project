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
<body style="background:url('https://scstylecaster.files.wordpress.com/2013/12/flight-tracker.jpg') top center no-repeat; ">
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
	printf("<table border='5' style='width:100%'>
		<tr>
    <td>Class:</td>
    <td>SeatNo:</td>		
    <td>Flight No:</td>
    <td>DepartureFrom:</td>
    <td>Destination:</td>
    <td>Company:</td>
    </tr>
    <tr>
    <td>%s</td>
    <td>%s</td>
    <td>%s</td>
    <td>%s</td>
    <td>%s</td>
    <td>%s</td>
    </tr>
    </table>
		You Will Be Boarding at Gate Number:<div style='border:1px solid black; display:inline-block;'> %d</div>", $row["class"],$row["seatNo"],$row["flightNo"],$row["departureLoc"],$row["destination"],$row["companyName"],$row["gateNo"]);
}
?>
</body>
</center>
</html>