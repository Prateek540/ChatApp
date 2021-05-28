<?php
include_once 'end.php';
if(isset($_POST['log-user']))
{
    if($_POST['logemail'] == '' || $_POST['logpassword'] == '')
    
    echo '<script type="text/javascript">loginunfilled();</script>';
    
    
      $query="SELECT * FROM users WHERE email = '".$_POST['logemail']."' AND password = '".encrypto($_POST['logpassword'])."' LIMIT 1";
       
      $result=$conn->query($query);
      $row=$result->fetch_assoc();
    
      if($result->num_rows == 0)
      {
        echo '<script type="text/javascript">notlogged();</script>';
      }
      else
      {
        $_SESSION['fromuser'] = $row['id'];
        $_SESSION['touser'] = $row['id'];
        $_SESSION['username'] = $row['firstname'].' '.$row['lastname'];
        $_SESSION['status'] = $row['status'];
        echo '<script type="text/javascript">logged();</script>';
      }
}

?>