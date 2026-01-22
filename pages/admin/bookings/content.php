<div class="container-fluid">
    <div class="row">
        <p class="h1 text-nowrap">Gestione prenotazioni</p>
    </div>
    <div class="row pb-4">
        <p class="col-lg-7 lead m-0">Sposta, rimuovi o modifica una prenotazione effettuata.</p>
        <form class="col-lg-5 pt-4 pt-lg-0 d-flex d-lg-inline-block">
            <label class="d-flex align-items-center" for="inputReservation">Ricerca una prenotazione: </label>
            <input name="searchBarReservation" type="text" placeholder="es. AULA 7" id="inputReservation" class="w-75 form-control ms-3 ms-lg-0">
        </form>
    </div>
    <div id="reservationContainer" class="row">
        
    </div>
</div>

<!-- Edit Reservation Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Modifica Prenotazione</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editReservationForm">
                <div class="modal-body">
                    <input type="hidden" id="editReservationId">
                    
                    <div class="mb-3">
                        <label for="editAula" class="form-label">Codice Aula</label>
                        <input type="number" class="form-control" id="editAula" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="editAccount" class="form-label">Account</label>
                        <input type="text" class="form-control" id="editAccount" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="editPersone" class="form-label">Numero Persone</label>
                        <input type="number" class="form-control" id="editPersone" min="1" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="editData" class="form-label">Data e Ora</label>
                        <input type="datetime-local" class="form-control" id="editData" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                    <button type="submit" class="btn btn-primary">Salva Modifiche</button>
                </div>
            </form>
        </div>
    </div>
</div>
