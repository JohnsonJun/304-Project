<?php
$servername = "localhost";
$conn = new mysqli($servername, "cs304", "cs304", "project304");
?>
<!DOCTYPE HTML>
<html>
<body style="background:url('https://www.pilotlights.net/sites/default/files/Flightcrew_keychain.JPG') top center no-repeat;">
<center>
<h1>Crew Page</h1>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<div>
	<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" id="cf">
		<div>
			<lable for="sin"><div style = 'font-size:large'>Enter your SIN:</lable></div>
			<input type="text" name="sin" id="sin"><br />
		</div>
			<input type="submit" value="Check the Flights that you work in"></br>
	</form>
</div>
<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
	if(!empty($_POST["sin"])){
		$sin = $_POST["sin"];
		$sin = $sin."%"; 	
		$s1= "SELECT * FROM flights f, works_in_f w WHERE w.sin LIKE '$sin' AND f.flightNo=w.flightNo";
		$r1=$conn->query($s1);
		printf("<div style= 'font-size:large;font-weight:bold'>Found Flight:");
		while($row = $r1->fetch_assoc()){
			printf("%s </div>",$row["flightNo"]);
			printf("   ");
		}
	}
}
?>
<br>

<div>
	<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" id="cp">
		<div>
			<lable for="fn"><div style = 'font-size:large'>Choose from above flight to see the number of passengers: </lable></div>
			
			<input type="text" name="fn" id="fn"><br />
		</div>
		<input type="submit" value="See Number of Passengers">
	</form>
</div>
<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
	if(!empty($_POST["fn"])){
		$fn = $_POST["fn"]; 	
		$s1= "SELECT COUNT(DISTINCT t.passportNo) FROM takes t WHERE t.flightNo LIKE '$fn'";
		$r1=$conn->query($s1);
		$row= $r1->fetch_row();
		printf("<div style = 'font-size:large;font-weight:bold'>Number of passengers in %s: %d</div>",$fn,$row[0]);
	}
}
?>
</html>