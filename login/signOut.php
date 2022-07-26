<?php
if(session_id() == ''){
    session_start();
}
if(isset($_COOKIE["loggedInId"])){
    setcookie("loggedInId", "", array(
        'path' => '/',
        'expires' => time()-3600,
        'secure' => true,
        'samesite' => 'lax'
    ));
    echo 1;
}else{
    echo("You are not Logged In Nerd!!");
    echo 0;
}
?>