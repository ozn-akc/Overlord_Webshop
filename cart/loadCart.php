<?php
if(isset($_COOKIE["loggedInId"])) {
    require('../database.php');
    $user_id = $_COOKIE["loggedInId"];
    $select = "SELECT * FROM `cart` WHERE `user_id`= \"" . $user_id . "\"";
    $result = mysqli_query($my_db, $select);
    echo   '<div class="container-fluid text-center" style="padding: 2rem">
                <h1>Shopping Cart</h1>
            </div>
            <div class="container-fluid text-center align-content-center justify-content-center" style="padding: 2rem">';
        while($text = mysqli_fetch_assoc($result)){
            if($text["count"]>0){
                $selectArtikel = "SELECT * FROM `artikel` WHERE `id`=\"".$text["artikel_id"]."\"";
                $artikelResult = mysqli_query($my_db, $selectArtikel);
                $artikel = mysqli_fetch_assoc($artikelResult);
                echo '
                <div class="d-flex align-content-center justify-content-center" style="padding: 1rem">
                  <div class="col-sm-3 d-flex">
                    <img class="image" src="'.$artikel["url"].'" alt="" style="width: 4rem" >
                    <div class="d-flex justify-content-center flex-column flex-wrap" style="width: 100%">
                      '.$artikel["name"].'
                    </div>
                  </div>
                  <div style="width: 0px; border-style: solid; border-color:black; border-width: 0 1px 0 0">
                  </div>
                  <div class="d-flex justify-content-center flex-column flex-wrap" style="margin-left: 15px;">
                    <div class="d-flex justify-content-center flex-column flex-wrap clickable" onclick="modules.addToCart(\''.$artikel["id"].'\', \'1\')">
                      <span class="material-icons" style="scale: 1.2">add</span>
                    </div>
                    <div class="d-flex justify-content-center flex-column flex-wrap">
                      '.$text["count"].'
                    </div>
                    <div class="d-flex justify-content-center flex-column flex-wrap clickable" onclick="modules.removeFromChart(\''.$artikel["id"].'\',\'1\')">
                      <span class="material-icons" style="scale: 1.2">remove</span>
                    </div>
                  </div>
                </div>';
            }
        }
    $select = "SELECT * FROM `address` WHERE `user_id` = \"".$user_id."\"";
    $selectResult = mysqli_query($my_db, $select);

    $selectText = mysqli_fetch_assoc($selectResult);
    if(isset($selectText["user_id"])){
        echo '
        <div style="padding: 2rem">
            <button class="btn btn-primary col-3" onclick="location.href=\'https://localhost/web/cart/confirmOrder.php\'">Bestellen</button>
        </div>';
    }else{
        echo '
        <div style="padding: 2rem">
            <button class="btn btn-primary col-3" onclick="location.href=\'https://localhost/web/user/\'">Addresse speichern</button>
        </div>';
    }
    echo '</div>';
}