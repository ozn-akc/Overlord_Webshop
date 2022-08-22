<?php
if(isset($_COOKIE["loggedId"])){
    setcookie("loggedId", "", array(
        'path' => '/',
        'expires' => time()-3600,
        'secure' => true,
        'samesite' => 'lax'
    ));
    echo 1;
}else{
    echo -1;
}
