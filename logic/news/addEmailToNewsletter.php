<?php
require('../database.php');
$safe_email = mysqli_real_escape_string($my_db, $_POST['email']);
$insertNewsletter = "INSERT INTO newsletter (email) VALUES (\"".$safe_email."\");";
try{
    mysqli_query($my_db, $insertNewsletter);
}catch(Exception $exception){

}