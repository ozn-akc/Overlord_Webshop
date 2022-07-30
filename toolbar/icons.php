<?php
if(session_id() == ''){
    session_start();
}
if(isset($_COOKIE["loggedInId"])){
    require('../database.php');
    $phpdatabase = "SELECT * FROM `cart` WHERE `user_id`= \"".$_COOKIE["loggedInId"]."\"";
    $result = mysqli_query($my_db, $phpdatabase);
    $count = 0;
    while($text = mysqli_fetch_assoc($result)){
     $count = $count + $text["count"];
    }
    if($count==0){
        echo '
            <div class="icon clickable">
                <a href="https://localhost/web/user">
                    <span class="material-icons" style="color: black!important;">account_circle</span>
                </a>
            </div>
            <div class="icon clickable" onclick="location.href=\'https://localhost/web/cart/\'">
                <div class="position-relative">
                    <span class="material-icons">shopping_cart</span>
                </div>
            </div>
            <div class="icon clickable" data-bs-toggle="modal" data-bs-target="#logoutModal">
                <span class="material-icons">logout</span>
            </div>';
    }else{
        echo '
            <div class="icon clickable">
                <a href="https://localhost/web/user">
                    <span class="material-icons" style="color: black!important;">account_circle</span>
                </a>
            </div>
            <div class="icon clickable" onclick="location.href=\'https://localhost/web/cart/\'">
                <div class="position-relative">
                    <span class="material-icons">shopping_cart</span>
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">'.
                    $count
                    .'<span class="visually-hidden">unread messages</span>
                    </span>
                </div>
            </div>
            <div class="icon clickable" data-bs-toggle="modal" data-bs-target="#logoutModal">
                <span class="material-icons">logout</span>
            </div>';
    }
} else{
    echo '
    <div class="icon clickable" data-bs-toggle="modal" data-bs-target="#loginModal">
            <span class="material-icons">login</span>
    </div>
    ';
}
?>