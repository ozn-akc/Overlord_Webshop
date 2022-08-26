<?php
require __DIR__ . ('/../database.php');
$sql = "SELECT * FROM nfts";
$res = mysqli_query($my_db, $sql);

if(isset($_GET["id"])){
    $nftsql = "SELECT * FROM nfts WHERE id = '".$_GET["id"]."';";
    $nftres = mysqli_query($my_db, $nftsql);
    $item = mysqli_fetch_assoc($nftres);
    if(isset($item["id"])){
    ?>
    <div class="item-container d-flex flex-column justify-content-center align-items-center border-bottom">
        <div class="image-container">
            <img class="image clickable" src="<?php echo $item["url"]?>">
        </div>
        <div class="m-3"></div>
        <div class="m-3 col-12 d-flex justify-content-center">
            <button class="btn btn-light" style="width: 150px" onclick="downloadImage('<?php echo $item["url"]?>','<?php echo $item["name"]?>')">Download</button>
        </div>
    </div>
    <?php
    }
}
?>
<div class="d-flex flex-row flex-wrap justify-content-start">
<?php
if(isset($_GET["count"])){
    for($i = 0; $i < $_GET["count"]; $i++){
        $artikel = mysqli_fetch_assoc($res);
        ?>
    <div class="artikel-container">
        <div class="image-container" onclick="window.location.href='/web/nfts/?id=<?php echo $artikel["id"]?>'">
            <img class="image clickable" src="<?php echo $artikel["url"]?>">
        </div>
    </div>
        <?php
    }
}else{
    while($artikel = mysqli_fetch_assoc($res)){
        ?>
    <div class="artikel-container">
        <div class="image-container" onclick="window.location.href='/web/nfts/?id=<?php echo $artikel["id"]?>'">
            <img class="image clickable" src="<?php echo $artikel["url"]?>">
        </div>
    </div>
        <?php
    }
}
?>
</div>
