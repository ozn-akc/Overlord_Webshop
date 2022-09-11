<?php
require('../database.php');
$safe_email = mysqli_real_escape_string($my_db, $_POST['email']);
$sql = "SELECT * FROM user WHERE email = '" . $safe_email . "';";
$res = mysqli_query($my_db, $sql);
$dbdata = mysqli_fetch_assoc($res);
if(isset($dbdata["email"])){
    echo -1; //Email ist schon in der Datenbank vorhanden
}else{
    $password = hash("sha256", $_POST['password']);
    $challenge = md5(rand() . time());
    try {
        $salt = random_int(0, 999999);
    } catch (Exception $e) {

    }
    $password = hash("sha256", $password.$salt);
    if(isset($_POST['name'])){
        $nickname = mysqli_real_escape_string($my_db, $_POST['name']);
        $phpdatabase = "INSERT INTO `user` (nickname, email, password, challenge, salt) VALUES (\"$nickname\",\"$safe_email\", \"$password\", \"$challenge\", \"$salt\")";
    }else{
        $phpdatabase = "INSERT INTO `user` (email, password, challenge, salt) VALUES (\"$safe_email\", \"$password\", \"$challenge\", \"$salt\")";
    }
    try{
        $result = mysqli_query($my_db, $phpdatabase);
        $sql = "SELECT * FROM user WHERE email = '" . $safe_email . "';";
        $res = mysqli_query($my_db, $sql);
        $dbdata = mysqli_fetch_assoc($res);
        setcookie("loggedId", $dbdata["id"],array('path' => '/', 'expires' => time()+7200, 'secure' => true, 'samesite' => 'lax'));
        echo 1;
    } catch(Exception $dbe){
        echo -2;
    }
}