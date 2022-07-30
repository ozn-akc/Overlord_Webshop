function signUp(){
    let xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
            if(xhr.response==1){
                closeModal("registerModal");
                modules.loadIcons();
            }else{
                alert("Fehlgeschlagen");
            }
        }
    };
    xhr.open("POST", "https://localhost/web/login/signUp.php");
    let data = new FormData(signUpData);
    xhr.send(data);
    return false;
}
function signIn(){
    let xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
            if(xhr.response==1){
                closeModal("loginModal");
                modules.loadIcons();
            }else{
                alert("Fehlgeschlagen");
            }
        }
    };
    xhr.open("POST", "https://localhost/web/login/signIn.php");
    let data = new FormData(signInData);
    xhr.send(data);
    return false;
}
function signOut(){
    let xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
            if(xhr.response==1){
                closeModal("logoutModal");
                modules.loadIcons();
            }else{
                alert("Fehlgeschlagen");
            }
        }
    };
    xhr.open("POST", "https://localhost/web/login/signOut.php");
    xhr.send();
    return false;
}
function closeModal(id){
    let myModalEl = document.getElementById(id);
    let modal = bootstrap.Modal.getInstance(myModalEl)
    modal.hide();
}