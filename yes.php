<?php
session_start();
include_once "dbh.inc.php";
//returns response and outputs student info
$sql = "INSERT INTO response (stu_email, answer) VALUES ($_SESSION['pemail'], 'yes')";
mysqli_query($conn, $sql);

if ($_SESSION['flag'] == 1){
	echo $_SESSION['pname'] . "'s contact is " . $_SESSION['pemail'];
} else {
	echo "Great! you can contact " . $_SESSION['pname'] . " at " . $_SESSION['pemail'] . " .";
}

?>