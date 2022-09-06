<?php
if(isset($_COOKIE["loggedId"]) && isset($_POST["artikel_id"])){
    require('../database.php');
    $userId = $_COOKIE["loggedId"];
    $artikelId = mysqli_real_escape_string($my_db, $_POST["artikel_id"]);
    $selectSql = "SELECT * FROM cart WHERE user_id = '" . $userId . "' and artikel_id = '". $artikelId."';";
    $selectResponse = mysqli_query($my_db, $selectSql);

    $selectData = mysqli_fetch_assoc($selectResponse);
    $deleteSql = "DELETE FROM cart WHERE user_id = '" . $userId . "' and artikel_id = '". $artikelId."';";
    $deleteResponse = mysqli_query($my_db, $deleteSql);
}