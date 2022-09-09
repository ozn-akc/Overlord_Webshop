<?php
require('../database.php');
$sql = "SELECT * FROM artikel WHERE id = ".mysqli_real_escape_string($my_db, $_GET["id"]);
$res = mysqli_query($my_db, $sql);

if($artikel = mysqli_fetch_assoc($res)){
    if(isset($_COOKIE["loggedId"])){
        $buttonaction = 'onclick="addToCart('. $artikel["id"].',loadCart)"';
    }else{
        $buttonaction = 'data-bs-toggle="modal" data-bs-target="#signInModal"';
    }
    ?>
    <div class="d-flex flex-row align-items-center justify-content-center">
        <div class="item-container col-3">
            <img class="image" src="<?php echo $artikel["url"] ?>" alt="test">
        </div>
        <div class="item-container d-flex flex-column col-6">
            <h2 class="col-10 m-2 mb-5">
                <?php echo $artikel["name"] ?>
            </h2>
            <div class="col-10 m-2 mb-5">
                <?php echo $artikel["description"] ?>
            </div>
            <div class="col-10 m-2 mt-5 d-flex justify-content-center">
                <Button class="btn btn-outline-dark col-4" <?php echo $buttonaction ?>)>ADD TO CART</Button>
            </div>
        </div>
    </div>
    <?php
}