export function loadHTML(elementId, scriptName, type, reload){
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var ref = document.getElementById(elementId);
            ref.innerHTML = xhr.response;
            if(reload!=undefined){
                reload();
            }
        }
    };
    xhr.open(type, scriptName);
    return xhr;
}

export function loadToBody(scriptName, reload){
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.body.innerHTML = document.body.innerHTML + xhr.response;
            if(reload!=undefined){
                reload();
            }
        }
    };
    xhr.open("GET", scriptName);
    return xhr;
}

export function executePHP(scriptName, data, reload){
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            if(reload!=undefined){
                reload();
            }
        }
    };
    if(data != undefined){
        xhr.open("POST", scriptName);
        xhr.send(data);
    }else{
        xhr.open("GET", scriptName);
        xhr.send();
    }
}