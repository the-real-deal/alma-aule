function caricaReports() {
    $('#reportsContainer').empty();

    $.ajax({
        url: "/apis/getAllReports.php",
        type: "GET",
        dataType: "json",
        success: function(response) {
            if (response.success) {
                allReportsData = response.data.reports;
                renderReports(response.data.reports, response.data.username);
            } else {
                $('#reportsContainer').html(
                    `<div class="alert alert-danger" role="alert">${response.message}</div>`
                );
            }
        },
        error: function(error) {
            $('#reportsContainer').html('<div class="alert alert-danger">Errore nel caricamento</div>');
        }
    });
}

function renderReports(reports, username = "") {
    const container = $('#reportsContainer');
    container.empty(); // Puliamo il container prima di ridisegnare

    if (reports.length === 0) {
        container.html(`<div class="alert alert-warning">Nessun risultato trovato</div>`);
        return;
    }
    
    const accordion = $('<div>')
        .addClass('accordion accordion-flush')
        .attr('id', 'accordionExample');
    
    reports.slice(0, Math.min(reports.length, 5)).forEach((report, index) => {
        const item = createReportItem(report, index);
        accordion.append(item);
    });
    
    container.append(accordion);
}

$(document).ready(function() {
    caricaReports();
    setupSearch();
    loadReservations();

    function loadReservations() {
        $.ajax({
            url: '/apis/getAllReservations.php',
            method: 'GET',
            dataType: 'json',
            success: function(data) {
                displayReservations(data);
            },
            error: function(xhr, status, error) {
                console.error('Error loading reservations:', error);
                $('#reservationContainer').empty();
                const alertDiv = $('<div>')
                    .addClass('alert alert-danger')
                    .text('Errore nel caricamento delle prenotazioni');
                $('#reservationContainer').append(alertDiv);
            }
        });
    }

    function displayReservations(reservations) {
        const container = $('#reservationContainer');
        container.empty();

        if (reservations.length === 0) {
            const alertDiv = $('<div>')
                .addClass('alert alert-info')
                .text('Nessuna prenotazione trovata');
            container.append(alertDiv);
            return;
        }

        const tableResponsive = $('<div>').addClass('table-responsive');
        const table = $('<table>').addClass('table table-striped table-hover rounded rounded-sm');
        
        const thead = $('<thead>').addClass('table-primary');
        const headerRow = $('<tr>');
        
        const headers = ['ID', 'Aula', 'Account', 'Persone', 'Data', 'Azioni'];
        headers.forEach(function(headerText) {
            const th = $('<th>').text(headerText).addClass('text-center text-uppercase text-white');
            headerRow.append(th);
        });
        
        thead.append(headerRow);
        table.append(thead);
        
        const tbody = $('<tbody>').attr('id', 'reservationTableBody');
        
        reservations
            .slice(0, Math.min(5, reservations.length))
            .forEach(function(reservation) {
                const formattedDate = new Date(reservation.DataPrenotazione).toLocaleString('it-IT');
                
                const row = $('<tr>').addClass('text-center').attr('data-reservation-id', reservation.CodicePrenotazione);
                
                const idCell = $('<td>').text(reservation.CodicePrenotazione);
                const aulaCell = $('<td>').text(reservation.NomeAula || 'Aula ' + reservation.CodiceAula);
                const accountCell = $('<td>').text(reservation.CodiceAccount);
                const personeCell = $('<td>').text(reservation.NumeroPersone);
                const dataCell = $('<td>').text(formattedDate);
                
                const actionCell = $('<td>')
                    .addClass('d-flex justify-content-center flex-column flex-lg-row gap-2');
                const editBtn = $('<button>')
                    .addClass('btn btn-sm btn-secondary edit-btn text-nowrap')
                    .attr({
                        'data-id': reservation.CodicePrenotazione,
                        'data-aula': reservation.CodiceAula,
                        'data-account': reservation.CodiceAccount,
                        'data-persone': reservation.NumeroPersone,
                        'data-data': reservation.DataPrenotazione
                    });
                
                const editIcon = $('<strong>').addClass('bi bi-pencil');
                editBtn.append(editIcon);
                editBtn.append(' Modifica');
                
                const deleteBtn = $('<button>')
                    .addClass('btn btn-sm btn-primary delete-btn text-nowrap')
                    .attr({
                        'data-id': reservation.CodicePrenotazione,
                        'data-account': reservation.CodiceAccount
                    });
                
                const deleteIcon = $('<strong>').addClass('bi bi-trash');
                deleteBtn.append(deleteIcon);
                deleteBtn.append(' Elimina');
                
                actionCell.append(editBtn, deleteBtn);
                
                row.append(idCell, aulaCell, accountCell, personeCell, dataCell, actionCell);
                tbody.append(row);
            });
        
        table.append(tbody);
        tableResponsive.append(table);
        container.append(tableResponsive);
    }

    // Handle edit button click
    $(document).on('click', '.edit-btn', function() {
        const id = $(this).data('id');
        const aula = $(this).data('aula');
        const account = $(this).data('account');
        const persone = $(this).data('persone');
        const data = $(this).data('data');

        $('#editReservationId').val(id);
        $('#editAula').val(aula);
        $('#editAccount').val(account);
        $('#editPersone').val(persone);
        
        const dateObj = new Date(data);
        const formattedDateTime = dateObj.toISOString().slice(0, 16);
        $('#editData').val(formattedDateTime);

        $('#editModal').modal('show');
    });

    $('#editReservationForm').on('submit', function(e) {
        e.preventDefault();

        const formData = {
            id: $('#editReservationId').val(),
            aula: $('#editAula').val(),
            account: $('#editAccount').val(),
            persone: $('#editPersone').val(),
            data: $('#editData').val()
        };

        $.ajax({
            url: '/apis/updateReservation.php',
            method: 'POST',
            data: formData,
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    $('#editModal').modal('hide');
                    loadReservations();
                    
                    showAlert('Prenotazione aggiornata con successo!', 'success');
                } else {
                    showAlert('Errore: ' + response.message, 'danger');
                }
            },
            error: function(xhr, status, error) {
                console.error('Error updating reservation:', error);
                showAlert('Errore nell\'aggiornamento della prenotazione', 'danger');
            }
        });
    });

    $(document).on('click', '.delete-btn', function() {
        const id = $(this).data('id');
        const account = $(this).data('account');

        $('#deleteReservationId').val(id);
        $('#deleteReservationInfo').text('ID: ' + id + ' - Account: ' + account);

        $('#deleteModal').modal('show');
    });

    $('#confirmDeleteBtn').on('click', function() {
        const id = $('#deleteReservationId').val();

        $.ajax({
            url: '/apis/deleteReservation.php',
            method: 'POST',
            data: { id: id },
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    $('#deleteModal').modal('hide');
                    loadReservations();
                    
                    showAlert('Prenotazione eliminata con successo!', 'success');
                } else {
                    showAlert('Errore: ' + response.message, 'danger');
                }
            },
            error: function(xhr, status, error) {
                console.error('Error deleting reservation:', error);
                showAlert('Errore nell\'eliminazione della prenotazione', 'danger');
            }
        });
    });

    function showAlert(message, type) {
        const alertDiv = $('<div>')
            .addClass('alert alert-' + type + ' alert-dismissible fade show')
            .attr('role', 'alert');
        
        alertDiv.text(message);
        
        const closeBtn = $('<button>')
            .addClass('btn-close')
            .attr({
                'type': 'button',
                'data-bs-dismiss': 'alert',
                'aria-label': 'Close'
            });
        
        alertDiv.append(closeBtn);
        
        $('#reservationContainer').prepend(alertDiv);
        
        setTimeout(function() {
            alertDiv.fadeOut('slow', function() {
                alertDiv.remove();
            });
        }, 3000);
    }
});