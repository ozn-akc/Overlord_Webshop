<?php include("../header.php");?>
<body>
<?php include("../navigation.php");?>
<div id="content" class="main-container d-flex flex-column justify-content-start">
</div>
</body>
<script>
    function loadNFTs(){
        const searchParams = window.location.search;
        const xhr = new XMLHttpRequest();
        xhr.onreadystatechange = () =>{
            if(xhr.status==200){
                document.getElementById("content").innerHTML = xhr.response;
            }
        }
        xhr.open("GET", "http://localhost/web/logic/shop/loadNFTs.php/"+searchParams);
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
    .artikel-container{
        min-width: 18rem;
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