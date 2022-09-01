<?php
if(isset($_COOKIE["loggedId"])) {
    require('../database.php');
    $userId = $_COOKIE["loggedId"];
    $hasData = false;
    $selectSql = "SELECT * FROM cart WHERE user_id = '" . $userId . "'";
    $selectResponse = mysqli_query($my_db, $selectSql);

    while ($selectData = mysqli_fetch_assoc($selectResponse)) {
        $selectSql = "SELECT * FROM artikel WHERE id = '" . $selectData["artikel_id"] . "';";
        $artikelResponse = mysqli_query($my_db, $selectSql);
        $artikelData = mysqli_fetch_assoc($artikelResponse);
        $hasData = true;
        echo '
            <li class="d-block">
                  <div class="d-flex flex-row cart-item border-bottom p-1">
                      <div class="pe-2 col-2 d-flex align-items-center">
                          <a href="/web/artikel/?id='.$selectData["artikel_id"].'"><img class="p-1" src="' . $artikelData["url"] . '" alt="shit" style="height: 80px"></a>
                      </div>
                      <div class="ps-2 d-flex flex-column col-9 justify-content-center align-items-center">
                          <div class="text-start">' . $artikelData["name"] . '</div>
                          <div class="d-flex flex-row justify-content-center align-self-start border border-dark">
                              <span class="material-icons-outlined d-flex align-items-center me-2" style="font-size: 16px" onclick="removeFromCart(' . $selectData["artikel_id"] . ')">remove</span>
                              <div>' . $selectData["count"] . '</div>
                              <span class="material-icons-outlined d-flex align-items-center ms-2" style="font-size: 16px" onclick="addToCart(' . $selectData["artikel_id"] . ')">add</span>
                          </div>
                      </div>
                      <div class="col-1 d-flex p-1">
                          <span class="material-icons-outlined" style="font-size: 20px" onclick="deleteFromCart(' . $selectData["artikel_id"] . ')">close</span>
                      </div>
                  </div>
              </li>
        ';
    }
    if ($hasData) {
        ?>
            <li class="d-block text-center  mt-2"><Button class="btn btn-light col-10" onclick="window.location.href = '/web/cart/'">Kaufen</Button>
            </li>
        <?php
    }
}