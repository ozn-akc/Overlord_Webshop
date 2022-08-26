<?php
include ("../header.php");
?>
<body>
<?php
include("../navigation/navigation.php");
include ("../account/signing.php");
?>
<div id="content" class="custom-container d-flex flex-column justify-content-start">
    <div class="item-container d-flex flex-column justify-content-center align-items-center">
        <div class="image-container">
            <img class="image clickable" style="width: 18rem" src="../resources/nfts/masked_1.png">
        </div>
        <div class="m-5">
            <button class="btn btn-primary">Download</button>
        </div>
        <div class="m-5 border-end">

        </div>
    </div>
    <div class="d-flex flex-row flex-wrap justify-content-start">
        <div class="artikel-container">
            <div class="image-container">
                <img class="image clickable" src="../resources/nfts/masked_1.png">
            </div>
        </div>
        <div class="artikel-container">
            <div class="image-container">
                <img class="image clickable" src="../resources/nfts/masked_1.png">
            </div>
        </div>
        <div class="artikel-container">
            <div class="image-container">
                <img class="image clickable" src="../resources/nfts/masked_1.png">
            </div>
        </div>
        <div class="artikel-container">
            <div class="image-container">
                <img class="image clickable" src="../resources/nfts/masked_1.png">
            </div>
        </div>
        <div class="artikel-container">
            <div class="image-container">
                <img class="image clickable" src="../resources/nfts/masked_1.png">
            </div>
        </div>
        <div class="artikel-container">
            <div class="image-container">
                <img class="image clickable" src="../resources/nfts/masked_1.png">
            </div>
        </div>
        <div class="artikel-container">
            <div class="image-container">
                <img class="image clickable" src="../resources/nfts/masked_1.png">
            </div>
        </div>
    </div>
</div>
</body>
</html>
<script>
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
        width: 100%;
        height: 100%;
    }
</style>