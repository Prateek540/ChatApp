<?php

session_start();
include_once 'db.php';
include_once 'links.php';

if(isset($_SESSION['fromuser']))
{
  if(isset($_GET['touser']))
  {
    $_SESSION['touser'] = $_GET['touser'];
  }
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Chat App UI</title>
</head>

<body onload="updateScroll()">

  <!--This is navbar -->

  <?php include_once 'navbar.php';?>


  <!--This is middle part 1-->

  <?php include_once 'user.php';?>

    

      <!--This is middle part 2-->

      <?php include_once 'chatpart.php';?>

          <div class="card-footer">
            <div class="input-group">
            <input type="text" id="fromuser" value=<?php echo $_SESSION['fromuser']; ?> hidden />
            <input type="text" id="touser" value=<?php echo $_SESSION['touser']; ?> hidden />
              <input type="text" id="message" class="form-control" placeholder="Type your message">&nbsp;&nbsp;
              <button id="send" class="btn btn-primary">&nbsp;<i class="fas fa-paper-plane"></i>&nbsp;</button>
            </div>
          </div>

        </div>
      </div>


      <!--This is middle part 3-->
      <?php include_once 'contact.php';?>


      


    </div>
  </div>
</body>
<script>
$(document).ready(function(){
  $('.input-group').keypress((e) => {
    if(e.which === 13)
    {
      $.ajax({
            url:"insertMessage.php",
            method:"POST",
            data:{
                fromuser: $('#fromuser').val(),
                touser: $('#touser').val(),
                message: $('#message').val()
            },
            dataType:"text",
            success:function(data)
            {
                $("#message").val("");
            }
        });
        updateScroll();
    }
  });
    $('#send').on("click", function(){
        $.ajax({
            url:"insertMessage.php",
            method:"POST",
            data:{
                fromuser: $('#fromuser').val(),
                touser: $('#touser').val(),
                message: $('#message').val()
            },
            dataType:"text",
            success:function(data)
            {
                $("#message").val("");
            }
        });
        updateScroll();
    });
    setInterval(function(){
       $.ajax({
           url:"realTimeChat.php",
           method:"POST",
           data:{
            fromuser: $('#fromuser').val(),
            touser: $('#touser').val()
           },
           dataType:"text",
           success:function(data)
           {
               $("#msgbox").html(data);
           }
       }); 
    }, 1000);
});
</script>
</html>
<?php
}
else
{
  echo '<script type="text/javascript">notuser();</script>';
}
?>