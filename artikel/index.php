<?php
include ("../header.php");
?>
<body>
<?php
include("../navigation/navigation.php");
?>
<div id="content" class="custom-container d-flex justify-content-start">
</div>
</body>
</html>
<script>
    function loadArtikel(){
        const searchParams = window.location.search;
        const xhr = new XMLHttpRequest();
        const data = new FormData;
        xhr.onreadystatechange = () =>{
            if(xhr.status==200){
                document.getElementById("content").innerHTML = xhr.response;
            }
        }
        xhr.open("GET", "https://localhost/web/php/shop/loadShopItem.php/"+searchParams);
        xhr.send();
    }
    loadArtikel();
</script>
<style>
    .item-container{
        margin: 2rem;
    }

    .image{
        width: 100%;
    }
</style>