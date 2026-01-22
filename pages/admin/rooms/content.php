<div class="container-fluid">
  <div class="row">
    <h1>Gestione aule</h1>
  </div>
  <div class="row pb-4">
    <p class="col-lg-7 lead m-0">Qui puoi modificare le informazioni delle aule disponibili per le prenotazioni.</p>

  </div>
  <div class="row">

    <?php require "{$_SERVER['DOCUMENT_ROOT']}/components/rooms-view/view.php" ?>


  </div>

  <!-- Modal -->
  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form>
            <div class="input-group"></div>
            <label for="seats" class="form-label">Posti</label>
            <input type="number" id="seats" class="form-control">
            <p class="h4 fw-bold m-0">Dotazioni</p>
            <hr class="border border-primary border-2 opacity-75 my-1 mx-1 pb-0">
            <div class="form-check">
              <label for="accessibility" class="form-check-label">Accessibilità</label>
              <input type="checkbox" id="accessibility" class="form-check-input">
            </div>
            <div class="form-check">
              <label for="projector" class="form-check-label">Proiettore</label>
              <input type="checkbox" id="projector" class="form-check-input">
            </div>
            <div class="form-check">
              <label for="lab" class="form-check-label">Laboratorio</label>
              <input type="checkbox" id="lab" class="form-check-input">
            </div>
            <div class="form-check">
              <label for="plugs" class="form-check-label">Prese</label>
              <input type="checkbox" id="plugs" class="form-check-input">
            </div>

          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Chiudi</button>
          <button id="save" type="submit" class="btn btn-primary">Salva</button>
        </div>
      </div>
    </div>
  </div>
</div>