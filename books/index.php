<?php
include ("../header.php");
?>
<body>
<?php
include("../navigation/navigation.php");
include ("../account/signing.php");
?>
<div id="content" class="custom-container d-flex justify-content-start flex-wrap">
</div>
</body>
</html>
<script>
    //wird so geladen, damit erstmal alle Bücher aus der Datenbank geladen werden
    function loadBooks(){
        const xhr = new XMLHttpRequest();
        xhr.onreadystatechange = () =>{
            if(xhr.status==200){
                document.getElementById("content").innerHTML = xhr.response;
            }
        }
        xhr.open("GET", "http://localhost/web/logic/shop/loadBooks.php");
        xhr.send();
    }
    loadBooks();
</script>
<style>
    .artikel-container{
        width: 20%;
        height: fit-content;
        margin: 1rem 2rem;
        display: flex;
        flex-wrap: wrap;
        flex-direction: column;
        align-items: center;
    }

    .image-container{
        position: relative;
        width: 12rem;
    }
    .image{
        opacity: 1;
        display: block;
        width: 100%;
        height: auto;
        transition: .5s ease;
        backface-visibility: hidden;
    }
    .middle {
        transition: .5s ease;
        opacity: 0;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        text-align: center;
    }
    .image-container:hover .image {
        opacity: 0.3;
    }
    .image-container:hover .middle {
        opacity: 1;
    }
    .title{
        width: 12rem;
    }
</style>