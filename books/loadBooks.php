<?php
require('../database.php');
$select = "SELECT * FROM `artikel`";
$result = mysqli_query($my_db, $select);
echo'<div class="container-fluid d-flex flex-wrap" style="padding: 1rem; justify-content: center;">';
if(isset($_POST['count'])){
    for($i = 0; $i<$_POST['count']; $i++) {
        $text = mysqli_fetch_assoc($result);
        echo '
            <div class="text-center" style="padding: 1rem;" style="width: 250px" >
                <div class="image-container clickable" onclick="modules.addToCart(' . $text["id"] . ', 1, true)">
                    <img class="image" src="http://localhost' . $text["url"] . '" alt="' . $text["name"] . '" style="width: 250px" >
                    <div class="middle">
                        <span class="material-icons" style="scale: 2">add</span>
                    </div>
                </div>
                <div style="padding-top: .5rem;"></div>
                <h6 style="width: 250px" >' . $text["name"] . '</h6>
            </div>';
    }
}else{
    while($text = mysqli_fetch_assoc($result)){
        echo '
            <div class="text-center" style="padding: 1rem;" style="width: 250px" >
                <div class="image-container clickable" onclick="modules.addToCart(' . $text["id"] . ', 1, true)">
                    <img class="image" src="http://localhost'.$text["url"].'" alt="'.$text["name"].'" style="width: 250px" >
                     <div class="middle">
                        <span class="material-icons" style="scale: 2">add</span>
                     </div>
                </div>
                <div style="padding-top: .5rem;"></div>
                <h6 style="width: 250px" >'.$text["name"].'</h6>
            </div>';
    }
}
echo '</div>';

