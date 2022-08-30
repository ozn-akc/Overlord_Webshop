function loadArtikel(){
    const searchParams = window.location.search;
    const xhr = new XMLHttpRequest();
    xhr.onreadystatechange = () =>{
        if(xhr.status==200){
            document.getElementById("content").innerHTML = xhr.response;
        }
    }
    xhr.open("GET", "http://localhost/web/logic/shop/loadShopItem.php/"+searchParams);
    xhr.send();
}
loadArtikel();