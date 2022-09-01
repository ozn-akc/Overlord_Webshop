<?php
if(isset($_COOKIE["loggedId"])) {
    $userId = $_COOKIE["loggedId"];
    require('../database.php');

    $updateSub = "INSERT INTO user_to_news (user_id, news_id) VALUES (".$userId.",".$_POST["news_id"].");";
    mysqli_query($my_db, $updateSub);
}