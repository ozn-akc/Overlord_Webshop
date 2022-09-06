<?php
if(isset($_COOKIE["loggedId"])) {
    require('../database.php');
    $userId = $_COOKIE["loggedId"];
    $selectCart = "SELECT * FROM cart WHERE user_id = '" . $userId . "'";
    $selectCartResponse = mysqli_query($my_db, $selectCart);

    $selectAddr = "SELECT * FROM `address` WHERE `user_id` = \"" . $userId . "\"";
    $addrResult = mysqli_query($my_db, $selectAddr);
    $addr = mysqli_fetch_assoc($addrResult);

    if(!isset($addr["plz"])){
        $street = mysqli_real_escape_string($my_db, $_POST["street"]);
        $number = mysqli_real_escape_string($my_db, $_POST["number"]);
        $plz = mysqli_real_escape_string($my_db, $_POST["code"]);
        $insertAddr = "INSERT INTO address (user_id, street, number, plz) VALUES (\"".$userId."\",\"".$street."\",\"".$number."\",\"".$plz."\")";
        $insertResult = mysqli_query($my_db, $insertAddr);
    }else{echo "-1"; return;}
        include"../../header.php";
?>
        <div class="col-12 d-flex justify-content-center">
        <div class="col-6 pb-5">
            <div class="d-flex flex-row align-items-center justify-content-center text-center" style="height: 6rem!important;">
                <h2 class="col-11 mb-0">Order Confirmation</h2>
            </div>
            <div class="ps-0 mb-0 pb-5">
    <?php
    $rows = mysqli_num_rows($selectCartResponse);
    $count = 0;
    while ($cartData = mysqli_fetch_assoc($selectCartResponse)) {
        $count++;
        $selectArtikel = "SELECT * FROM artikel WHERE id = '" . $cartData["artikel_id"] . "';";
        $artikelResponse = mysqli_query($my_db, $selectArtikel);
        $artikelData = mysqli_fetch_assoc($artikelResponse);
        ?>
        <div class="d-flex flex-row cart-item <?php if($count!=$rows){echo "border-bottom";} ?> p-1">
            <div class="pe-2 col-2 d-flex align-items-center">
                <img class="p-1 clickable" src="<?php echo $artikelData["url"] ?>" alt="shit" style="height: 160px">
            </div>
            <div class="ps-3 d-flex flex-row col-10 justify-content-start align-items-center">
                <h3 class="mb-0 col-2"><?php echo $cartData["count"]?> X</h3>
                <h3 class="text-start mb-0"><?php echo $artikelData["name"]?></h3>
            </div>
        </div>
<?php
    }

    ?>
            </div>
        </div>
        </div>
    <?php
    $deleteSql = "DELETE FROM cart WHERE user_id = '" . $userId . "'";
    $deleteResponse = mysqli_query($my_db, $deleteSql);

}