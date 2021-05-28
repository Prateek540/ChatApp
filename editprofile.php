<?php
session_start();
include_once 'db.php';
include_once 'links.php';
if(isset($_SESSION['fromuser']))
{
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Edit Profile</title>
</head>
<body>
<?php include_once 'navbar.php';?>


  <div class="container-fluid" style="padding: 50px;">
    <div class="row">

    <div class="container-fluid">
    <div class="row">

      <div class="col-md-2">
        <div class="card shadow-lg bg-white rounded" id="edit">
        <?php

$query = "SELECT pic FROM users WHERE id = '".$_SESSION['fromuser']."'";
$result = $conn->query($query);
$row = $result->fetch_assoc();

if($row['pic'] == '')
{
?>
  <img class="card-img-top" src="Images/user.png" alt="Profile image" style="width: 100%; height: 100%; border-radius: 50%;">
  <?php
}
else
{
  ?>
  <img class="card-img-top" src="<?php echo $row['pic'];?>" alt="Profile image" style="width: 100%; height: 100%; border-radius: 50%;">
  <?php
}
  ?>
          <div class="card-body">
            <h4 class="card-title"><?php echo $_SESSION['username']; ?></h4>
            <form action="editprofile.php" method="POST" enctype="multipart/form-data" style="font-size: 14px;">
            <input type="file" name="profileImage"><br><br>
            <button type="submit" name="save-user" class="btn btn-primary">Edit Picture</button>
            </form>
          </div>
        </div>
      </div>


      <?php

      $query = "SELECT * FROM users WHERE id='".$_SESSION['fromuser']."' LIMIT 1";
      $result = $conn->query($query);
      $row = $result->fetch_assoc();

      ?>
      

      <div class="col-md-4 offset-2">
        <div class="card shadow-lg bg-white rounded">
          <div class="card-header bg-primary text-light"><i class="fas fa-user-edit"></i> <b>Edit Profile</b></div>
          <div class="card-body">
            <form method="POST" action="editprofile.php">

              <div class="form-group">
                <label>First Name</label>
                <input type="text" name="firstname" value="<?php echo $row['firstname'];?>" class="form-control" placeholder="First Name" required>
              </div>

              <div class="form-group">
                <label>Last Name</label>
                <input type="text" name="lastname" value="<?php  echo $row['lastname'];?>" class="form-control" placeholder="Last Name" required>
              </div>

              <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" value="<?php  echo $row['email'];?>" class="form-control" placeholder="E-Mail" required>
              </div>

              <div class="form-group">
                <label>Status</label>
                <input type="text" name="status" value="<?php  echo $row['status'];?>" class="form-control" placeholder="Your Status" required>
              </div>

              
              <button type="submit" class="btn btn-primary float-right">Save</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>



</body>

</html>


<?php
}
else
{
  echo '<script type="text/javascript">notuser();</script>';
}
?>

<?php

if(isset($_POST['firstname']))
{
  $query = "UPDATE users SET firstname='".$_POST['firstname']."', lastname='".$_POST['lastname']."', email='".$_POST['email']."', status='".$_POST['status']."' WHERE id = '".$_SESSION['fromuser']."'";
  $result=$conn->query($query);
  if($result)
  {
    $_SESSION['username']=$_POST['firstname'].' '.$_POST['lastname'];
    $_SESSION['status'] = $_POST['status'];
    echo '<script type="text/javascript">submitted();</script>';  
  }
  else
  {
    echo '<script type="text/javascript">submitted();</script>';
  }
}

?>

<?php

if(isset($_POST['save-user']))
{
  $proimage = time().' '.$_FILES['profileImage']['name'];
  $target = 'Images/'.$proimage;
  if(move_uploaded_file($_FILES['profileImage']['tmp_name'], $target))
  {
    $query = "UPDATE users SET pic='".$target."' WHERE id = '".$_SESSION['fromuser']."'";
    $result=$conn->query($query);
    echo '<script type="text/javascript">submitted();</script>';    
  }
  else
  {
    echo '<script type="text/javascript">submitted();</script>';
  }
}
?>