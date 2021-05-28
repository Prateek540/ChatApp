<?php
session_start();
include_once 'db.php';
include_once 'links.php';
$search = $_POST['search'];

$query = "SELECT id FROM users WHERE firstname LIKE '%$search%' LIMIT 1";
$result = $conn->query($query);
$row = $result->fetch_assoc();
if($result->num_rows > 0)
{
    $_SESSION['touser'] = $row['id'];
    echo '<script type="text/javascript">submitted();</script>';
}
else
{
    $_SESSION['touser'] = $_SESSION['fromuser'];
    echo '<script type="text/javascript">submitted();</script>';
}

?>