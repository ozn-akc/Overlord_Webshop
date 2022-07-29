<?php
if(isset($_COOKIE["loggedInId"])) {
    require('../database.php');
    $user_id = $_COOKIE["loggedInId"];
    $artikel_id = $_POST["artikel_id"];
    $count = $_POST["count"];
    $select = "SELECT * FROM `cart` WHERE `user_id`= \"" . $user_id . "\" AND `artikel_id`=\"".$artikel_id."\"";
    $result = mysqli_query($my_db, $select);
    $text = mysqli_fetch_assoc($result);
    if(isset($text["user_id"])){
        //value is already set;
        $update = "UPDATE `cart` SET `count`= \"" . $text['count']+$count . "\" WHERE `user_id`= \"" . $user_id . "\" AND `artikel_id`=\"".$artikel_id."\"";
        $updateResult = mysqli_query($my_db, $update);
        echo 1;
    }else{
        $insert = "INSERT INTO `cart` (`user_id`,`artikel_id`,`count`) VALUES (\"".$user_id."\", \"".$artikel_id."\", \"".$count."\")";
        $insertResult = mysqli_query($my_db, $insert);
        echo 123;
    }
}else{
    echo 0;
}