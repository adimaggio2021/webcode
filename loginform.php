<?php  
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>LoginForm</title>
</head>
<body>
<header>Login Form</header>
<br>


<form action="includes/login.inc.php" method="POST">
	<input type="text" name="uid" placeholder="Username/Email">
	<input type="password" name="pwd" placeholder="password">
<button type="submit" name="submit">Submit</button>


</form>







</body>
</html>


