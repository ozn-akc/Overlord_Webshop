function loadNavigation(){
    document.getElementById("icons").reload(true);
}

function enableById(elementId){
    document.getElementById(elementId).disabled = !document.getElementById(elementId).disabled;
}