<div id="navigation"  class="navbar fixed-top" style="background-color: white">
    <div id="links" class="col-3 d-flex flex-row align-items-center">
        <div class="dropdown me-3 ms-2">
            <h5 class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                Shop
            </h5>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="/web/books/">Books</a></li>
                <li><a class="dropdown-item" href="/web/nfts/">NFTs</a></li>
                <li><a class="dropdown-item" href="/web/other/">Other</a></li>
            </ul>
        </div>
        <div class="dropdown me-3">
            <h5 class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                Shop
            </h5>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
        </div>
    </div>
    <div id="logo" class="col-6 text-center clickable">
        <h1 class="clickable" onclick="window.location.href = '/web/'">Webengineering Project</h1>
    </div>
    <div id="icons" class="col-3 d-flex justify-content-end pe-3">
        <?php
            if(isset($_COOKIE["loggedId"])){
                ?>
                <div class="icon-container">
                    <span class="icon material-icons-outlined clickable" data-bs-toggle="dropdown" aria-expanded="false">shopping_bag</span>
                    <div class="dropdown-menu dropdown-menu-lg-end me-2 clickable">
                        <h2 class="text-center">Einkaufswagen</h2>
                        <ul class="overflow-auto ps-0" id="cart-dropdown" style="width: 350px; max-height: 63vh;"></ul>
                    </div>
                </div>
                <div class="icon-container clickable">
                    <span class="icon material-icons-outlined">account_circle</span>
                </div>
                <div class="icon-container clickable">
                    <span class="icon material-icons-outlined" data-bs-toggle="modal" data-bs-target="#signOutModal">logout</span>
                </div>
        <?php
            } else{
            ?>
                <div class="icon-container clickable">
                    <span class="icon material-icons-outlined" data-bs-toggle="modal" data-bs-target="#signInModal">login</span>
                </div>
        <?php
            }
        ?>
    </div>
</div>
<?php
if(isset($_COOKIE["loggedId"])){
?>
<script>
    document.getElementById("cart-dropdown").addEventListener('click', function (event) {
        event.stopPropagation();
    });
</script>
<?php } ?>