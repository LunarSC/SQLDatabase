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
if(empty($ssn.$fName.$mInit.$lName.$address.$dob.$payType.$payRate)){
	include_once 'deleteAllEntries.html';
	CloseCon($conn);
	exit();
}
//build the where clause
$where = "WHERE ";
$onlyEntry = true;

//Allows for searching when some fields are blank
if(!empty($ssn)) {
	if(!$onlyEntry){
		$where .= " AND `ssn` LIKE '$ssn%'";
	} else {
		$where .= "`ssn` LIKE '$ssn%'";
		$onlyEntry = false;
	}
}
if(!empty($fName)) {
	if(!$onlyEntry){
		$where .= " AND `fName` LIKE '$fName%'";
	} else {
		$where .= "`fName` LIKE '$fName%'";
		$onlyEntry = false;
	}
}
if(!empty($mInit)) {
	if(!$onlyEntry){
		$where .= " AND `fName` LIKE '$fName%'";
	} else {
		$where .= "`fName` LIKE '$fName%'";
		$onlyEntry = false;
	}
}
if(!empty($lName)) {
	if(!$onlyEntry){
		$where .= " AND `fName` LIKE '$fName%'";
	} else {
		$where .= "`fName` LIKE '$fName%'";
		$onlyEntry = false;
	}
}
if(!empty($address)) {
	if(!$onlyEntry){
		$where .= " AND `fName` LIKE '$fName%'";
	} else {
		$where .= "`fName` LIKE '$fName%'";
		$onlyEntry = false;
	}
}
if(!empty($dob)) {
	if(!$onlyEntry){
		$where .= " AND `fName` LIKE '$fName%'";
	} else {
		$where .= "`fName` LIKE '$fName%'";
		$onlyEntry = false;
	}
}
if(!empty($payType)) {
	if(!$onlyEntry){
		$where .= " AND `fName` LIKE '$fName%'";
	} else {
		$where .= "`fName` LIKE '$fName%'";
		$onlyEntry = false;
	}
}
if(!empty($payRate)) {
	if(!$onlyEntry){
		$where .= " AND `fName` LIKE '$fName%'";
	} else {
		$where .= "`fName` LIKE '$fName%'";
		$onlyEntry = false;
	}
}


//Query generation
$sql = "DELETE FROM `employee` $where";

//Get results of query
$result = $conn->query($sql);

 $affRows = mysqli_affected_rows($conn);
if($affRows >= 2){
	echo "Deleted $affRows rows successfully!";
} else if($affRows == 1) {
	echo "Deleted $affRows row successfully!";
} else {
	echo "Deletion failed!";
}
CloseCon($conn);
 
?>