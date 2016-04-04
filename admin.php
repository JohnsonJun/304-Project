<?php
$servername = "localhost";
$conn = new mysqli($servername, "cs304", "cs304", "project304");
?>
<!DOCTYPE HTML>
<html>
<center><body style="background:url('http://www.pulsarwallpapers.com/data/media/3/Alien%20Ink%202560X1600%20Abstract%20Background.jpg') ">
	<h1>Administrator Page</h1>
	<p1><div style = 'font-size:large;font-weight:bold;font-style:italic'>Upcoming Flights</div></p1>
	<br>
	<?php
	$q1="SELECT * FROM flights f, stops_at s WHERE f.flightNo = s. flightNo ORDER BY departureTime";
	
	$r1 = $conn->query($q1);
	while($row = $r1->fetch_assoc()){
		printf("<div style='border:1px; display:inline-block; font-size:larger'>FlightNo:<br> %s</div>
			<div style='border:1px; display:inline-block; font-size:larger'>Departure From:<br> %s</div>
			<div style='border:1px; display:inline-block; font-size:larger'>Destination:<br> %s</div>
			<div style = 'font-size:large'>The Boarding Gate Number:<div style='border:1px solid black; display:inline-block;'> %d</div></div>",$row["flightNo"],$row["departureLoc"],$row["destination"],$row["gateNo"]);
		echo "<br>";
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
	?>
	<br>
	<br>
	<h1>Change Gate</h1>
	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
		<lable for="flight"><div style = 'font-size:large'>Enther the Flight No: </lable></div>
		<input type="text" id="flight" name="flight"><br />
		<lable for="gate"><div style = 'font-size:large'>Change Gate for flight: </lable></div>
		<input type="text" id="gate" name="gate"><br />
		<input type="submit" value="Submit Request"><br />
	</form>
	<br>
	<br>
	<?php
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		if(!empty($_POST["flight"])&& !empty($_POST["gate"])){
			$gate=$_POST["gate"];
			$flight=$_POST["flight"];
			$q5="SELECT * FROM gate WHERE gateNo='$gate'";
			$r5 =$conn->query($q5);
			if($r5->num_rows == 0){
				echo "No such Gate";
			} else {
				$q6="UPDATE stops_at SET gateNo='$gate' WHERE flightNo='$flight'";
				if($conn->query($q6)==true){
					echo "Update Successfully!";
				} else {
					echo "Error updating record: " . $conn->error;
				}
			}
		}
	}
	?>
	<br>
	<br>
	<h1>Cancel Flight</h1>
	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
		<lable for="cf"><div style = 'font-size:large'> </lable>
		<input type="text" id="cflight" name="cflight" placeholder="Enter the Flight No."><br/>
		<input type="submit" value="Comfirm"><br />
	</form>
	<?php
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		if(!empty($_POST["cflight"])){
			$cflight=$_POST["cflight"];
			$q6="SELECT * FROM takes WHERE flightNo ='$cflight'";
			$r6 =$conn->query($q6);
			if($r6->num_rows != 0){
				echo "This Flight still have passenger, You cannot Cancel it";
			} else {
				$q7="DELETE FROM flights WHERE flightNo='cflight'";
				if($conn->query($q7) == true){
					echo "Delete Successfully";
				}else{
					echo "Error deleting record: " . $conn->error;
				}
			}
		}
	}
	?>
	<br>	
	-------------------------------------------------------------------------------------------------------------------------------------------------
	<br>
	<h1>Change Special Assistant for Passenger</h1>
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
				printf("<br><br><div style='border:1px solid; display:inline-block; font-size:larger'>PassportNo:<br> %s</div> 
					<div style='border:1px solid; display:inline-block; font-size:larger'>Name:<br>%s</div>
					<div style='border:1px solid; display:inline-block; font-size:larger'>SpecialAssistant:<br> %s</div><br>
					<div style='border:1px solid; display:inline-block; font-size:larger'>Class:<br> %s</div>
					<div style='border:1px solid; display:inline-block; font-size:larger'>SeatNo:<br>%s</div>
					<div style='border:1px solid; display:inline-block; font-size:larger'>FlightNo:<br> %s</div><br>",$row["passportNo"],$row["name"],$row["specialAssistant"],$row["class"],$row["seatNo"],$row["flightNo"]);
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
