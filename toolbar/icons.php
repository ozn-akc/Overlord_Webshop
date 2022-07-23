<?php
if(session_id() == ''){
    session_start();
}
if(isset($_COOKIE["loggedInId"])){
    ?>
    <div class="icon clickable">
        <span class="material-icons">search</span>
    </div>
    <div class="icon clickable">
        <span class="material-icons">shopping_cart</span>
    </div>
    <div class="icon clickable" >
        <span class="material-icons">logout</span>
    </div>
<?php
} else{
?>
    <div class="icon clickable">
        <span class="material-icons">search</span>
    </div>
    <div class="icon clickable">
        <span class="material-icons">shopping_cart</span>
    </div>
    <div class="icon clickable" data-bs-toggle="modal" data-bs-target="#loginModal">
            <span class="material-icons">login</span>
    </div>
<?php
}
?>