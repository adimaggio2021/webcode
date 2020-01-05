
<?php
session_start()

?>

<!DOCTYPE html>
<html>
<head>
<title>Settings</title>
</head>
<body>

<h1>Account Settings</h1>

<h2>Select account detail you would like to change and what you would like to change it to</h2>

<form action = "includes/db_update.php" method = "POST">
	Property:
	<br>
	<input type="radio" name="detail" value="user_first">First Name
	<br>
	<input type="radio" name="detail" value="user_last">Last Name
	<br>
	<input type="radio" name="detail" value="user_email">Email Address
	<br>
	<input type="radio" name="detail" value="user_pwd">Password
	<br>
	<input type="radio" name="detail" value="user_type">Account Type
	<br>Edit:
	<input type="text" name="edit" >
	<button type="submit" name="submit">Find a Student</button>


</body>
</html>