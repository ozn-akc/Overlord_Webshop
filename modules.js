import {loadHTML, loadToBody, executePHP} from "./modules/request.js";
modules.loadHTML = loadHTML;
function loadIcons(){
    const icons = loadHTML("icons", "https://localhost/web/toolbar/icons.php", "GET");
    icons.send();
}
function loadFramework(){
    const navbar = loadHTML("navbar", "https://localhost/web/navbar/navbar.html", "GET");
    const modals = loadToBody("https://localhost/web/login/loginModules.php");
    const nfts = loadHTML("nfts", "https://localhost/web/nft/nfts.php", "POST");
    const books = loadHTML("books", "https://localhost/web/books/loadBooks.php", "POST");
    navbar.send();
    modals.send();
    let data = new FormData();
    data.append('count', "10");
    nfts.send(data);
    data.append('count', "6");
    books.send(data);
    loadIcons();
}
function addToCart(artikel_id, count){
    const data = new FormData;
    data.append("artikel_id", artikel_id);
    data.append("count", count);
    executePHP("https://localhost/web/books/addToCart.php", data);
    modules.loadIcons();
}
loadFramework();
modules.loadIcons = loadIcons;
modules.addToCart = addToCart;