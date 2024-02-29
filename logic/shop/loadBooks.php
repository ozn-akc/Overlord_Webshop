<?php
include ("../URLLink.php");
require __DIR__ . ('/../database.php');
$sql = "SELECT * FROM artikel";
$res = mysqli_query($my_db, $sql);

while($artikel = mysqli_fetch_assoc($res)){
    if(isset($_COOKIE["loggedId"])){
        $buttonaction = 'onclick="addToCart('. $artikel["id"].',loadCart)"';
    }else{
        $buttonaction = 'data-bs-toggle="modal" data-bs-target="#signInModal"';
    }
    ?>
    <div class="artikel-container col">
        <div class="image-container" <?php echo $buttonaction?>>
            <div class="middle">
                <span class="material-icons-outlined" style="scale: 2">add</span>
            </div>
            <img class="image clickable" src="<?php echo $URLLINK.$artikel["url"]?>">
        </div>
        <div class="title mt-2 clickable" onclick="window.location.href = '/artikel/?id=<?php echo $artikel["id"]?>'">
            <?php echo $artikel["name"]?>
        </div>
    </div>
    <?php
}