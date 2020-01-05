
<?php
session_start();
echo "Searching for available tutors";

//makes sure student chose a topic and handles the filter
if (isset($_POST['Filter'])){
	$filter = $_POST['Filter'];
} else{
	$filter = 0;
}

if (isset($_POST['topic'] == false)){
	echo "Invlaid input";
	exit;
}


function redirect($url)
{
	//same function as in st_search
    $string = '<script type="text/javascript">';
    $string .= 'window.location = "' . $url . '"';
    $string .= '</script>';

    echo $string;
}

include_once "dbh.inc.php";

$topic = $_POST['topic'];
$flag = true;
$tbox = $_POST['desc'];
$num = 0;

while ($flag == true){

do {
	//updated search includes a second rating parameter
	$sql = "SELECT * FROM running_t WHERE tu_topic = '$topic' AND rating > $filter LIMIT 1 OFFSET '$num' ";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);
	sleep(5);
} while (mysqli_num_rows($result) < 1);


$rate = $row['rating']
$rating = strval($rate)
$name = $row["tu_name"];
$email = $row["tu_email"];
$new_name = $_SESSION['u_first'] . " " . $_SESSION['u_last'];
$new_email = $_SESSION['u_email'];
//new fullfil db includes user description
$sql = "INSERT INTO fullfil (tu_email, st_name, st_email, descript, rej) VALUES ('$email', '$new_name', '$new_email', '$tbox', '$num');";
mysqli_query($conn, $sql);
$_SESSION['rating_email'] = $email

do{
	//waits for response
	$sql = "SELECT * FROM response WHERE stu_email = '$new_email' LIMIT 1 ";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);
	sleep(5);
} while (mysqli_num_rows($result) < 1);

if($row['answer'] == 'yes'){
	//provides tutor info and cleans tables
	echo "Your tutor is " . $name . " (" . $rating ." stars). Contact them at skype at " . $email;
	sleep(45);
	$sql = "DELETE FROM running_t WHERE tu_email='$email' LIMIT 1";
	mysqli_query($conn, $sql);
	$flag = false;
	$sql = "DELETE FROM response WHERE stu_email = '$new_email' LIMIT 1";
	mysqli_query($conn, $sql);
} else {
	$num = $num +1;
	$sql = "DELETE FROM response WHERE stu_email = '$new_email' LIMIT 1";
	mysqli_query($conn, $sql);

}

}

//sends to rate page after 45 seconds 
redirect(rate.php)

?>
