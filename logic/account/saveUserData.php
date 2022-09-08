<?php
if(isset($_COOKIE["loggedId"])) {
    require("../database.php");
    $userId = $_COOKIE["loggedId"];
    $selectUser = "SELECT * FROM `user` WHERE `id` = \"" . $userId . "\"";
    $userResult = mysqli_query($my_db, $selectUser);
    $user = mysqli_fetch_assoc($userResult);
    $whereUser = "WHERE id = \"".$userId."\"";

    if(isset($_POST["nickname"]) && $_POST["nickname"]!=$user["nickname"]){
        $updateNickname = "UPDATE user SET nickname = \"".mysqli_escape_string($my_db, $_POST["nickname"])."\"".$whereUser;
        mysqli_query($my_db, $updateNickname); //possibly add to end
    }

    if(isset($_POST["email"])&& $_POST["email"]!=$user["email"]){
        $selectPossibleEmail = "SELECT * FROM `user` WHERE `email` = \"" . mysqli_escape_string($my_db, $_POST["email"]) . "\"";
        $possibleEmailResult = mysqli_query($my_db, $selectPossibleEmail);
        $possibleEmail = mysqli_fetch_assoc($possibleEmailResult);
        if(isset($possibleEmail["id"])){
            echo "2";
        }else{
            $updateEmail = "UPDATE user SET email = \"".mysqli_escape_string($my_db, $_POST["email"])."\"".$whereUser;
            mysqli_query($my_db, $updateEmail); //possibly add to end
        }
    }

    if(isset($_POST["darkmode"])){
        $updateDarkmode = "UPDATE user SET darkmode = 1 ".$whereUser;
    }else{
        $updateDarkmode = "UPDATE user SET darkmode = 0 ".$whereUser;
    }
    mysqli_query($my_db, $updateDarkmode); //possibly add to end

    $selectAddr = "SELECT * FROM `address` WHERE `user_id` = \"" . $userId . "\"";
    $addrResult = mysqli_query($my_db, $selectAddr);
    $addr = mysqli_fetch_assoc($addrResult);
    $whereAddr = "WHERE user_id = \"".$userId."\"";

    if(isset($_POST["street"]) && $_POST["street"]!=$addr["street"]){
        $updateStreet = "UPDATE address SET street = \"".$_POST["street"]."\"".$whereAddr;
        mysqli_query($my_db, $updateStreet); //possibly add to end
    }

    if(isset($_POST["number"]) && $_POST["number"]!=$addr["number"]){
        $updateNumber = "UPDATE address SET number = \"".$_POST["number"]."\"".$whereAddr;
        mysqli_query($my_db, $updateNumber); //possibly add to end
    }

    if(isset($_POST["code"]) && $_POST["code"]!=$addr["plz"]){
        $updateCode = "UPDATE address SET plz = \"".$_POST["code"]."\"".$whereAddr;
        mysqli_query($my_db, $updateCode); //possibly add to end
    }
    echo "1";

}else{
    echo "-1";
}
