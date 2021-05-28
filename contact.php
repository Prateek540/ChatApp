<div class="col-md-2">
        <div class="card shadow-lg bg-white rounded" id="contacts">
          <div class="card-header bg-primary text-white">
            <h5 class="card-title"><i class="fas fa-book"></i> Contacts</h5>
          </div>

          <?php
          
          $query="SELECT * FROM users ORDER BY firstname";
           
          $result=$conn->query($query);

          while($row=$result->fetch_assoc())
          {
  
          ?>

          <table class="table table-striped table-hover">
            <tr>
              <td><i class="fas fa-user-circle"></i> <a style="text-decoration:none;" href="chatbox.php?touser=<?php echo $row['id'];?>"><?php if($_SESSION['fromuser'] == $row['id']) echo "Group"; else echo $row['firstname'];?></a></td>
            </tr>
          </table>

          <?php
          }
          ?>

        </div>
      </div>