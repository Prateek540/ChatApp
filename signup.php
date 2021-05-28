<?php
include_once 'end.php';

if(isset($_POST['sign-user']))
{

  if($_POST['firstname'] == '' || $_POST['lastname'] == '' || $_POST['signemail'] == '' || $_POST['status'] == '' || $_POST['signpassword'] == '')
  {
    echo '<script type="text/javascript">signupunfilled();</script>';
    exit();
  }

  $query="INSERT INTO users(firstname, lastname, email, status, password) VALUES('".$_POST['firstname']."','".$_POST['lastname']."','".$_POST['signemail']."','".$_POST['status']."','".encrypto($_POST['signpassword'])."')";
  
  if($conn->query($query))
  {
    $_SESSION['fromuser'] = $conn->insert_id;
    $_SESSION['touser'] = $conn->insert_id;
    $_SESSION['username'] = $_POST['firstname'].' '.$_POST['lastname'];
    $_SESSION['status'] = $_POST['status'];
    echo '<script type="text/javascript">submitted();</script>';
  }
  else
  {
    echo '<script type="text/javascript">notsubmitted();</script>';
  }
  }    
?>