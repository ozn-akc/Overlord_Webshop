<?php
if(isset($_COOKIE["loggedId"])) {
    $userId = $_COOKIE["loggedId"];
    require('../database.php');

    $updateSub = "DELETE FROM user_to_news WHERE user_id = ".$userId." AND news_id = ".$_POST["news_id"].";";
    mysqli_query($my_db, $updateSub);
}