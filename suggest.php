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
  <title>Suggestions</title>
</head>

<body>

<?php include_once 'navbar.php';?>


  <div class="container-fluid" style="padding: 50px;">
    <div class="row">


      <div class="col-md-4 offset-4">
        <div class="card shadow-lg bg-white rounded">
          <div class="card-header bg-primary text-light"><i class="fas fa-user-edit"></i> <b>Suggestions</b></div>
          <div class="card-body">
            <form method="POST" action="suggest.php">

              <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control" placeholder="Username" required>
              </div>

              <div class="form-group">
                <label>Message</label>
                <textarea class="form-control" name="message" placeholder="Message" rows="6" required></textarea>
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
if(isset($_POST['username']))
{
    $query = "INSERT INTO suggestions (user, message) VALUES ('".$_POST['username']."', '".$_POST['message']."')";
    if($conn->query($query))
    {
        ?>
        <div class="alert alert-success"><strong>Success!</strong>  Suggestion is submitted.</div>
        <?php
    }
    else
    {
        ?>
        <div class="alert alert-danger"><strong>Error.</strong>  Suggestion not submitted.</div>
        <?php
    }
}
?>