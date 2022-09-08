<?php
if(session_id() == ''){
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="http://localhost/web/style.css">
    <?php
    if(isset($_COOKIE["loggedId"])){
        require("logic/database.php");
        $userId = $_COOKIE["loggedId"];
        $selectUser = "SELECT * FROM user WHERE id = '".$userId."';";
        $userResult = mysqli_query($my_db, $selectUser);
        $user = mysqli_fetch_assoc($userResult);
        if($user["darkmode"]==1){
        ?>
        <link rel="stylesheet" href="http://localhost/web/darkmode.css">
            <?php
        }
    }
    ?>
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
    <script src="http://localhost/web/script.js"></script>
    <title>Very Real Online Shop</title>
</head>
<?php
include ("signing.php");
?>
    <body>
<?php include("navigation.php");?>