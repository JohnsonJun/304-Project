<?php
$servername = "localhost";
$conn = new mysqli($servername, "cs304", "cs304", "project304");
?>
<!DOCTYPE HTML>
<html>
<center>
<h1>Company Page</h1>
<div>
	<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" id="cf">
		<div>
			<lable for="cpname">Enter your Company Name:</lable>
			<input type="text" name="cpname" id="cpname"><br />
		</div>
			<input type="submit" value="Check Your Company's Flights"></br>
	</form>
</div>
<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
	if(!empty($_POST["cpname"])){
		$cpname = $_POST["cpname"];
		$cpname = $cpname."%"; 	
		$s1= "SELECT h.flightNo FROM has h WHERE h.companyName LIKE '$cpname' ";
		//echo $s1;
		$r1=$conn->query($s1);
		printf("Fond Flight: ");
		while($row = $r1->fetch_assoc()){
			printf("%s ",$row["flightNo"]);
			printf("   ");
		}
	}
}
?>
<br>
<div>
	<form method="post" action="company.php" id="cp">
		<div>
			<lable for="fn">Choose from above flight to see the number of passengers: </lable>
			<br>
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
		printf("Number of passengers in %s: %d",$fn,$row[0]);
	}
}
?>
</html>