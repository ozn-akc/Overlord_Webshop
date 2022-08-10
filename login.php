<?php
session_start();
if(isset($_COOKIE["loggedId"])){
    echo 0;
}else{
    require('database.php');
    $safe_email = mysqli_real_escape_string($my_db, $_POST['email']);
    $sql = "SELECT * FROM user WHERE email = '" . $safe_email . "';";
    $res = mysqli_query($my_db, $sql);

    $dbdata = mysqli_fetch_assoc($res);
    if(isset($dbdata["id"])){
        setcookie("loggedId", $dbdata["id"],array('expires' => time()+3600, 'samesite' => 'lax'));
        echo 1;
    }else{
        echo 2;
    }
}