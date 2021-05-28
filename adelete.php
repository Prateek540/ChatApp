<?php
session_start();
include_once 'db.php';
include_once 'links.php';

$query = "DELETE FROM users WHERE id='".$_GET['touser']."'";
$result=$conn->query($query);
if($result)
{
    echo '<script type="text/javascript">welcomeadmin();</script>';
}
else
{
    echo '<script type="text/javascript">welcomeadmin();</script>';    
}
?>