<?php
if(isset($_COOKIE["loggedId"])) {
    require ("../database.php");
    $selectUser = "SELECT * FROM `user` WHERE `id` = \"" . $_COOKIE["loggedId"] . "\"";
    $userResult = mysqli_query($my_db, $selectUser);
    $user = mysqli_fetch_assoc($userResult);
    ?>
    <form class="col-4 mt-3 d-flex flex-column align-items-center justify-items-center" id="userData" onsubmit="return saveUserData()">
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
<?php

    $selectAddr = "SELECT * FROM `address` WHERE `user_id` = \"" . $_COOKIE["loggedId"] . "\"";
    $addrResult = mysqli_query($my_db, $selectAddr);
    $addr = mysqli_fetch_assoc($addrResult);

    $selectCity = "SELECT * FROM `plz` WHERE `PLZ` = \"" . $addr["plz"] . "\"";
    $cityResult = mysqli_query($my_db, $selectCity);
    $city = mysqli_fetch_assoc($cityResult);
?>

        <div class="d-flex flex-column justify-content-center align-items-center mt-5 col-12">
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
        <button id="saveUserData" type="submit" class="btn btn-light col-5 mt-3">Save</button>
    </form>

    <?php

}else{
    echo "-1";
}