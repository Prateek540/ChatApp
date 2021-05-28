<?php
session_start();
include_once 'db.php';
include_once 'links.php';

$query = "DELETE FROM users WHERE id='".$_SESSION['fromuser']."'";
$result=$conn->query($query);
if($result)
{
    echo '<script type="text/javascript">logout();</script>';
}
else
{
    echo '<script type="text/javascript">submitted();</script>';    
}
?>