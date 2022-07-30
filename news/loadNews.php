<?php
require('../database.php');
if(isset($_COOKIE["loggedInId"])){
    $user_id = $_COOKIE["loggedInId"];
}
$select = "SELECT * FROM `news`";
$result = mysqli_query($my_db, $select);
echo   '
        <div class="container-fluid text-center align-content-center justify-content-center" style="padding: 2rem">';
while($text = mysqli_fetch_assoc($result) ){
    echo '
            <div class="container-fluid d-flex flex-column text-center align-content-center align-items-center justify-content-center" style="padding: 1rem">
                <div class="col-8" style="border-width: 1px; border-style: solid; border-color: black;">
                    <div style="padding:1rem"></div>
                    <h2>'.$text["title"].'</h2>
                    <div style="padding:1rem"></div>
                    <div>
                        '.$text["description"].'
                    </div>
                    <div style="padding:1rem"></div>
                    <div>';
    if(isset($user_id)) {
        $selectNews = "SELECT * FROM `user_to_news` WHERE `user_id`=\"" . $user_id . "\" and `news_id`=\"" . $text["id"] . "\"";
        $newsResult = mysqli_query($my_db, $selectNews);
        $news = mysqli_fetch_assoc($newsResult);
        if(isset($news["user_id"])){
            echo '<button class="btn btn-secondary" onclick="modules.removeSub('.$text["id"].')">Unsubscribe</button>';
        }else{
            echo '<button class="btn btn-primary"  onclick="modules.addSub('.$text["id"].')">Subscribe</button>';
        }
    }else{
        echo '<button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#loginModal">Sie müssen sich zuerst Anmelden!</button>';
    }
    echo '                    </div>
                    <div style="padding:1rem"></div>
                </div>
            </div>';
}

echo '</div>';
