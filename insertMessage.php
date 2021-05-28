<?php
session_start();
include_once 'db.php';
include_once 'links.php';
include_once 'end.php';

$fromuser = $_POST['fromuser'];
$touser = $_POST['touser'];
$message = encrypto($_POST['message']);

$output = "";

$sql = "INSERT INTO messages (fromuser, touser, message)
VALUES('$fromuser', '$touser', '$message')";

if($conn->query($sql))
{
    $output.= "";
}
else
{
    $output.= "Error. Please try again.";
}
echo $output;

?>