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
            <p class="card-text">Status -> <?php echo $_SESSION['status']; ?></p>
            <a href="editprofile.php" class="btn btn-primary">Edit Profile</a>
            <button class="btn btn-danger" onclick="Check()">Delete</button>
          </div>
        </div>
      </div>
