<?php
?><div class="modal login fade" id="loginModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Anmelden</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form class="needs-validation" id="signInData" onsubmit="return signIn()">
          <div class="modal-body d-flex justify-content-lg-center align-content-center">
              <div class="col-6" style="padding: 4px">
                  <input class="form-control" name="email" type="email" placeholder="Email-Adresse" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required>
              </div>
              <div class="col-6" style="padding: 4px">
                  <input class="form-control" name="password" type="password" placeholder="Passwort" required>
              </div>
          </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-bs-target="#registerModal" data-bs-toggle="modal" data-bs-dismiss="modal">Registrieren</button>
            <button class="btn btn-primary" type="submit">Anmelden</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <div class="modal fade" id="registerModal" aria-hidden="true" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Registieren</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form class="form-control" id="signUpData" onsubmit="return signUp()">
            <div class="modal-body d-flex flex-wrap justify-content-lg-center align-content-center">
                <div class="col-8" style="padding: 4px">
                    <input class="form-control" name="nickname" type="text" placeholder="Nickname" >
                </div>
                <div class="col-6" style="padding: 4px">
                    <input class="form-control" name="email" type="email" placeholder="Email-Adresse" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required=>
                </div>
                <div class="col-6" style="padding: 4px">
                    <input class="form-control" name="password" type="password" placeholder="Passwort" required>
                </div>
              </div>
          <div class="modal-footer">
            <button class="btn btn-primary" type="submit">Registrieren</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <div class="modal fade" id="logoutModal" aria-hidden="true" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Abmelden</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div>Wollen sie sich wirklch abmelden</div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-primary" data-bs-dismiss="modal">Abbrechen</button>
          <form onsubmit="return signOut()">
            <button class="btn btn-primary" type="submit">Logout</button>
          </form>
        </div>
      </div>
    </div>
  </div>
