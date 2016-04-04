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
	$q1="SELECT * FROM flights f, stops_at s WHERE f.flightNo = s. flightNo ORDER BY departureTime";
	
	$r1 = $conn->query($q1);
	while($row = $r1->fetch_assoc()){
		printf("%s %s %s %d",$row["flightNo"],$row["departureLoc"],$row["destination"],$row["gateNo"]);
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
			$q2 = "SELECT * FROM passengers p, takes t, stops_at s WHERE p.passportNo = '$pass' AND p.name = '$pname' AND t.passportNo = '$pass' AND t.flightNo = s.flightNo";
			//echo $q2;
			$r2 = $conn->query($q2);
			//echo $r2->num_rows;
			while($row = $r2->fetch_assoc()){
				printf("%s %s %s %s %s %s",$row["passportNo"],$row["name"],$row["specialAssistant"],$row["class"],$row["seatNo"],$row["flightNo"]);
				$self=htmlspecialchars($_SERVER['PHP_SELF']);
				echo "<form action='$self' method='post'>
				<input type='text' value='$pass' id='pass' name='pass' style='display:none'>
				<textarea rows='4' cols='50' name='sa' id='sa' placeholder='Update Special Assistant'></textarea>
				<br>
				<input type='submit' value='Update Special Assistant'>
				</form>";
			}
		} else if(!empty($_POST["sa"])){
			$pass = $_POST["pass"];
			$s = $_POST["sa"];
			$q4= "UPDATE takes SET specialAssistant= '$s' where passportNo = '$pass'";
			//echo $q4;
			if($conn->query($q4) == true){
				echo "Record updated successfully";
			} else {
				echo "Error updating record: " . $conn->error;
			}
		};
	}
	?>
