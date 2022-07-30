import {loadHTML, loadToBody, executePHP} from "./modules/request.js";
modules.loadHTML = loadHTML;
modules.executePHP = executePHP;
function loadIcons(){
    const icons = loadHTML("icons", "https://localhost/web/toolbar/icons.php", "GET");
    icons.send();
}
function loadFramework(){
    const navbar = loadHTML("navbar", "https://localhost/web/navbar/navbar.html", "GET");
    const modals = loadToBody("https://localhost/web/login/loginModules.php");
    let data = new FormData();
    if(document.getElementById("nfts")!=undefined){
        const nfts = loadHTML("nfts", "https://localhost/web/nft/nfts.php", "POST");
        data.append('count', "10");
        nfts.send(data);
    }
    if(document.getElementById("books")!=undefined){
        const books = loadHTML("books", "https://localhost/web/books/loadBooks.php", "POST");
        data.append('count', "6");
        books.send(data);
    }
    if(document.getElementById("news")!=undefined){
        const news = loadHTML("news", "https://localhost/web/news/loadNews.php", "GET");
        news.send();
    }
    navbar.send();
    modals.send();
    loadIcons();
}
function addToCart(artikel_id, count, books){
    const data = new FormData;
    data.append("artikel_id", artikel_id);
    data.append("count", count);
    if(books==true){
        executePHP("https://localhost/web/books/addToCart.php", data, modules.loadIcons);
    }else{
        executePHP("https://localhost/web/books/addToCart.php", data, modules.loadShit);
    }
}
function removeFromChart(artikel_id, count){
    const data = new FormData;
    data.append("artikel_id", artikel_id);
    data.append("count", count);
    executePHP("https://localhost/web/books/removeFromCart.php", data, modules.loadShit);
}
function loadCart(){
    const cartItems = loadHTML("content", "https://localhost/web/cart/loadCart.php", "POST");
    cartItems.send();
}
function addSub(id){
    const data = new FormData;
    data.append("news_id", id );
    executePHP("https://localhost/web/news/subscribeToNews.php", data, modules.reloadPage);
}
function removeSub(id){
    const data = new FormData;
    data.append("news_id", id);
    executePHP("https://localhost/web/news/unsubFromNews.php", data, modules.reloadPage);
}
modules.loadCart = loadCart;
function loadShit(){
    modules.loadCart();
    modules.loadIcons();
}
function reloadPage(){
    window.location.reload(false);
}
loadFramework();
modules.loadIcons = loadIcons;
modules.addToCart = addToCart;
modules.removeFromChart = removeFromChart;
modules.addSub = addSub;
modules.removeSub = removeSub;
modules.loadShit = loadShit;
modules.reloadPage = reloadPage;