<?php
require __DIR__ . ('/../database.php');
$sql = "SELECT * FROM artikel";
$res = mysqli_query($my_db, $sql);
if(isset($_GET["count"])){
    for($i = 0; $i < $_GET["count"]; $i++){
        $artikel = mysqli_fetch_assoc($res);
        ?>
        <div class="artikel-container">
            <div class="image-container" onclick="addToCart(<?php echo $artikel["id"]?>)">
                <div class="middle">
                    <span class="material-icons-outlined" style="scale: 2">add</span>
                </div>
                <img class="image clickable" src="<?php echo $artikel["url"]?>">
            </div>
            <div class="title mt-2 clickable" onclick="window.location.href = '/web/artikel/?id=<?php echo $artikel["id"]?>'">
                <?php echo $artikel["name"]?>
            </div>
        </div>
        <?php
    }
}else{
    while($artikel = mysqli_fetch_assoc($res)){
        ?>
        <div class="artikel-container">
            <div class="image-container" onclick="addToCart(<?php echo $artikel["id"]?>)">
                <div class="middle">
                    <span class="material-icons-outlined" style="scale: 2">add</span>
                </div>
                <img class="image clickable" src="<?php echo $artikel["url"]?>">
            </div>
            <div class="title mt-2 clickable" onclick="window.location.href = '/web/artikel/?id=<?php echo $artikel["id"]?>'">
                <?php echo $artikel["name"]?>
            </div>
        </div>
        <?php
    }
}
?>
