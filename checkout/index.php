<?php
include("../header.php");
?>
<body>
<?php
include("../navigation/navigation.php");
include("../account/signing.php");
?>
<div id="content" class="custom-container d-flex justify-content-start">
    <div class="col mb-4">
        <h1>Shipping Address</h1>
    </div>
    <div class="col">
        <div class="d-flex flex-row align-items-center mb-5">
            <span class="material-icons icon" style="font-size: 36px!important;">check_box</span>
            <h2 class="col-11 mb-0">Order Summary</h2>
        </div>
        <div>
            <div class="d-flex flex-row cart-item border-bottom p-1">
                <div class="pe-2 col-2 d-flex align-items-center">
                    <a href="/web/artikel/?id=1""><img class="p-1" src="../resources/books/overlord/Overlord_Volume_1.png" alt="shit" style="height: 160px"></a>
                </div>
                <div class="ps-2 d-flex flex-column col-9 justify-content-center align-items-center">
                    <h3 class="text-start align-self-start">Overlord Volume 1</h3>
                    <div class="d-flex flex-row justify-content-center align-self-start border border-dark">
                        <span class="material-icons-outlined d-flex align-items-center me-2" style="font-size: 24px" onclick="removeFromCart(2)">remove</span>
                        <h5 style="font-size: 24px!important; margin-bottom: 0px!important;">1</h5>
                        <span class="material-icons-outlined d-flex align-items-center ms-2" style="font-size: 24px" onclick="addToCart(2)">add</span>
                    </div>
                </div>
                <div class="col-1 d-flex p-1 align-items-center">
                    <span class="material-icons-outlined" style="font-size: 40px" onclick="deleteFromCart(' . $selectData["artikel_id"] . ')">close</span>
                </div>
            </div>
            <div class="d-flex flex-row cart-item border-bottom p-1">
                <div class="pe-2 col-2 d-flex align-items-center">
                    <a href="/web/artikel/?id=2"'"><img class="p-1" src="../resources/books/overlord/Overlord_Volume_2.png" alt="shit" style="height: 160px"></a>
                </div>
                <div class="ps-2 d-flex flex-column col-9 justify-content-center align-items-center">
                    <h3 class="text-start align-self-start">Overlord Volume 2</h3>
                    <div class="d-flex flex-row justify-content-center align-self-start border border-dark">
                        <span class="material-icons-outlined d-flex align-items-center me-2" style="font-size: 24px" onclick="removeFromCart(2)">remove</span>
                        <h5 style="font-size: 24px!important; margin-bottom: 0px!important;">1</h5>
                        <span class="material-icons-outlined d-flex align-items-center ms-2" style="font-size: 24px" onclick="addToCart(2)">add</span>
                    </div>
                </div>
                <div class="col-1 d-flex p-1 align-items-center">
                    <span class="material-icons-outlined" style="font-size: 40px" onclick="deleteFromCart(' . $selectData["artikel_id"] . ')">close</span>
                </div>
            </div>
            <div class="d-flex flex-row cart-item p-1">
                <div class="pe-2 col-2 d-flex align-items-center">
                    <a href="/web/artikel/?id=3"'"><img class="p-1" src="../resources/books/overlord/Overlord_Volume_3.png" alt="shit" style="height: 160px"></a>
                </div>
                <div class="ps-2 d-flex flex-column col-9 justify-content-center align-items-center">
                    <h3 class="text-start align-self-start">Overlord Volume 3</h3>
                    <div class="d-flex flex-row justify-content-center align-self-start border border-dark">
                        <span class="material-icons-outlined d-flex align-items-center me-2" style="font-size: 24px" onclick="removeFromCart(2)">remove</span>
                        <h5 style="font-size: 24px!important; margin-bottom: 0px!important;">1</h5>
                        <span class="material-icons-outlined d-flex align-items-center ms-2" style="font-size: 24px" onclick="addToCart(2)">add</span>
                    </div>
                </div>
                <div class="col-1 d-flex p-1 align-items-center">
                    <span class="material-icons-outlined" style="font-size: 40px" onclick="deleteFromCart(' . $selectData["artikel_id"] . ')">close</span>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
<script>

</script>
<style>

</style>