function signUp(){
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            modules.loadIcons();
            if(xhr.response==0){
                alert("Fehlgeschlagen");
            }else if(xhr.response==1){
                alert("Erfolgreich");
            }
        }
    };
    xhr.open("POST", "./login/signUp.php");
    var data = new FormData(signUpData);
    xhr.send(data);
    closeModal("registerModal");
    return false;
}
function signIn(){
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            modules.loadIcons();
            if(xhr.response==0){
                alert("Fehlgeschlagen");
            }else if(xhr.response==1){
                alert("Erfolgreich");
            }
        }
    };
    xhr.open("POST", "./login/signIn.php");
    var data = new FormData(signInData);
    xhr.send(data);
    closeModal("loginModal");
    return false;
}
function signOut(){
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            modules.loadIcons();
            if(xhr.response==0){
                alert("Fehlgeschlagen");
            }else if(xhr.response==1){
                alert("Erfolgreich");
            }
        }
    };
    xhr.open("POST", "./login/signOut.php");
    xhr.send();
    closeModal("logoutModal");
    return false;
}
function closeModal(id){
    var myModalEl = document.getElementById(id);
    var modal = bootstrap.Modal.getInstance(myModalEl)
    modal.hide();
}