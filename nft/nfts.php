<?php
if(session_id() == ''){
    session_start();
}
require('../database.php');
$phpdatabase = "SELECT * FROM `nfts`";
$result = mysqli_query($my_db, $phpdatabase);
if(isset($_POST['count'])){
    for($i = 0; $i<$_POST['count']; $i++){
        $text = mysqli_fetch_assoc($result);
        echo('<a href="https://localhost/web/nft/?id='.$text["id"].'"><img class="nft" src="'.$text["url"].'" alt="Logo"></a>
        ');
    }
}else{
    while ($text = mysqli_fetch_assoc($result)) {
        echo('<a href="https://localhost/web/nft/?id='.$text["id"].'"><img class="nft" src="'.$text["url"].'" alt="Logo"></a>
');
    }
}
?>