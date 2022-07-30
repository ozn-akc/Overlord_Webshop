<?php
if(isset($_COOKIE["loggedInId"])) {
    require('../database.php');
    $plz = $_POST["plz"];
    $select = "SELECT * FROM `plz` WHERE `PLZ` LIKE \"" . $plz . "%\"";
    $result = mysqli_query($my_db, $select);
    $text = mysqli_fetch_assoc($result);
    if(isset($text["PLZ-ONAME"])){
        echo $text["PLZ-ONAME"];
    }else{
        echo "";
    }
}
echo "";