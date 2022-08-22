<div id="navigation"  class="navbar">
    <div id="links" class="col-3 d-flex flex-row align-items-center">
        <div class="dropdown me-3 ms-2">
            <h5 class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                Shop
            </h5>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="/web/men/">Men</a></li>
                <li><a class="dropdown-item" href="/web/women/">Women</a></li>
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
    <div id="logo" class="col-6 text-center">
        <h1>Webengineering Project</h1>
    </div>
    <div id="icons" class="col-3 d-flex justify-content-end">
        <div class="m-2">
            <span class="icon material-icons-outlined" data-bs-toggle="dropdown" aria-expanded="false">shopping_bag</span>
            <div class="dropdown-menu dropdown-menu-lg-end me-2">
                <h2 class="text-center">Einkaufswagen</h2>
                <ul class="overflow-auto ps-0" id="cart-dropdown" style="width: 350px; height: 66vh"></ul>
            </div>
        </div>
        <span class="icon material-icons-outlined m-2">account_circle</span>
    </div>
</div>
<script>
    document.getElementById("cart-dropdown").addEventListener('click', function (event) {
        event.stopPropagation();
    });
</script>