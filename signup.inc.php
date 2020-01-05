<?php
#first if
if (isset($_POST['submit'])) {

	include 'dbh.inc.php';

	$first = $_POST['first'];
	$last = $_POST['last'];
	$email = $_POST['email'];
	$uid = $_POST['uid'];
	$pwd = $_POST['pwd'];
	$type = $_POST['type'];

	//Error handelers
	
	if (empty($first) || empty($last) || empty($email) || empty($uid) || empty($pwd)) {
		header("Location: ../signupform.php?signup=empty");
		exit();
	} else{
		//Check if input character are valid
		
		if (!preg_match("/^[a-zA-Z]*$/" , $first) || !preg_match("/^[a-zA-Z]*$/" , $last) ) {
			
			header("Location: ../signupform.php?signup=invalid");
			exit();
		} else{
			// Check if email is valid
			
			if (!filter_var( $email , FILTER_VALIDATE_EMAIL )) {
				
				header("Location: ../signupform.php?signup=email");
				exit();
			} else {
				$sql = "SELECT * FROM users WHERE user_uid='$uid'";
				$result = mysqli_query($conn , $sql);
				$resultCheck = mysqli_num_rows($result);

				
				if ($resultCheck > 0) {
					header("Location: ../signupform.php?signup=usertaken");
					exit();
				} /*forth else*/ else {
					//Hashing the password
					$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
					//Inser the user into the database
					$sql = "INSERT INTO users (user_first , user_last , user_email , user_uid , user_pwd, user_type) VALUES ('$first','$last','$email','$uid','$hashedPwd', '$type');";
					mysqli_query($conn , $sql);
					header("Location: ../signupform.php?signup=success");
					
					exit();
				}
			}
		}
	}

}else {
	header("Location: ../signupform.php");
	exit();
}