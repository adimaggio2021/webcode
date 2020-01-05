<?php  
session_start();
?>



<!DOCTYPE html>
<html>
<head>
<title>Account Page</title>
</head>
<body>

<h1> Micro Tutoring </h1>

<br><br>

<h2> <?php echo $_SESSION['u_uid']; ?> </h2>
<?php
$name = $_SESSION['u_first'];
echo $_SESSION['u_first'];
?>

<img src=user.png alt="Profile picture not set.">
<br><br>
<form action="<?php 

if ($_SESSION['type'] == 'Tutor'){
	echo 'tutors.php'; 
} else{
	echo 'students.php';
}
?>">
<input type="submit" value="Get Started" />
</form>

<br><br>

<form action="settings.php">
    <input type="submit" value="Account Preferences" />
</form>

<br><br>


</body>
</html>
