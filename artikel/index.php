<?php include("../header.php");?>
<div id="content" class="main-container">
</div>
</body>
<script>
    function loadArtikel(){
        const searchParams = window.location.search;
        const xhr = new XMLHttpRequest();
        xhr.onreadystatechange = () =>{
            if(xhr.status==200){
                document.getElementById("content").innerHTML = xhr.response;
            }
        }
        xhr.open("GET", "../logic/shop/loadShopItem.php/"+searchParams);
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