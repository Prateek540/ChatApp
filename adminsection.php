<?php
session_start();
include_once 'db.php';
include_once 'links.php';

if(isset($_SESSION['username']))
{
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin Section</title>
</head>
<body>


<nav class="navbar navbar-expand-lg navbar-dark bg-primary font-weight-normal mb-4">
    <a class="navbar-brand" href="#">Chat Application</a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="adminsection.php"><i class="fas fa-home"></i> Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
        </li>
      </ul>
      </div>
  </nav>


  <div class="container-fluid">
    <div class="row">

      <div class="col-md-2">
        <div class="card shadow-lg bg-white rounded" id="edit">
          <img class="card-img-top" src="Images/user.png" alt="Profile image" style="width: 100%; height: 100%; border-radius: 50%;">
          <div class="card-body">
            <h4 class="card-title">Admin</h4>
          </div>
        </div>
      </div>

      <div class="col-md-6 offset-1">
        <div class="card shadow-lg bg-white rounded" id="contacts">
          <div class="card-header bg-primary text-white">
            <h5 class="card-title"><i class="fas fa-envelope-square"></i> Suggestions Received</h5>
          </div>

          <?php

          $query = "SELECT * FROM suggestions";
          $result = $conn->query($query);

          while($row = $result->fetch_assoc())
          {
          ?>

          <table class="table table-striped table-hover">
          <tr>
          <th><i class="fas fa-user-circle"></i> <?php echo $row['user'];?></th>
          <td><?php echo $row['message'];?></td>
          </tr>
          </table>
          <?php
          }
          ?>

          </div>
          </div>
          <div class="col-md-2 offset-1">
        <div class="card shadow-lg bg-white rounded" id="contacts">
          <div class="card-header bg-primary text-white">
            <h5 class="card-title"><i class="fas fa-book"></i> Delete Contacts</h5>
          </div>

          <?php
          
          $query="SELECT * FROM users ORDER BY firstname";
           
          $result=$conn->query($query);

          while($row=$result->fetch_assoc())
          {
  
          ?>

          <table class="table table-striped table-hover">
            <tr>
              <td><i class="fas fa-user-circle"></i> <a style="text-decoration:none;" href="adelete.php?touser=<?php echo $row['id'];?>"><?php echo $row['firstname'];?></a></td>
            </tr>
          </table>

          <?php
          }
          ?>

        </div>
      </div>

      </div>
    </div>





  </body>
  </html>
<?php
}
else
echo '<script type="text/javascript">notlogged();</script>';
?>