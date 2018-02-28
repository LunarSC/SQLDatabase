<?php
include 'D:\xampp\htdocs\practice\db_connection.php';
 
$conn = OpenCon();

$conn->query("DELETE FROM `employee`");

CloseCon($conn);
include_once 'index.html';
?>