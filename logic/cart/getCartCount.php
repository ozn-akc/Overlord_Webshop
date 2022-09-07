<?php
if(isset($_COOKIE["loggedId"])) {
    require('../database.php');
    $userId = $_COOKIE["loggedId"];
    $count = 0;
    $selectSql = "SELECT * FROM cart WHERE user_id = '" . $userId . "'";
    $selectResponse = mysqli_query($my_db, $selectSql);
    while ($selectData = mysqli_fetch_assoc($selectResponse)) {
        $count = $count + $selectData["count"];
    }
    if($count != 0){
        echo $count;
    }
}else{
    return -1;
}