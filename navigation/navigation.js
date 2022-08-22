function addToCart(artikel_id){
    const xhr = new XMLHttpRequest();
    xhr.onreadystatechange = () =>{
        if(xhr.status==200 && xhr.readyState == 4){
            loadCart();
        }
    }
    const data = new FormData;
    data.append("user_id","5");
    data.append("artikel_id",artikel_id);
    data.append("anzahl","1");
    xhr.open("POST", "https://localhost/web/php/cart/addToCart.php");
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
    data.append("user_id","5");
    data.append("artikel_id",artikel_id);
    data.append("anzahl","-1");
    xhr.open("POST", "https://localhost/web/php/cart/addToCart.php");
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
    data.append("user_id","5");
    data.append("artikel_id",artikel_id);
    xhr.open("POST", "https://localhost/web/php/cart/deleteFromCart.php");
    xhr.send(data);
}
function loadCart(){
    const xhr = new XMLHttpRequest();
    xhr.onreadystatechange = () =>{
        if(xhr.status==200 && xhr.readyState == 4){
            document.getElementById("cart-dropdown").innerHTML = xhr.response;
        }
    }
    xhr.open("GET", "https://localhost/web/php/cart/loadCartDropdown.php/?user_id=5");
    xhr.send();
}
loadCart();