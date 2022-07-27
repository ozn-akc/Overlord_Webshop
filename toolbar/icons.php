<?php
if(session_id() == ''){
    session_start();
}
if(isset($_COOKIE["loggedInId"])){
    ?>
    <div class="icon clickable">
        <a href="https://localhost/web/user">
            <span class="material-icons" style="color: black!important;">account_circle</span>
        </a>
    </div>
    <div class="icon clickable">
        <span class="material-icons">shopping_cart</span>
    </div>
    <div class="icon clickable" data-bs-toggle="modal" data-bs-target="#logoutModal">
        <span class="material-icons">logout</span>
    </div>
<?php
} else{
?>
    <div class="icon clickable">
        <span class="material-icons">shopping_cart</span>
    </div>
    <div class="icon clickable" data-bs-toggle="modal" data-bs-target="#loginModal">
            <span class="material-icons">login</span>
    </div>
<?php
}
?>