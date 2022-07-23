<?php
if(session_id() == ''){
    session_start();
}
require('../database.php');
if(isset($_COOKIE["loggedInId"])){
    echo("You are already Logged In Nerd!!");
}else{
    $safe_email = mysqli_real_escape_string($my_db, $_POST['email']);
    $phpdatabase = "SELECT * FROM `user` WHERE email = \"$safe_email\"";
    $result = mysqli_query($my_db, $phpdatabase);
    if ($result->num_rows > 0)
    {
        $user = $result->fetch_assoc();
        if($user["password"]==$_POST["password"]){
            setcookie("loggedInId", $user["id"], array(
                'path' => '/',
                'expires' => time()+10800,
                'secure' => true,
                'samesite' => 'lax'
            ));
            echo 1;
        }
    }
}
?>