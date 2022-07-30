<?php
if(isset($_COOKIE["loggedInId"])){
    $user_id = $_COOKIE["loggedInId"];
    $news_id = $_POST["news_id"];
    require('../database.php');
    $select = "DELETE FROM `user_to_news`  WHERE `user_id`=\"" . $user_id . "\" and `news_id`=\"" . $news_id . "\"";
    $result = mysqli_query($my_db, $select);
    $text = mysqli_fetch_assoc($result);
}