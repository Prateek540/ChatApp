<?php
function encrypto($str){
    return base64_encode($str);
}

function decrypto($str){
    return base64_decode($str);
}
?>