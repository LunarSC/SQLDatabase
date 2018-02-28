<?php
include 'D:\xampp\htdocs\practice\db_connection.php';
 
$conn = OpenCon();
 
echo "Connected Successfully!<br><br>";
//Old info
$ssn = $_GET['ssn'];
if(empty($ssn)){
	exit("ssn cannot be empty!");
}
$fName = $_GET['fName'];
$mInit = $_GET['mInit'];
$lName = $_GET['lName'];
$address = $_GET['address'];
$dob = $_GET['dob'];
$payType = $_GET['payType'];
$payRate = $_GET['payRate'];
//New info
$ssn2 = $_GET['newSsn'];
$fName2 = $_GET['newFName'];
$mInit2 = $_GET['newMInit'];
$lName2 = $_GET['newLName'];
$address2 = $_GET['newAddress'];
$dob2 = $_GET['newDob'];
$payType2 = $_GET['newPayType'];
$payRate2 = $_GET['newPayRate'];

//Query building
$update = "UPDATE `employee` SET ";
$where = " WHERE `ssn` LIKE '$ssn%'";

//Allows for searching when some fields are blank
if(!empty($fName)) {
	$where .= " AND `fName` LIKE '$fName%'";
}
if(!empty($mInit)) {
	$where .= " AND `mInit` LIKE '$mInit%'";
}
if(!empty($lName)) {
	$where .= " AND `lName` LIKE '$lName%'";
}
if(!empty($address)) {
	$where .= " AND `address` LIKE '$address%'";
}
if(!empty($dob)) {
	$where .= " AND `dob` LIKE '$dob%'";
}
if(!empty($payType)) {
	$where .= " AND `payType` LIKE '$payType%'";
}
if(!empty($payRate)) {
	$where .= " AND `payRate` LIKE '$payRate%'";
}
$where .= " ORDER BY fName ASC";
//End building of where clause

//Update value conditionals
if(!empty($ssn2)){
	$update .= "`ssn` = '$ssn2'";
//Needs to be at least one update or else commas from other updates will ruin syntax
} else {
	$update .= "`ssn` = '$ssn'";
}
if(!empty($fName2)){
	$update .= ", `fName` = '$fName2'";
}
if(!empty($mInit2)){
	$update .= ", `mInit` = '$mInit2'";
}
if(!empty($lName2)){
	$update .= ", `lName` = '$lName2'";
}
if(!empty($address2)){
	$update .= ", `address` = '$address2'";
}
if(!empty($dob2)){
	$update .= ", `dob` = '$dob2'";
}
if(!empty($payType2)){
	$update .= ", `payType` = '$payType2'";
}
if(!empty($payRate2)){
	$update .= ", `payRate` = '$payRate2'";
}

$sql = $update . $where;

//Get results of query
$result = $conn->query($sql);
//Testing if update worked
$result2 = $conn->query("SELECT * FROM `employee` WHERE `ssn` = $ssn2");
$affRows = mysqli_affected_rows($conn);
if($affRows >= 2){
	echo "Updated $affRows rows successfully!";
} else if($affRows == 1) {
	echo "Updated $affRows row successfully!";
} else {
	echo "Row update failed!";
}

 
CloseCon($conn);
 
?>