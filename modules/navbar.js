import {loadHTML} from "./request.js";

export function loadIcons(){
    var xhr = loadHTML("icons", "./toolbar/icons.php", "GET")
    xhr.send();
}
