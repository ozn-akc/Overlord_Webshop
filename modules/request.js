export function loadHTML(elementId, scriptName, type){
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var ref = document.getElementById(elementId);
            ref.innerHTML = xhr.response;
        }
    };
    xhr.open(type, scriptName);
    return xhr;
}

export function loadToBody(scriptName){
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.body.innerHTML = document.body.innerHTML + xhr.response;
        }
    };
    xhr.open("GET", scriptName);
    return xhr;
}