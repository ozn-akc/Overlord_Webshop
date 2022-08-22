<?php
require('../database.php');
$sql = "SELECT * FROM artikel WHERE id = ".$_GET["id"];
$res = mysqli_query($my_db, $sql);

if($artikel = mysqli_fetch_assoc($res)){
    echo '
    <div class="d-flex flex-row align-items-center justify-content-center">
        <div class="item-container col-3">
            <img class="image" src="'.$artikel["url"].'" alt="test">
        </div>
        <div class="item-container d-flex flex-column col-6">
            <h2 class="col-10 m-2 mb-5">
                '.$artikel["name"].'
            </h2>
            <div class="col-10 m-2 mb-5">
                '.$artikel["description"].'
            </div>
            <div class="col-10 m-2 mt-5 d-flex justify-content-center">
                <Button class="btn btn-primary col-4" onclick="addToCart('.$artikel["id"].')">ADD TO CART</Button>
            </div>
        </div>
    </div>
    ';
}