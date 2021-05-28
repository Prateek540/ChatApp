<?php
session_start();
include_once 'db.php';
include_once 'links.php';
include_once 'end.php';
$fromuser = $_POST['fromuser'];
$touser = $_POST['touser'];
$output = "";

if($_SESSION['fromuser'] == $_SESSION['touser'])
$chats = "SELECT * FROM messages WHERE (fromuser = touser)";
else
$chats = "SELECT * FROM messages WHERE (fromuser = '$fromuser' AND touser = '$touser') OR (fromuser = '$touser' AND touser = '$fromuser')";
$result = $conn->query($chats);

        while($chat = $result->fetch_assoc())
            {
                if($chat['fromuser'] == $fromuser)
                $output.= "<div style='text-align:right;'>
                <p class='bg-primary text-white' style='word-wrap:break-word; display:inline-block; padding:7px 10px 7px 10px; border-radius:10px; max-width:70%;'>"
                .decrypto($chat['message'])."
                </p>
                </div>";
                else
                $output.= "<div style='text-align:left;'>
                <p class='bg-light text-dark' style='word-wrap:break-word; display:inline-block; padding:7px 10px 7px 10px; border-radius:10px; max-width:70%;'>"
                .decrypto($chat['message'])."
                </p>
                </div>";
            }
            
            echo $output;           
?>
