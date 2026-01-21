<div class="container-fluid">
  <div class="row">
    <p class="h1">Gestione utenti</p>
  </div>
  <div class="row pb-4">
    <p class="col-lg-7 lead m-0">Elenco degli utenti che usufruiscono della piattaforma.</p>
    <form class="col-lg-5 pt-4 pt-lg-0 d-flex d-lg-inline-block">
      <label class="d-flex align-items-center" for="searchUserInput">Ricerca un utente: </label>
      <input title="searchBarUser" type="text"placeholder="es. Mario Rossi..." id="searchUserInput" class="w-75 form-control ms-3 ms-lg-0">
    </form>
    </div>
  </div>
  <div id="userList" class="row">
  </div>
</div>
<div class="modal fade" id="successModal" tabindex="-1" role="strong" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <p class="h3 modal-title fw-bold fs-5" id="modalExitStatus" role="strong"></p>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">OK</button>
      </div>
    </div>
  </div>
</div>