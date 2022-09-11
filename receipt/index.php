<?php include("../header.php");?>
<div id="content" class="main-container overflow-auto d-flex flex-column justify-content-start align-items-center">
    <div class="col-8">
        <div class="fs-1 text-center">
            Receipt
        </div>
        <?php
        if(isset($_COOKIE["loggedId"])){
            require('../logic/database.php');
            $userId = $_COOKIE["loggedId"];
            $selectSql = "SELECT * FROM cart WHERE user_id = '" . $userId . "'";
            $selectResponse = mysqli_query($my_db, $selectSql);
            $rows = $selectResponse->num_rows;
            $count = 0;
            while($cartData = mysqli_fetch_assoc($selectResponse)){
                $selectSql = "SELECT * FROM artikel WHERE id = '" . $cartData["artikel_id"] . "';";
                $artikelResponse = mysqli_query($my_db, $selectSql);
                $artikelData = mysqli_fetch_assoc($artikelResponse);
                $count++;
        ?>
        <div class="d-flex flex-row cart-item <?php if($rows!=$count){echo "border-bottom";}?> p-1">
            <div class="pe-2 col-2 d-flex align-items-center">
                <a href="/web/artikel/?id=<?php echo $artikelData["id"]?>"><img class="p-1" src="<?php echo $artikelData["url"]?>" alt="shit" style="height: 12rem"></a>
            </div>
            <div class="ps-2 d-flex flex-column col-9 justify-content-center align-items-center">
                <div class="text-start fs-2"><?php echo $artikelData["name"]?></div>
            </div>
            <div class="col-1 d-flex p-1 align-items-center">
                <div class="fs-2"><?php echo $cartData["count"]?></div>
                <span class="material-icons-outlined icon">close</span>
            </div>
        </div>
        <?php
            }
        }
        $selectSql = "DELETE FROM cart WHERE user_id = '" . $userId . "'";
        $selectResponse = mysqli_query($my_db, $selectSql);
        ?>
    </div>
</div>
</body>
<script>
</script>
