<?php
if(isset($_POST['admin-user']))
{
    if($_POST['adminemail'] == '' || $_POST['adminpassword'] == '')
    echo '<script type="text/javascript">loginunfilled();</script>';
    if($_POST['adminemail'] == 'prateekpathak97@gmail.com' && $_POST['adminpassword'] == '12345')
    {
        $_SESSION['username'] = 'admin';
        echo '<script type="text/javascript">welcomeadmin();</script>';        
    }
    else
    echo '<script type="text/javascript">notlogged();</script>';
}
?>