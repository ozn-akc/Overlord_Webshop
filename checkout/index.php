<?php
include("../header.php");
?>
<body>
<?php
include("../navigation/navigation.php");
include("../account/signing.php");
?>
<div id="content" class="custom-container d-flex justify-content-start">
</div>
</body>
</html>
<script>
    function buyCart(){
        const xhr = new XMLHttpRequest();
        xhr.onreadystatechange = () =>{
            if(xhr.status==200){
                if(xhr.response == "-1"){
                    alert("You need a valid Address to buy this shit.")
                }else{
                    document.getElementById("content").innerHTML = xhr.response;
                }
            }
        }
        xhr.open("POST", "http://localhost/web/logic/cart/buyCart.php/");
        xhr.send(new FormData(userData));
        return false;
    }

    function loadShopCart(){
        const xhr = new XMLHttpRequest();
        xhr.onreadystatechange = () =>{
            if(xhr.status==200){
                if(xhr.response == "-1"){
                }else{
                    document.getElementById("content").innerHTML = xhr.response;
                }
            }
        }
        xhr.open("GET", "http://localhost/web/logic/cart/loadShopCart.php/");
        xhr.send();
    }
    loadShopCart();
</script>
<style>

</style>