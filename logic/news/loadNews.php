<?php
require("../database.php");
$selectNews = "SELECT * FROM news";
$newsResult = mysqli_query($my_db, $selectNews);
?>
    <div class="d-flex flex-column col-6 mt-4">
<?php
if(isset($_COOKIE["loggedId"])) {
    $userId = $_COOKIE["loggedId"];
    while($news = mysqli_fetch_assoc($newsResult)){
        $selectSub = "SELECT * FROM user_to_news WHERE user_id =".$userId." AND news_id = ".$news["id"];
        $subResult = mysqli_query($my_db, $selectSub);
        $sub = mysqli_fetch_assoc($subResult);
        ?>
        <div class="border border-light p-4 text-center rounded-4 mb-4" style="height: fit-content;">
            <h1 class="mb-4">
                <?php echo $news["title"] ?>
            </h1>
            <h5 class="mb-4">
                <?php echo $news["description"] ?>
            </h5>
            <?php
            if(isset($sub["user_id"])) {
                ?>
                <button class="btn btn-dark col-4 border border-0" onclick="unsubscribe(<?php echo $userId.",".$news["id"] ?>)">Unsubscribe</button>
                <?php
            }else{
                ?>
                <button class="btn btn-light col-4 border border-0" onclick="subscribe(<?php echo $userId.",".$news["id"] ?>)">Subscribe</button>
                <?php
            }
            ?>
        </div>
        <?php
    }
}else{
    while($news = mysqli_fetch_assoc($newsResult)){
    ?>
        <div class="border border-light p-4 text-center rounded-4 mb-4" style="height: fit-content;">
            <h1 class="mb-4">
                <?php echo $news["title"] ?>
            </h1>
            <h5 class="mb-4">
                <?php echo $news["description"] ?>
            </h5>
            <button class="btn btn-light col-4" data-bs-toggle="modal" data-bs-target="#signInModal">Subscribe</button>
        </div>
<?php
    }
}
?>

        <form class="border border-light p-4 text-center rounded-4 mb-4 d-flex flex-column align-items-center" style="height: fit-content;" id="newsletter" onsubmit="return addEmailToNewsletter()">
            <h1 class="mb-4">
                Would you like to subscribe to the general Newsletter!
            </h1>
            <input type="email" class="form-control mb-4" style="width: 50%!important;" id="email" name="email" placeholder="Email Adresse" required>
            <button class="btn btn-light col-4" type="submit">Subscribe</button>
        </form>
    </div>
