<!-- Login Dialog -->
<div class="modal fade" id="signInModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Anmelden</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form  class="needs-validation" id="signInData" onsubmit="return signIn()">
                <div class="modal-body d-flex flex-row justify-content-center">
                    <div class="col-5 me-2">
                        <input type="email" class="form-control" id="email1" name="email" placeholder="Email Adresse" required>
                        <div class="invalid-feedback">
                            Es existiert kein Account für diese Email
                        </div>
                    </div>
                    <div class="col-5 ms-2">
                        <input type="password" class="form-control" id="password1" name="password" placeholder="Password" required>
                        <div class="invalid-feedback">
                            Das Passwort ist falsch!
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-light" data-bs-toggle="modal" data-bs-target="#signUpModal">Registrieren</button>
                    <button type="submit" class="btn btn-outline-light">Anmelden</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- SignUp Dialog -->
<div class="modal fade" id="signUpModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Registrieren</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form  class="needs-validation" id="signUpData" onsubmit="return signUp()">
                <div class="modal-body d-flex flex-column justify-content-center align-items-center">
                    <div class="col-8 mb-2">
                        <input type="text" class="form-control" id="name2" name="name" placeholder="Name">
                    </div>
                    <div class="col-8 mb-2 mt-2">
                        <input type="email" class="form-control" id="email2" name="email" placeholder="Email Adresse" required>
                        <div class="invalid-feedback">
                            Es existiert bereits ein Account für diese Email
                        </div>
                    </div>
                    <div class="col-8 mt-2">
                        <input type="password" class="form-control" id="password2" name="password" placeholder="Password" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-outline-light">Registrieren</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- SignOut Dialog -->
<div class="modal fade" id="signOutModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Abmelden</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form  class="needs-validation" id="signOutData" onsubmit="return signOut()">
                <div class="modal-footer">
                    <button type="submit" class="btn btn-outline-light">Abmelden</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    function signIn(){
        const xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (this.readyState === 4 && this.status === 200) {
                if(xhr.response==-1){
                    closeModal("signInModal");
                    alert("Already logged in");
                }else if(xhr.response==0) {
                    document.getElementById("password1").className = "form-control";
                    document.getElementById("email1").className = "form-control";
                    closeModal("signInModal");
                    window.location.reload();
                }else if(xhr.response==1){
                    document.getElementById("password1").className = "form-control is-invalid";
                    document.getElementById("email1").className = "form-control";
                }else if(xhr.response==2){
                    document.getElementById("email1").className = "form-control is-invalid";
                    document.getElementById("password1").className = "form-control";
                }
            }
        }
        xhr.open("POST", "http://localhost/web/logic/loging/signIn.php");
        xhr.send(new FormData(signInData));
        return false;
    }
    function signUp(){
        const xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (this.readyState === 4 && this.status === 200) {
                if(xhr.response==0) {
                    closeModal("signUpModal");
                }else if(xhr.response==1){
                    document.getElementById("password2").className = "form-control";
                    document.getElementById("email2").className = "form-control is-invalid";
                }
            }
        }
        xhr.open("POST", "http://localhost/web/logic/loging/signUp.php");
        xhr.send(new FormData(signUpData));
        return false;
    }
    function signOut(){
        const xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (this.readyState === 4 && this.status === 200) {
                if(xhr.response==-1){
                    alert("Sie sind nicht angemeldet, weshalb wir sie nicht abmelden können.")
                }else{
                    closeModal("signOutModal");
                    window.location.reload();
                }
            }
        }
        xhr.open("POST", "http://localhost/web/logic/loging/signOut.php");
        xhr.send(new FormData(signOutData));
        return false;
    }
    function closeModal(id){
        let myModalEl = document.getElementById(id);
        let modal = bootstrap.Modal.getInstance(myModalEl)
        modal.hide();
    }
</script>