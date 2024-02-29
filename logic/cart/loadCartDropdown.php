<?php
if(isset($_COOKIE["loggedId"])) {
    require('../database.php');
    $userId = $_COOKIE["loggedId"];
    $hasData = false;
    $selectSql = "SELECT * FROM cart WHERE user_id = '" . $userId . "'";
    $selectResponse = mysqli_query($my_db, $selectSql);
    $addressSql = "SELECT * FROM address  WHERE user_id = '" . $userId . "'";
    $addressResponse = mysqli_query($my_db, $addressSql);
    $addressData = mysqli_fetch_assoc($addressResponse);
    $rows = $selectResponse->num_rows;
    $count = 0;
    while ($selectData = mysqli_fetch_assoc($selectResponse)) {
        $selectSql = "SELECT * FROM artikel WHERE id = '" . $selectData["artikel_id"] . "';";
        $artikelResponse = mysqli_query($my_db, $selectSql);
        $artikelData = mysqli_fetch_assoc($artikelResponse);
        $hasData = true;
        $count++;
        ?>
            <li class="d-block">
                  <div class="d-flex flex-row cart-item <?php if($rows!=$count){echo "border-bottom";}?> p-1">
                      <div class="pe-2 col-2 d-flex align-items-center">
                          <a href="/artikel/?id=<?php echo $artikelData["id"]?>"><img class="p-1" src="<?php echo $artikelData["url"]?>" alt="shit" style="height: 80px"></a>
                      </div>
                      <div class="ps-2 d-flex flex-column col-9 justify-content-center align-items-center">
                          <div class="text-start"><?php echo $artikelData["name"]?></div>
                          <div class="d-flex flex-row justify-content-center align-self-start border border-dark">
                              <span class="material-icons-outlined d-flex align-items-center me-2" style="font-size: 16px" onclick="removeFromCart(<?php echo $artikelData["id"]?>,loadCart)">remove</span>
                              <div><?php echo $selectData["count"]?></div>
                              <span class="material-icons-outlined d-flex align-items-center ms-2" style="font-size: 16px" onclick="addToCart(<?php echo $artikelData["id"]?>,loadCart)">add</span>
                          </div>
                      </div>
                      <div class="col-1 d-flex p-1 align-items-center">
                          <span class="material-icons-outlined" style="font-size: 20px" onclick="deleteFromCart(<?php echo $artikelData["id"]?>,loadCart)">close</span>
                      </div>
                  </div>
              </li>
        <?php
    }
    if ($hasData) {
        if(isset($addressData["user_id"])){
            ?>
            <li class="d-block text-center  mt-2"><Button class="btn btn-outline-dark col-10" onclick="window.location.href = '/receipt/'">Buy</Button>
            </li>
            <?php
        }else{
            ?>
            <li class="d-block text-center  mt-2"><Button class="btn btn-outline-dark col-10" onclick="alert('PLEASE ADD YOUR ADDRESS TO CONTINUE SHOPPING');window.location.href = '/account/'">Add Address</Button>
            </li>
            <?php
        }
    }
}