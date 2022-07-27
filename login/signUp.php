<?php
if(session_id() == ''){
    session_start();
}
require('../database.php');
$safe_email = mysqli_real_escape_string($my_db, $_POST['email']);
if($safe_email!="" && isset($_POST['password']) ){
    $password = hash("sha256", $_POST['password']);
    $challenge = md5(rand() . time());
    try {
        $salt = random_int(0, 999999);
    } catch (Exception $e) {
        echo $e;
    }
    $password = hash("sha256", $password.$salt);
    if(isset($_POST['nickname'])){
        $nickname = $_POST['nickname'];
        $phpdatabase = "INSERT INTO `user` (nickname, email, password, challenge, salt) VALUES (\"$nickname\",\"$safe_email\", \"$password\", \"$challenge\", \"$salt\")";
    }else{
        $phpdatabase = "INSERT INTO `user` (email, password, challenge, salt) VALUES (\"$safe_email\", \"$password\", \"$challenge\", \"$salt\")";
    }
    try{
        $result = mysqli_query($my_db, $phpdatabase);
        echo 1;
        return;
    } catch(Exception $dbe){
        echo 0;
    }
}
echo 0;