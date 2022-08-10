<?php
if(isset($_COOKIE["loggedInId"])) {
    require('../database.php');
    $user_id = $_COOKIE["loggedInId"];
    $select = "SELECT * FROM `address` WHERE `user_id` = \"".$user_id."\"";
    $result = mysqli_query($my_db, $select);
    $text = mysqli_fetch_assoc($result);
    if (isset($text["user_id"])) {
        $plzSelect = "SELECT * FROM `plz` WHERE `PLZ` = \"" . $text["plz"] . "\"";
        $plzResult = mysqli_query($my_db, $plzSelect);
        $plzText = mysqli_fetch_assoc($plzResult);
        echo '
            <div class="container-fluid d-flex text-center align-content-center justify-content-center">
                <div class="col-8">
                    <div style="padding: 1rem"></div>
                    <h3>Adresse</h3>
                    <div class="d-flex text-center align-content-center justify-content-center" style="padding: 1rem">
                        <form class="row g-3 col-6 d-flex text-center align-content-center justify-content-center" id="address" onsubmit="return saveAddress()">
                            <div class="col-8">
                                <input class="form-control" name="street" id="street" placeholder="Straße" required oninput="validateInput(\'street\')" value="' . $text["street"] . '">
                            </div>
                            <div class="col-4">
                                <input class="form-control" name="number" id="number" placeholder="Hausnummer" required oninput="validateInput(\'number\')" value="' . $text["number"] . '">
                            </div>
                            <div class="col-md-8">
                                <input class="form-control" name="city" id="city" placeholder="Stadt" required value="' . $plzText["PLZ-ONAME"] . '" readonly style="background-color: #fff;">
                            </div>
                            <div class="col-md-4">
                                <input class="form-control" name="plz" id="plz" placeholder="PLZ" oninput="modules.searchCity()" max="99999" value="' . $text["plz"] . '">
                            </div>
                            <div class="d-flex text-center align-content-center justify-content-center">
                                <button class="btn btn-primary col-4" style="margin-right: 1rem;" onclick="deleteAddress()">Delete</button>
                                <button class="btn btn-primary col-4" style="margin-left: 1rem;" type="submit">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>';
    }else{
        echo '
            <div class="container-fluid d-flex text-center align-content-center justify-content-center">
                <div class="col-8">
                    <div style="padding: 1rem"></div>
                    <h3>Adresse</h3>
                    <div class="d-flex text-center align-content-center justify-content-center" style="padding: 1rem">
                        <form class="row g-3 col-6 d-flex text-center align-content-center justify-content-center" id="address" onsubmit="return saveAddress()">
                            <div class="col-8">
                                <input class="form-control is-invalid" name="street" id="street" placeholder="Straße" required oninput="validateInput(\'street\')">
                            </div>
                            <div class="col-4">
                                <input class="form-control is-invalid" name="number" id="number" placeholder="Hausnummer" required oninput="validateInput(\'number\')">
                            </div>
                            <div class="col-md-8">
                                <input class="form-control" name="city" id="city" placeholder="Stadt" required readonly style="background-color: #fff;">
                            </div>
                            <div class="col-md-4">
                                <input class="form-control is-invalid" name="plz" id="plz" placeholder="PLZ" oninput="modules.searchCity()" max="99999">
                            </div>
                            <div class="col-8">
                                <button class="btn btn-primary col-12" type="submit">Speichern</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>';
    }
}