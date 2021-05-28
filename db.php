<?php

$dbservername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "chatapp";

$conn = new mysqli($dbservername, $dbusername, $dbpassword, $dbname);

if ($conn->connect_error)
{
  die("Connection failed: " . $conn->connect_error);
}

?>