<!DOCTYPE html>
<html>
<head>
<title>New Search</title>
</head>
<body>

<form action="includes/cancel.php">
	<button type="submit" name="submit">Cancel search</button>
</form>	
<?php 

function redirect($url)
{
	//supposed to redirect user
    $string = '<script type="text/javascript">';
    $string .= 'window.location = "' . $url . '"';
    $string .= '</script>';

    echo $string;
}

session_start(); 
include_once "dbh.inc.php";

$_SESSION['iter'] = $_SESSION['iter'] + 1;
$_SESSION['flag'] = 0;

echo "Waiting for tutor request...";

if ($_SESSION['iter'] < 2){
	//if first time through code, inserts tutor info into db
	$contact = $_SESSION['u_email'];
	$sql = "SELECT rating, num_rate FROM users WHERE user_email = '$contact'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);
	$rating = $row['rating']
	$topic = $_POST['topic'];
	$tutor = $_SESSION['u_first'] . " " . $_SESSION['u_last'];
	$sql = "INSERT INTO running_t (tu_name, tu_email, tu_topic, rating) VALUES ('$tutor', '$contact', '$topic', $rating);";
	mysqli_query($conn, $sql);

} else {
	//if it is not the first time, that means the user clicked no
	$sql = "INSERT INTO response (stu_email, answer) VALUES ($_SESSION['pemail'], 'no')";
	mysqli_query($conn, $sql);
}
//flags are used so the code nows if db updates are needed once cancelled
$_SESSION['flag2'] = false

do{
	$sql = "SELECT * FROM fullfil WHERE tu_email='$contact' LIMIT 1";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);
	sleep(5);
} while (mysqli_num_rows($result)<1);

$_SESSION['flag2'] = true;

$_SESSION['pname'] = $row["st_name"];
$des = $row['descript'];
$_SESSION['pemail'] = $row['st_email'];
echo $_SESSION['pname'] . "needs help with this problem: " . $des;

$contact = $_SESSION['u_email'];
$sql = "DELETE FROM fullfil WHERE tu_email='$contact'";
mysqli_query($conn, $sql);


if ($row['rej'] > 3){
	//redirects if student has been denied multiple times
	$_SESSION['flag'] = 1;
	redirect(yes.php);
}

?>

<form action ="includes/yes.php"> 
	<button type="submit" name="submit">Accept</button>
</form>

<form action ="includes/st_search.php"> 
	<button type="submit" name="submit">Reject</button>
</form>


</body>
</html>