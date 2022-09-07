/*
Hier kommen globale Funktionen rein
 */
function addToCart(artikel_id, func){
    const xhr = new XMLHttpRequest();
    xhr.onreadystatechange = () =>{
        if(xhr.status==200 && xhr.readyState == 4){
            func();
        }
    }
    const data = new FormData;
    data.append("artikel_id",artikel_id);
    data.append("anzahl","1");
    xhr.open("POST", "http://localhost/web/logic/cart/addToCart.php");
    xhr.send(data);
}
function removeFromCart(artikel_id, func){
    const xhr = new XMLHttpRequest();
    xhr.onreadystatechange = () =>{
        if(xhr.status==200 && xhr.readyState == 4){
            func();
        }
    }
    const data = new FormData;
    data.append("artikel_id",artikel_id);
    data.append("anzahl","-1");
    xhr.open("POST", "http://localhost/web/logic/cart/addToCart.php");
    xhr.send(data);
}
function deleteFromCart(artikel_id, func){
    const xhr = new XMLHttpRequest();
    xhr.onreadystatechange = () =>{
        if(xhr.status==200 && xhr.readyState == 4){
            func();
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
                loadCartCount();
            }
        }
    }
    xhr.open("GET", "http://localhost/web/logic/cart/loadCartDropdown.php/");
    xhr.send();
}
loadCart();

function loadCartCount(){
    const xhr = new XMLHttpRequest();
    xhr.onreadystatechange = () =>{
        if(xhr.status==200 && xhr.readyState == 4){
            if(document.getElementById("cartCount") != null){
                document.getElementById("cartCount").innerText = xhr.response;
            }
        }
    }
    xhr.open("GET", "http://localhost/web/logic/cart/getCartCount.php");
    xhr.send();
}