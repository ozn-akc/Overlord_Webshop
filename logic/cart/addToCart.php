<?php
if(isset($_COOKIE["loggedId"]) && isset($_POST["artikel_id"]) && isset($_POST["anzahl"])){
    require('../database.php');
    $userId = $_COOKIE["loggedId"];
    $artikelId = $_POST["artikel_id"];
    $anzahl = $_POST["anzahl"];

    $selectSql = "SELECT * FROM cart WHERE user_id = '" . $userId . "' and artikel_id = '". $artikelId."';";
    $selectResponse = mysqli_query($my_db, $selectSql);

    $selectData = mysqli_fetch_assoc($selectResponse);
    if(isset($selectData["user_id"])){
        if($selectData["count"]+$anzahl>0){
            $sql = "UPDATE  cart SET count='".$selectData["count"]+$anzahl."' WHERE user_id = '" . $userId . "' and artikel_id = '". $artikelId."';";
        }else{
            $sql = "DELETE FROM cart WHERE user_id = '" . $userId . "' and artikel_id = '". $artikelId."';";
        }
    }else{
        $sql = "INSERT INTO  cart (user_id, artikel_id, count) VALUES (" . $userId . ",". $artikelId.",".$anzahl.");";
    }
    $insertResponse = mysqli_query($my_db, $sql);
    $insertData = mysqli_fetch_assoc($selectResponse);
}