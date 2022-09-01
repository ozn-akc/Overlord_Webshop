<div id="navigation"  class="navbar fixed-top navbar-dark align-items-start">
    <div id="links" class="col-3 d-flex flex-row">
        <div class="me-3 ms-4">
            <h5 onclick="window.location.href='/web/'">
                Home
            </h5>
        </div>
        <div class="dropdown me-3 ms-2">
            <h5 class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                Shop
            </h5>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="/web/books/">Books</a></li>
                <li><a class="dropdown-item" href="/web/nfts/">NFTs</a></li>
            </ul>
        </div>
        <div class="me-3 ms-2">
            <h5 onclick="window.location.href='/web/news'">
                News
            </h5>
        </div>
        <div class="me-3 ms-2">
            <h5 onclick="window.location.href='/web/docs'">
                Docs
            </h5>
        </div>
    </div>
    <div id="logo" class="col-6 d-flex flex-column text-center clickable">
        <h1 class="clickable" onclick="window.location.href = '/web/'">Seven Circles</h1>
    </div>
    <div id="icons" class="col-3 d-flex justify-content-end pe-3">
        <?php
            if(isset($_COOKIE["loggedId"])){
                ?>
                <div class="icon-container">
                    <div class="position-relative">
                        <span class="icon material-icons-outlined clickable" data-bs-toggle="dropdown" aria-expanded="false">shopping_bag</span>
                        <div class="dropdown-menu dropdown-menu-lg-end clickable">
                            <h2 class="text-center">Einkaufswagen</h2>
                            <ul class="overflow-auto ps-0 mb-0" id="cart-dropdown" style="width: 350px; max-height: 63vh;"></ul>
                        </div>
                    </div>
                </div>
                <div class="icon-container clickable">
                    <span class="icon material-icons-outlined" onclick="window.location.href='/web/account/'">account_circle</span>
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