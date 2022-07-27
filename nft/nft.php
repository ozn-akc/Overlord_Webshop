<?php
if(session_id() == ''){
    session_start();
}
require('../database.php');
$phpdatabase = "SELECT * FROM `nfts` WHERE `id` = ".$_POST['id'];
$result = mysqli_query($my_db, $phpdatabase);
$nft = mysqli_fetch_assoc($result);
echo '
        <h2>'.$nft["name"].'</h2>
        <a href="'.$nft["url"].'"><img class="nft" src="'.$nft["url"].'" alt="Logo"></a>
        <h3>
        <button class="btn btn-primary" onclick="downloadImage(\''.$nft["url"].'\',\''.$nft["name"].'\')">Download</button>
        </h3>
';