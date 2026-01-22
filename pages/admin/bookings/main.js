$(document).ready(function() {
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
        
        reservations.forEach(function(reservation) {
            const formattedDate = new Date(reservation.DataPrenotazione).toLocaleString('it-IT');
            
            const row = $('<tr>').addClass('text-center').attr('data-reservation-id', reservation.CodicePrenotazione);
            
            const idCell = $('<td>').text(reservation.CodicePrenotazione);
            const aulaCell = $('<td>').text(reservation.NomeAula || 'Aula ' + reservation.CodiceAula);
            const accountCell = $('<td>').text(reservation.CodiceAccount);
            const personeCell = $('<td>').text(reservation.NumeroPersone);
            const dataCell = $('<td>').text(formattedDate);
            
            const actionCell = $('<td>');
            const editBtn = $('<button>')
                .addClass('btn btn-sm btn-primary edit-btn')
                .attr({
                    'data-id': reservation.CodicePrenotazione,
                    'data-aula': reservation.CodiceAula,
                    'data-account': reservation.CodiceAccount,
                    'data-persone': reservation.NumeroPersone,
                    'data-data': reservation.DataPrenotazione
                });
            
            const icon = $('<i>').addClass('bi bi-pencil');
            editBtn.append(icon);
            editBtn.append(' Modifica');
            
            actionCell.append(editBtn);
            
            // Append all cells to row
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

        // Populate modal with reservation data
        $('#editReservationId').val(id);
        $('#editAula').val(aula);
        $('#editAccount').val(account);
        $('#editPersone').val(persone);
        
        // Format datetime for input field
        const dateObj = new Date(data);
        const formattedDateTime = dateObj.toISOString().slice(0, 16);
        $('#editData').val(formattedDateTime);

        // Show modal
        $('#editModal').modal('show');
    });

    // Handle form submission
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
                    loadReservations(); // Reload the table
                    
                    // Show success message
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

    // Function to show alert messages
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
        
        // Auto-dismiss after 3 seconds
        setTimeout(function() {
            alertDiv.fadeOut('slow', function() {
                alertDiv.remove();
            });
        }, 3000);
    }
});