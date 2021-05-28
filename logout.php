<?php
session_start();

include_once 'db.php';
include_once 'links.php';

session_destroy();

echo '<script type="text/javascript">logout();</script>';

?>