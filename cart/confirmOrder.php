<?php
if(isset($_COOKIE["loggedInId"])) {
    require('../database.php');
    $user_id = $_COOKIE["loggedInId"];
    $select = "SELECT * FROM `cart` WHERE `user_id`= \"" . $user_id . "\"";
    $result = mysqli_query($my_db, $select);
    echo   '
            <!DOCTYPE html>
            <html lang="de">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <link rel="stylesheet" href="../style.css">
                <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
                <script src="../login/login.js" type="text/javascript"></script>
                <script src="../modules.js" type="module"></script>
                <title>Very Real Online Shop</title>
            </head>
            <body>
            <div class="container-fluid text-center" style="padding: 2rem">
                <h1>Receipt</h1>
            </div>
            <div class="container-fluid align-content-center justify-content-center" style="padding: 2rem">';
    while($text = mysqli_fetch_assoc($result)) {
        if ($text["count"] > 0) {
            $selectArtikel = "SELECT * FROM `artikel` WHERE `id`=\"" . $text["artikel_id"] . "\"";
            $artikelResult = mysqli_query($my_db, $selectArtikel);
            $artikel = mysqli_fetch_assoc($artikelResult);
            echo '
                <div class="d-flex align-content-center justify-content-center" style="padding: 1rem">
                  <div class="col-3 d-flex">
                    <img class="image" src="'.$artikel["url"].'" alt="" style="width: 4rem" >
                    <div class="d-flex justify-content-center flex-column" style="width: 100%">
                    <div style="display: block ruby;">
                        <div class="col-1" style="text-align: center">
                            '.$text["count"].'x 
                        </div>
                        <div  class="col-4">
                        '.$artikel["name"].'
                        </div>
                    </div>
                    </div>
                  </div>
                </div>';
        }
    }
    echo '</div>
        </body>';
}