<?php
if(isset($_COOKIE["loggedId"])) {
    require("../database.php");
    $userId = $_COOKIE["loggedId"];
    $selectUser = "SELECT * FROM `user` WHERE `id` = \"" . $userId . "\"";
    $userResult = mysqli_query($my_db, $selectUser);
    $user = mysqli_fetch_assoc($userResult);
    $whereUser = "WHERE id = \"".$userId."\"";
    $returnString = "";

    if(isset($_POST["nickname"]) && $_POST["nickname"]!=$user["nickname"]){
        $updateNickname = "UPDATE user SET nickname = \"".$_POST["nickname"]."\"".$whereUser;
        $nameResult = mysqli_query($my_db, $updateNickname); //possibly add to end
    }

    if(isset($_POST["email"])&& $_POST["email"]!=$user["email"]){
        $selectPossibleEmail = "SELECT * FROM `user` WHERE `email` = \"" . $_POST["email"] . "\"";
        $possibleEmailResult = mysqli_query($my_db, $selectPossibleEmail);
        $possibleEmail = mysqli_fetch_assoc($possibleEmailResult);
        if(isset($possibleEmail["id"])){
            $returnString = $returnString."2";
            echo $returnString;
        }else{
            $updateEmail = "UPDATE user SET email = \"".$_POST["email"]."\"".$whereUser;
            $emailResult = mysqli_query($my_db, $updateEmail); //possibly add to end
        }
    }

    $selectAddr = "SELECT * FROM `address` WHERE `user_id` = \"" . $userId . "\"";
    $addrResult = mysqli_query($my_db, $selectAddr);
    $addr = mysqli_fetch_assoc($addrResult);
}else{
    echo "-1";
}
