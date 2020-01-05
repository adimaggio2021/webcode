<?php
session_start();
//uses session var set in t_search a an id
$email = $_SESSION['rating_email'];
include_once "dbh.inc.php";

if (isset($_POST['rating'] == false)){
	//empty checker
	echo "Invlaid input";
	exit;
}

//gets previous rating avg and number of rates from the users table
$sql = "SELECT rating, num_rate FROM users WHERE user_email = '$email'"
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);

//calculation of new rating
$new_num = $row['num_rate'] + 1;
$full_r = $row['rating'] * $row['num_rate'];
$new_rate = ($full_r + $_POST['rating'])/$new_num;

//update queries
$sql = "UPDATE users SET num_rate = '$new_num' WHERE user_email = '$email'";
mysqli_query($conn, $sql);

$sql = "UPDATE users SET rating = '$new_rate' WHERE user_email = '$email'";
mysqli_query($conn, $sql);

?>