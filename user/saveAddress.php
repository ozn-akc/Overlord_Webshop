<?php
if(isset($_COOKIE["loggedInId"])) {
    require('../database.php');
    $user_id = $_COOKIE["loggedInId"];

    $select = "SELECT * FROM `address` WHERE `user_id` = \"".$user_id."\"";
    $selectResult = mysqli_query($my_db, $select);

    $selectText = mysqli_fetch_assoc($selectResult);
    $street = $_POST["street"];
    $number = $_POST["number"];
    $plz = $_POST["plz"];
    if(isset($selectText["user_id"])){
        $update = "UPDATE `address` SET `plz` = \"".$plz."\",`street` = \"".$street."\",`number` = \"".$number."\" WHERE `user_id` = \"".$user_id."\"";
        $updateResult = mysqli_query($my_db, $update);
    }else{
        $insert = "INSERT INTO `address` (`user_id`,`plz`,`street`,`number`) VALUES (\"".$user_id."\",\"".$plz."\",\"".$street."\",\"".$number."\")";
        $insertResult = mysqli_query($my_db, $insert);
    }
}