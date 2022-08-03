<?php
if(isset($_COOKIE["loggedInId"])) {
    require('../database.php');
    $user_id = $_COOKIE["loggedInId"];

    $select = "DELETE FROM `address` WHERE `user_id` = \"".$user_id."\"";
    $selectResult = mysqli_query($my_db, $select);

    $selectText = mysqli_fetch_assoc($selectResult);
}
