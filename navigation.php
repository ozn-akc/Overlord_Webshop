<div id="navigation" class="navbar fixed-top align-items-center border-bottom">
    <div id="links" class="col-3 d-flex">
        <div class="link-container">
            <h5 class="clickable" onclick="window.location.href='/web/'">
                Home
            </h5>
        </div>
        <div class="link-container dropdown">
            <h5 class="dropdown-toggle clickable" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                Shop
            </h5>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item clickable" href="/web/books/">Books</a></li>
                <li><a class="dropdown-item clickable" href="/web/nfts/">NFTs</a></li>
            </ul>
        </div>
        <div class="link-container">
            <h5 class="clickable" onclick="window.location.href='/web/news'">
                News
            </h5>
        </div>
        <div class="link-container">
            <h5 class="clickable" onclick="window.location.href='/web/docs'">
                Docs
            </h5>
        </div>
    </div>
    <div id="title" class="col-6 text-center fs-1">
        Seven Cirles
    </div>
    <div id="icons" class="col-3 d-flex justify-content-end icons-container">
        <?php
        if(isset($_COOKIE["loggedId"])){
            ?>
            <div class="icon-container">
                <span class="material-icons-round icon clickable" onclick="window.location.href='/web/account/'">account_circle</span>
            </div>
            <div class="icon-container">
                <div class="position-relative">
                    <span class="icon material-icons-outlined clickable" data-bs-toggle="dropdown" aria-expanded="false">shopping_bag</span>
                    <div class="dropdown-menu dropdown-menu-lg-end clickable">
                        <h2 class="text-center">Einkaufswagen</h2>
                        <ul class="overflow-auto ps-0 mb-0" id="cart-dropdown" style="width: 350px; max-height: 63vh;"></ul>
                    </div>
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" id="cartCount">
                    </span>
                </div>
            </div>
            <div class="icon-container">
                <span class="material-icons-round icon clickable" data-bs-toggle="modal" data-bs-target="#signOutModal">login</span>
            </div>
        <?php
        }else{
            ?>
            <div class="icon-container">
                <span class="material-icons-round icon clickable" data-bs-toggle="modal" data-bs-target="#signInModal">login</span>
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