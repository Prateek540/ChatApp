<?php
session_start();
include_once 'db.php';
include_once 'links.php';
if(isset($_POST['signuser'])||isset($_POST['loguser'])||isset($_POST['adminuser']))
{
  header("location: chatbox.php");
}
else
{
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
</head>
<body>

    <div class="container" style="padding: 50px;">
        <h2 class="text-center" id="title">Chat Application</h2>
        <hr>
        <div class="row">
            <div class="col-md-5">
                <form method="POST" action="index.php">
                    <p class="text-uppercase"><i class="fas fa-user-plus"></i> <small>New user register here</small></p>
                    <div class="form-group">
                        <label>First Name</label>
                        <input type="text" name="firstname" class="form-control" placeholder="First Name">
                    </div>

                    <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" name="lastname" class="form-control" placeholder="Last Name">
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="signemail" class="form-control" placeholder="E-Mail">
                    </div>

                    <div class="form-group">
                        <label>Status</label>
                        <input type="text" name="status" class="form-control" placeholder="Your Status">
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="signpassword" class="form-control" placeholder="Password">
                    </div>

                    <button type="submit" name="sign-user" class="btn btn-outline-primary">Sign Up</button>
                </form>
            </div>



            <div class="col-md-5 offset-2">
                <form method="POST" action="index.php">
                        <p class="text-uppercase"><i class="fas fa-sign-in-alt"></i> <small>Login using your account</small></p>

                        <div class="form-group">
                            <label>E-Mail</label>
                            <input type="email" name="logemail" class="form-control" placeholder="Your E-Mail">
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="logpassword" class="form-control" placeholder="Password">
                        </div>

                        <button type="submit" name="log-user" class="btn btn-outline-primary">Login</button>
                </form>
                </br>
                <form method="POST" action="index.php">
                        <p class="text-uppercase"><i class="fas fa-users-cog"></i> <small>Administrator Login</small></p>

                        <div class="form-group">
                            <label>E-Mail</label>
                            <input type="email" name="adminemail" class="form-control" placeholder="Admin E-Mail">
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="adminpassword" class="form-control" placeholder="Admin Password">
                        </div>

                        <button type="submit" name="admin-user" class="btn btn-outline-primary">Login</button>
                </form>
            </div>

        </div>
    </div>

</body>
</html>

<?php
}
?>


<?php

include_once 'login.php';
include_once 'signup.php';
include_once 'admin.php';


?>
