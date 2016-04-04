<?php
$servername = "localhost";
$conn = new mysqli($servername, "cs304", "cs304", "project304");
?>
<!DOCTYPE HTML>
<html>
<center>
	<h1>Administrator Page</h1>
	<p1>Upcoming Flights</p1>
	<br>
	<?php
	$q1="SELECT * FROM flights ORDER BY departureTime";
	$r1 = $conn->query($q1);
	while($row = $r1->fetch_assoc()){
		printf("%s %s %s %s %s",$row["flightNo"],$row["departureLoc"],$row["destination"],$row["gateNo"],$row["companyName"]);
		echo "<br>";
	}
	?>
	<br>
	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
		<div>
			<lable for="passport">Passport No.: </lable>
			<input name="passport" id="passport" type="text">
			<lable for="pname">Passenger Name: </lable>
			<input name="pname" id="pname" type="text">
			<input type="submit" value="Check Passenger">
		</div>
	</form>
	<?php
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		if(!empty($_POST["passport"])&&!empty($_POST["pname"])){
			$pass=$_POST["passport"];
			$pname=$_POST["pname"];
			$q2 = "SELECT * FROM passengers p WHERE p.passportNo = 'pass' AND p.name = pname";
			$r2 = $conn($q2);
			while($row = $r2->fetch_assoc()){
				printf("%s %s %s %s %s %s",$row["PassportNo"],$row["name"],$row["specialAssistant"],$row["class"],$row["seatNo"],$row["flightNo"]);
			}
		}
	}
	?>
