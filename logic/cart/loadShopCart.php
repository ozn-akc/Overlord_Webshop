<?php
if(isset($_COOKIE["loggedId"])) {
    require('../database.php');
    $userId = $_COOKIE["loggedId"];
    $selectCart = "SELECT * FROM cart WHERE user_id = '" . $userId . "'";
    $selectCartResponse = mysqli_query($my_db, $selectCart);

    $selectUser = "SELECT * FROM `user` WHERE `id` = \"" . $_COOKIE["loggedId"] . "\"";
    $userResult = mysqli_query($my_db, $selectUser);
    $user = mysqli_fetch_assoc($userResult);

    $selectAddr = "SELECT * FROM `address` WHERE `user_id` = \"" . $userId . "\"";
    $addrResult = mysqli_query($my_db, $selectAddr);
    $addr = mysqli_fetch_assoc($addrResult);
    if(isset($addr["plz"])){
        $selectCity = "SELECT * FROM `plz` WHERE `PLZ` = \"" . $addr["plz"] . "\"";
        $cityResult = mysqli_query($my_db, $selectCity);
        $city = mysqli_fetch_assoc($cityResult);
    }else{
        $addr["street"] = "";
        $addr["plz"] = "";
        $addr["number"] = "";
        $city["PLZ-ONAME"] = "";
    }
?>
    <div class="col mb-4">
        <div class="d-flex flex-row align-items-top" style="height: 6rem!important;">
            <span class="material-icons icon me-2" style="font-size: 36px!important;">home</span>
            <h2 class="col-11 mb-0">Shipping Address</h2>
        </div>
        <div class="d-flex flex-row align-items-center" style="height: calc(100vh - 16rem)!important;">
            <form class="col-10 mt-3 d-flex flex-column align-items-center justify-items-center" id="userData" onsubmit="return saveUserData()">
                <div class="col-8 d-flex flex-row mb-4 justify-content-start">
                    <div class="col-12">
                        <input type="text" class="form-control" id="nickname" name="nickname" placeholder="Nickname" value="<?php echo $user["nickname"];?>" disabled>
                    </div>
                    <div class="ms-3">
                        <span class="icon material-icons-outlined clickable" onclick="enableById('nickname')">edit</span>
                    </div>
                </div>
                <div class="col-8 d-flex flex-row mb-4 justify-content-start">
                    <div class="col-12 d-flex flex-column">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email Adresse" value="<?php echo $user["email"];?>" disabled>
                        <div class="invalid-feedback">
                            Es existiert bereits ein Account für diese Email.
                        </div>
                    </div>
                    <div class="ms-3">
                        <span class="icon material-icons-outlined clickable" onclick="enableById('email')">edit</span>
                    </div>
                </div>
                <div class="d-flex flex-column justify-content-center align-items-center mt-2 col-12">
                    <h2 class="text-center col-12 mb-4 mt-2">Address</h2>
                    <div class="col-8 d-flex flex-row mb-4 justify-content-start">
                        <div class="col-12">
                            <input type="text" class="form-control" id="street" name="street" placeholder="Street" value="<?php echo $addr["street"];?>" disabled>
                        </div>
                        <div class="ms-3">
                            <span class="icon material-icons-outlined clickable" onclick="enableById('street')">edit</span>
                        </div>
                    </div>
                    <div class="col-8 d-flex flex-row mb-4 justify-content-start">
                        <div class="col-12">
                            <input type="text" class="form-control" id="number" name="number" placeholder="Number" value="<?php echo $addr["number"];?>" disabled>
                        </div>
                        <div class="ms-3">
                            <span class="icon material-icons-outlined clickable" onclick="enableById('number')">edit</span>
                        </div>
                    </div>
                    <div class="col-8 d-flex flex-row mb-4 justify-content-start">
                        <div class="col-12">
                            <input type="text" class="form-control" id="city" name="city" placeholder="City" value="<?php echo $city["PLZ-ONAME"];?>" disabled>
                        </div>
                    </div>
                    <div class="col-8 d-flex flex-row mb-4 justify-content-start">
                        <div class="col-12 d-flex flex-column">
                            <input type="text" class="form-control" id="code" name="code" placeholder="Code" value="<?php echo $addr["plz"];?>" disabled oninput="loadAddress()">
                            <div class="invalid-feedback">
                                PLZ ist nicht valide.
                            </div>
                        </div>
                        <div class="ms-3">
                            <span class="icon material-icons-outlined clickable" onclick="enableById('code')">edit</span>
                        </div>
                    </div>
                </div>
                <input id="saveButton" type="submit" class="btn btn-light col-5 mt-3" value="Buy">
            </form>
        </div>
    </div>
    <div class="col">
        <div class="d-flex flex-row align-items-top" style="height: 6rem!important;">
            <span class="material-icons icon me-2" style="font-size: 36px!important;">check_box</span>
            <h2 class="col-11 mb-0">Order Summary</h2>
        </div>
        <div class="overflow-auto ps-0 mb-0" style="height: calc(100vh - 16rem)!important;">
<?php
    while ($cartData = mysqli_fetch_assoc($selectCartResponse)) {
        $selectArtikel = "SELECT * FROM artikel WHERE id = '" . $cartData["artikel_id"] . "';";
        $artikelResponse = mysqli_query($my_db, $selectArtikel);
        $artikelData = mysqli_fetch_assoc($artikelResponse);
        ?>

        <div class="d-flex flex-row cart-item border-bottom p-1">
            <div class="pe-2 col-2 d-flex align-items-center">
                <a href="/web/artikel/?id=<?php echo $cartData["artikel_id"] ?>"><img class="p-1 clickable" src="<?php echo $artikelData["url"] ?>" alt="shit" style="height: 160px"></a>
            </div>
            <div class="ps-2 d-flex flex-column col-9 justify-content-center align-items-center">
                <h3 class="text-start align-self-start"><?php echo $artikelData["name"]?></h3>
                <div class="d-flex flex-row justify-content-center align-self-start border border-dark">
                    <span class="material-icons-outlined d-flex align-items-center me-2 clickable p-2" style="font-size: 24px" onclick="removeFromCart(<?php echo $cartData["artikel_id"] ?>,loadShopCart)">remove</span>
                    <h5 class="d-inline-block align-middle" style="font-size: 24px!important; margin-bottom: 0px!important;"><?php echo $cartData["count"]?></h5>
                    <span class="material-icons-outlined d-flex align-items-center ms-2 clickable" style="font-size: 24px" onclick="addToCart(<?php echo $cartData["artikel_id"] ?>,loadShopCart)">add</span>
                </div>
            </div>
            <div class="col-1 d-flex p-1 align-items-center">
                <span class="material-icons-outlined" style="font-size: 40px" onclick="deleteFromCart(<?php echo $cartData["artikel_id"] ?>,loadShopCart)">close</span>
            </div>
        </div>
        <?php
    }
    ?>

        </div>
    </div>
<?php
}
