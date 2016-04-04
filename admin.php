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
	<br>
	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
		<lable for="flight">Enther the Flight No: </lable>
		<input type="text" id="flight" name="flight"><br />
		<lable for="gate">Change Gate for flight: </lable>
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
	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
		<lable for="cf">Cancel the Flight: </lable>
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
	<p1>Change Special Assistant for Passenger</p1>
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
