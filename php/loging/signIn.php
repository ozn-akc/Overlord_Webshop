<?php
if(isset($_COOKIE["loggedId"])){
    echo -1;
}else{
    require('../database.php');
    $safe_email = mysqli_real_escape_string($my_db, $_POST['email']);
    $sql = "SELECT * FROM user WHERE email = '" . $safe_email . "';";
    $res = mysqli_query($my_db, $sql);

    $dbdata = mysqli_fetch_assoc($res);
    if(isset($dbdata["id"])){
        $password = hash("sha256", $_POST['password']);
        $password = hash("sha256", $password.$dbdata["salt"]);
        if($dbdata["password"] == $password){
            setcookie("loggedId", $dbdata["id"],array('expires' => time()+3600, 'samesite' => 'lax'));
            echo 0;
        }else{
            echo 1;
        }
    }else{
        echo 2;
    }
}