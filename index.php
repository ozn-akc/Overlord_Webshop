<?php
include ("header.php");
?>
<body>
<?php
include("navigation/navigation.php");
?>
<div id="content" class="custom-container d-flex justify-content-start">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#signInModal">
        Launch demo modal
    </button>

    <!-- Login Dialog -->
    <div class="modal fade" id="signInModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Anmelden</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form  class="needs-validation" id="signInData" onsubmit="return signIn()">
                    <div class="modal-body d-flex flex-row justify-content-center">
                        <div class="col-5 me-2">
                            <input type="text" class="form-control" id="email" name="email" placeholder="Email Adresse" required>
                            <div class="invalid-feedback">
                                Es existiert kein Account für diese Email
                            </div>
                        </div>
                        <div class="col-5 ms-2">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                            <div class="invalid-feedback">
                                Das Passwort ist falsch!
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Registrieren</button>
                        <button type="submit" class="btn btn-primary">Anmelden</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
<script>
    function signIn(){
        const xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (this.readyState === 4 && this.status === 200) {
                if (xhr.response == 0) {
                } else {
                    alert("Fehlgeschlagen");
                }
            }
        }
        xhr.open("POST", "https://localhost/web/php/loging/signIn.php");
        xhr.send(new FormData(signInData));
        return false;
    }
    function closeModal(id){
        let myModalEl = document.getElementById(id);
        let modal = bootstrap.Modal.getInstance(myModalEl)
        modal.hide();
    }
</script>