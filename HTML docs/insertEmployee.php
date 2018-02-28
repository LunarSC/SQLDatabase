<?php
include 'D:\xampp\htdocs\practice\db_connection.php';
 
$conn = OpenCon();
 
echo "Connected Successfully!<br><br>";
//Input boxes from html
$ssn = $_GET['ssn'];
$fName = $_GET['fName'];
$mInit = $_GET['mInit'];
$lName = $_GET['lName'];
$address = $_GET['address'];
$dob = $_GET['dob'];
$payType = $_GET['payType'];
$payRate = $_GET['payRate'];
$insert = "INSERT INTO `employee` (ssn";
$values = " VALUES (`ssn`";

if(empty($ssn)) {
	exit ("ssn cannot be empty!");
}
if(!empty($fName)) {
	$insert .= ", `fName`";
	$values .= ", '$fName'";
}
if(!empty($mInit)) {
	$insert .= ", `mInit`";
	$values .= ", '$mInit'";
}
if(!empty($lName)) {
	$insert .= ", `lName`";
	$values .= ", '$lName'";
}
if(!empty($address)) {
	$insert .= ", `address`";
	$values .= ", '$address'";
}
if(!empty($dob)) {
	$insert .= ", `dob`";
	$values .= ", '$dob'";
}
if(!empty($payType)) {
	$insert .= ", `payType`";
	$values .= ", '$payType'";
}
if(!empty($payRate)) {
	$insert .= ", `payRate`";
	$values .= ", '$payRate'";
}
$insert .= ")";
$values .= ")";

$sql = $insert . $values;

//Get results of query
$result = $conn->query($sql);

$affRows = mysqli_affected_rows($conn);
if($affRows == 1) {
	echo "Inserted $affRows row successfully!";
} else {
	echo "Row Insertion failed! There may already be a similar existing entry.";
}

 
CloseCon($conn);
 
?>