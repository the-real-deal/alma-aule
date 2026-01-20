<div class="container-fluid">
  <div class="row">
    <h1>Gestione aule</h1>
  </div>
  <div class="row pb-4">
    <p class="col-lg-7 lead m-0">Qui puoi modificare le informazioni delle aule disponibili per le prenotazioni.</p>
    <form class="col-lg-5 pt-4 pt-lg-0 d-flex d-lg-inline-block">
      <label class="d-flex align-items-center" for="searchRoomInput">Ricerca una specifica aula:</label>
      <input type="text" placeholder="es. AULA MAGNA..." id="searchRoomInput" class="w-75 form-control ms-3 ms-lg-0">
    </form>
  </div>
  <div class="row">
    <div class="col-lg-7" id="listAule">

    </div>
    <div class="col-lg-5">

    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Understood</button>
        </div>
      </div>
    </div>
  </div>
</div>