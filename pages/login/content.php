<a href="/landing" class="btn btn-secondary">
    <strong class="bi bi-arrow-left"></strong> Torna indietro
</a>
<div class="card border-0 rounded-2 shadow-lg" style="min-width: 18rem; max-width: 22rem;">
    <div class="card-header text-center">
        <img class="img-fluid" src="../../assets/imgs/logo-unibo.png" alt="Logo Unibo">
        <p class="h3 text-dark fw-bold">ESEGUI L'ACCESSO</p>
    </div>
    <div class="card-body px-3 px-md-5 my-3">
        <form id="loginForm" class="d-flex flex-column justify-content-center" method="POST">
            <div class="mb-3">
                <label id="emailHelp" for="inputEmail" class="form-label text-dark">
                    <strong class="bi bi-person-circle"></strong>    
                    E-mail
                </label>
                <input name="email" placeholder="marco.rossi@unibo.it" type="email" class="form-control" id="inputEmail" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="inputPassword" class="form-label text-dark">
                    <strong class="bi bi-key"></strong>
                    Password
                </label>
                <input name="password" type="password" class="form-control" id="inputPassword">
            </div>
            <button name="submit" type="submit" class="btn btn-primary">Accedi</button>
            <small class="pt-3 text-center d-flex flex-column">
                <span>Hai dimenticato la password?</span>
                <a class="fw-bolder text-primary text-decoration-underline" href="https://dsa.unibo.it/Recovery.aspx">Recupera la password</a>
            </small>
        </form>
    </div>
</div>

<div class="modal fade" id="loginErrorModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <p class="h5 fw-bold modal-title"><strong class="bi bi-shield-fill-exclamation"></strong> Attenzione</p>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p id="loginErrorMessage" class="fw-bold"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Chiudi</button>
            </div>
        </div>
    </div>
</div>
