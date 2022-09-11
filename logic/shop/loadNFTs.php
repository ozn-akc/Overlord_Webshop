<?php

include ("../../URLLink.php");
require __DIR__ . ('/../database.php');

if(isset($_GET["id"])){
    $nftId = mysqli_real_escape_string($my_db, $_GET["id"]);
    $nftsql = "SELECT * FROM nfts WHERE id = '".$nftId."';";
    $nftres = mysqli_query($my_db, $nftsql);
    $item = mysqli_fetch_assoc($nftres);
    if(isset($item["id"])){
        ?>
        <div class="item-container d-flex flex-column justify-content-center align-items-center border-bottom">
            <div class="image-container">
                <img class="image clickable" src="<?php echo $URLLINK.$item["url"]?>">
            </div>
            <div class="m-3"></div>
            <div class="m-3 col-12 d-flex justify-content-center">
                <button class="btn btn-light" style="width: 150px" onclick="downloadImage('<?php echo $item["url"]?>','<?php echo $item["name"]?>')">Download</button>
            </div>
        </div>
        <?php
    }
}
if(isset($_GET["id"])){
    $sql = "SELECT * FROM nfts where id != '".$nftId."'";
}else{
    $sql = "SELECT * FROM nfts";
}
$res = mysqli_query($my_db, $sql);
?>
<div class="d-flex flex-row flex-wrap justify-content-start">
<?php
while($artikel = mysqli_fetch_assoc($res)){
?>
    <div class="artikel-container col">
        <div class="image-container" onclick="window.location.href='<?php echo $URLLINK ?>nfts?id=<?php echo $artikel["id"]?>'">
            <img class="image clickable" src="<?php echo $URLLINK.$artikel["url"]?>">
        </div>
    </div>
    <?php
    }
    ?>
</div>