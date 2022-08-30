<?php
if(isset($_COOKIE["loggedId"])) {
    require ("../database.php");
    $plz = $_GET["code"];
    $select = "SELECT * FROM `plz` WHERE `PLZ` = \"" . $plz . "\"";
    $result = mysqli_query($my_db, $select);
    $text = mysqli_fetch_assoc($result);
    if(isset($text["PLZ-ONAME"])){
        echo $text["PLZ-ONAME"];
    }else{
        echo "2";
    }
}else{
    echo "-1";
}