<?php
if(isset($_COOKIE["loggedInId"])){
    $user_id = $_COOKIE["loggedInId"];
    $news_id = $_POST["news_id"];
    require('../database.php');
    $select = "INSERT INTO `user_to_news` ( `user_id`, `news_id`) VALUES (\"" . $user_id . "\", \"" . $news_id . "\")";
    $result = mysqli_query($my_db, $select);
    $text = mysqli_fetch_assoc($result);
}