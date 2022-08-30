function addToCart(artikel_id){
    const xhr = new XMLHttpRequest();
    xhr.onreadystatechange = () =>{
        if(xhr.status==200 && xhr.readyState == 4){
            loadCart();
        }
    }
    const data = new FormData;
    data.append("artikel_id",artikel_id);
    data.append("anzahl","1");
    xhr.open("POST", "http://localhost/web/logic/cart/addToCart.php");
    xhr.send(data);
}
function removeFromCart(artikel_id){
    const xhr = new XMLHttpRequest();
    xhr.onreadystatechange = () =>{
        if(xhr.status==200 && xhr.readyState == 4){
            loadCart();
        }
    }
    const data = new FormData;
    data.append("artikel_id",artikel_id);
    data.append("anzahl","-1");
    xhr.open("POST", "http://localhost/web/logic/cart/addToCart.php");
    xhr.send(data);
}
function deleteFromCart(artikel_id){
    const xhr = new XMLHttpRequest();
    xhr.onreadystatechange = () =>{
        if(xhr.status==200 && xhr.readyState == 4){
            loadCart();
        }
    }
    const data = new FormData;
    data.append("artikel_id",artikel_id);
    xhr.open("POST", "http://localhost/web/logic/cart/deleteFromCart.php");
    xhr.send(data);
}
function loadCart(){
    const xhr = new XMLHttpRequest();
    xhr.onreadystatechange = () =>{
        if(xhr.status==200 && xhr.readyState == 4){
            if(document.getElementById("cart-dropdown") != null){
                document.getElementById("cart-dropdown").innerHTML = xhr.response;
            }
        }
    }
    xhr.open("GET", "http://localhost/web/logic/cart/loadCartDropdown.php/");
    xhr.send();
}
loadCart();