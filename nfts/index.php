<?php
include ("../header.php");
?>
<body>
<?php
include("../navigation/navigation.php");
include ("../account/signing.php");
?>
<div id="content" class="custom-container d-flex flex-column justify-content-start">
</div>
</body>
</html>
<script>
    function loadNFTs(){
        const searchParams = window.location.search;
        const xhr = new XMLHttpRequest();
        xhr.onreadystatechange = () =>{
            if(xhr.status==200){
                document.getElementById("content").innerHTML = xhr.response;
            }
        }
        xhr.open("GET", "https://localhost/web/logic/shop/loadNFTs.php/"+searchParams);
        xhr.send();
    }
    loadNFTs();
    function downloadImage(filename, name){
        var link = document.createElement("a");
        link.download = name;
        link.href = filename;
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
        delete link;
    }
</script>
<style>
    .item-container{
        height: 50vh;
    }

    .artikel-container{
        width: 20%;
        height: fit-content;
        padding: 2%;
        display: flex;
        flex-wrap: wrap;
        flex-direction: column;
        align-items: center;
    }

    .image-container{
        position: relative;
        width: fit-content;
    }
    .image{
        display: block;
        height: 300px;
    }
</style>