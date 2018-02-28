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
//build the where clause
$where = "WHERE `ssn` LIKE '$ssn%'";

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

//Query generation
$sql = "SELECT `ssn`, `fName`, `mInit`, `lName`, `address`, `dob`, `payType`, `payRate` FROM `employee` $where";

//Get results of query
$result = $conn->query($sql);

//Tuple readability counter
$i = 1;
$numRows = mysqli_num_rows($result);

if ($numRows > 0) {
	if($numRows == 1) {
		echo $numRows. " result<br><br>";
	} else {
		echo $numRows. " results<br><br>";
	}
	echo $i."---------------------------------------".$i."<br><br>";
		while($row = mysqli_fetch_assoc($result)) {
			++$i;
			echo
			"SSN: " . $row["ssn"]. "<br>".
			"First name: " . $row["fName"]. "<br>".
			"Middle initial: ". $row['mInit']. "<br>".
			"Last name: ". $row["lName"].  "<br>".
			"Address: " . $row["address"]. "<br>".
			"Date of birth: " . $row["dob"]. "<br>".
			"Pay type: " . $row["payType"]. "<br>".
			"Pay rate: " . $row["payRate"]. "<br><br>".
			$i."---------------------------------------". $i."<br><br>";
		}
} else {
    echo "0 results";
}

 
CloseCon($conn);
 
?>