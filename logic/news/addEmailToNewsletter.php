<?php
require('../database.php');
$safe_email = mysqli_real_escape_string($my_db, $_POST['email']);
$insertNewsletter = "INSERT INTO newsletter (email) VALUES (\"".$safe_email."\");";
echo $insertNewsletter;
mysqli_query($my_db, $insertNewsletter);