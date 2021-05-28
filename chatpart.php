<?php
include_once 'end.php';

$query="SELECT * FROM users WHERE id = '".$_SESSION['touser']."' LIMIT 1";
           
$result=$conn->query($query);

$row=$result->fetch_assoc();

?>
<div class="col-md-8">
<div class="card shadow-lg bg-white rounded">

<div class="card-header bg-primary text-white"><b><?php if($_SESSION['fromuser'] == $row['id']) echo "<i class='fas fa-user-friends'></i>"." "."Group"; else echo "<i class='fas fa-user'></i>"." ".$row['firstname'];?></b></div>
         
<div class="card-body" id="msgbox">

<?php
if($_SESSION['fromuser'] == $_SESSION['touser'])
$chats = "SELECT * FROM messages WHERE (fromuser = touser)";
else
$chats = "SELECT * FROM messages WHERE (fromuser = '".$_SESSION['fromuser']."' AND touser = '".$_SESSION['touser']."') OR (fromuser = '".$_SESSION['touser']."' AND touser = '".$_SESSION['fromuser']."')"; 
$result = $conn->query($chats);
        while($chat = $result->fetch_assoc())
            {
                if($chat['fromuser'] == $_SESSION['fromuser'])
                {
?>

<div style='text-align:right;'>
<p class="bg-primary text-white" style='word-wrap:break-word; display:inline-block; padding:7px 10px 7px 10px; border-radius:10px; max-width:70%;'>
<?php echo decrypto($chat['message']); ?>
</p>
</div>

<?php
            }
            else
            {
            ?>
<div style='text-align:left;'>
<p class="bg-light text-dark" style='word-wrap:break-word; display:inline-block; padding:7px 10px 7px 10px; border-radius:10px; max-width:70%;'>
<?php echo decrypto($chat['message']); ?>
</p>
</div>
<?php
            }
          }
            ?>
</div>