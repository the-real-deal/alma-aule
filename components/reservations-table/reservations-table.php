<div id="reservationContainer" class="row">
        
</div>

<!-- Edit Reservation Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <p class="h5 fw-bold modal-title" id="editModalLabel">Modifica Prenotazione</p>
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


<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <p class="h5 fw-bold modal-title" id="deleteModalLabel">Conferma Eliminazione</p>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="deleteReservationId">
                <p class="mb-2">Sei sicuro di voler eliminare questa prenotazione?</p>
                <p class="fw-bold text-danger mb-0" id="deleteReservationInfo"></p>
                <p class="text-muted small mt-2">Questa azione non può essere annullata.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                <button type="button" class="btn btn-primary" id="confirmDeleteBtn">Elimina</button>
            </div>
        </div>
    </div>
</div>