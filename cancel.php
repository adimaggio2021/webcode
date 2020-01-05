<?php
session_start();
include_once "dbh.inc.php";
//this code conditionally provides a repsonse and should always remove the tutor from the db

if ($_SESSION['flag2'] == true){
	$sql = "INSERT INTO response (stu_email, answer) VALUES ($_SESSION['pemail'], 'no')";
	mysqli_query($conn, $sql);
}

$contact = $_SESSION['u_email']
$sql = "DELETE FROM running_t WHERE tu_email = '$contact' LIMIT 1"
mysqli_query($conn, $sql)

echo "Search cancelled."

?>