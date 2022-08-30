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
<link rel="stylesheet" href="books.css">