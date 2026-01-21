let currentPage = 1;
const itemsPerPage = 2;
let allReservations = [];
let currentStats = {};

function loadReservations() {
    $.ajax({
        url: "/apis/reservations.php",
        type: "GET",
        dataType: "json",
        success: function(response) {
            if (response.success) {
                allReservations = groupReservationsByRoomAndDate(response.reservations);
                renderReservations();
            } else {
                console.log("DJJDJDJD")
                $('#mainReservationsCard').append($('<div>').append(($('<p>').addClass('text-danger text-center mb-0').text(response.message))));            
            }
        },
        error: function(error) {
            console.error('Errore nel caricamento delle prenotazioni:', error);
            $('#mainReservationsCard').append($('<div>').append(($('<p>')).addClass('text-danger text-center mb-0').text("Errore nel caricamento delle prenotazioni")));
        }
    });
}

function groupReservationsByRoomAndDate(reservations) {
    const grouped = {};
    const now = new Date();
    
    reservations.forEach(reservation => {
        const date = new Date(reservation.DataPrenotazione);
        const dateKey = date.toLocaleDateString('it-IT');
        const key = `${reservation.NomeAula}_${dateKey}`;
        
        if (!grouped[key]) {
            grouped[key] = {
                NomeAula: reservation.NomeAula,
                Via: reservation.Via,
                NumeroPiano: reservation.NumeroPiano,
                NumeroPosti: reservation.NumeroPosti,
                date: dateKey,
                dateObj: new Date(date.getFullYear(), date.getMonth(), date.getDate()),
                isFuture: false,
                timeSlots: []
            };
        }
        
        const isThisSlotFuture = date >= now;
        
        if (isThisSlotFuture) {
            grouped[key].isFuture = true;
        }
        
        grouped[key].timeSlots.push({
            CodicePrenotazione: reservation.CodicePrenotazione,
            time: date.toLocaleTimeString('it-IT', { hour: '2-digit', minute: '2-digit' }),
            NumeroPersone: reservation.NumeroPersone,
            fullDate: reservation.DataPrenotazione,
            isFuture: isThisSlotFuture
        });
    });
    
    return Object.values(grouped).sort((a, b) => a.dateObj - b.dateObj);
}

function renderReservations() {
    const mainCard = $('#mainReservationsCard');
    mainCard.empty();
    
    if (allReservations.length === 0) {
        mainCard.append(($("<div>").addClass('p-4')).append($('<p>').addClass('text-center text-muted mb-0').text('Nessuna prenotazione trovata')));
        return;
    }
    
    const totalPages = Math.ceil(allReservations.length / itemsPerPage);
    const startIndex = (currentPage - 1) * itemsPerPage;
    const endIndex = startIndex + itemsPerPage;
    const pageReservations = allReservations.slice(startIndex, endIndex);
    
    const reservationsContainer = $('<div>').appendTo(mainCard);
    
    pageReservations.forEach((reservation, index) => {
        const item = createReservationCard(reservation, startIndex + index);
        reservationsContainer.append(item);
    });
    
    if (totalPages > 1) {
        const pagination = createPagination(totalPages);
        mainCard.append(pagination);
    }
}

function createReservationCard(reservation, index) {
    const badgeClass = reservation.isFuture ? 'bg-success' : 'bg-secondary';
    const badgeText = reservation.isFuture ? 'Futura' : 'Passata';
    const collapseId = `collapse-reservation-${index}`;
    
    const card = $('<div>')
        .addClass('p-4 border-bottom')

    const header = $('<div>')
        .addClass('d-flex justify-content-between align-items-start mb-3 flex-wrap gap-2')
        .appendTo(card);
    
    const titleContainer = $('<div>')
        .addClass('d-flex align-items-center gap-3')
        .appendTo(header);
    
    $('<p>')
        .addClass('h2 card-title mb-0 text-primary')
        .text(reservation.NomeAula)
        .appendTo(titleContainer);
    
    $('<span>')
        .addClass(`badge ${badgeClass}`)
        .text(badgeText)
        .appendTo(header);
    
    const row = $('<div>')
        .addClass('row g-3 mb-3')
        .appendTo(card);
    
    createInfoCol(row, 'col-lg-3', 'Data', reservation.date);
    createInfoCol(row, 'col-lg-3', 'Via Sede', reservation.Via);
    createInfoCol(row, 'col-lg-3', 'Piano', `${reservation.NumeroPiano}`);
    createInfoCol(row, 'col-lg-3', 'Posti Disponibili', `${reservation.NumeroPosti} posti`);
    
    $('<button>')
        .addClass('btn btn-secondary btn-sm')
        .attr('type', 'button')
        .text(`Mostra orari (${reservation.timeSlots.length})`)
        .on('click', function() {
            $(`#${collapseId}`).collapse('toggle');
        })
        .appendTo(card);
    
    const collapse = $('<div>')
        .addClass('collapse mt-3')
        .attr('id', collapseId)
        .appendTo(card);
    
    const collapseBody = $('<div>')
        .addClass('card card-body')
        .appendTo(collapse);
    
    $('<h6>')
        .addClass('mb-3')
        .text('Orari Prenotati:')
        .appendTo(collapseBody);
    
    const table = $('<table>')
        .addClass('table table-sm table-striped mb-0')
        .appendTo(collapseBody);
    
    const thead = $('<thead>').appendTo(table);
    const headerRow = $('<tr>').appendTo(thead);
    $('<th>').text('Orario').appendTo(headerRow);
    $('<th>').text('Persone Prenotate').appendTo(headerRow);
    $('<th>').text('Azioni').appendTo(headerRow);
    
    const tbody = $('<tbody>').appendTo(table);
    
    reservation.timeSlots.forEach((slot, slotIndex) => {
        const row = $('<tr>').appendTo(tbody);
        ($('<td>').append($("<strong>").text(slot.time))).appendTo(row);
        ($('<td>').text(`${slot.NumeroPersone} persone`)).appendTo(row);
        
        const actionsCell = $('<td>').appendTo(row);
        
        if (!slot.isFuture) {
            $('<button>')
                .addClass('btn btn-warning btn-sm')
                .append($("<strong>").addClass('bi bi-exclamation-triangle').text(" Segnala")
                .on('click', function() {
                    showReportModal(reservation, slot, index, slotIndex);
                }))
                .appendTo(actionsCell)
        } else {
            actionsCell.text('-');
        }
    });
    
    return card;
}

function showReportModal(reservation, slot, reservationIndex, slotIndex) {
    const modalId = `reportModal-${reservationIndex}-${slotIndex}`;
    
    $(`#${modalId}`).remove();
    
    const modal = $('<div>')
        .addClass('modal fade')
        .attr('id', modalId)
        .attr('tabindex', '-1')
        .attr('aria-hidden', 'true');
    
    const modalDialog = $('<div>')
        .addClass('modal-dialog')
        .appendTo(modal);
    
    const modalContent = $('<div>')
        .addClass('modal-content')
        .appendTo(modalDialog);
    
    // Header
    const modalHeader = $('<div>')
        .addClass('modal-header')
        .appendTo(modalContent);
    
    $('<h5>')
        .addClass('modal-title')
        .text('Segnalazione Orario')
        .appendTo(modalHeader);
    
    $('<button>')
        .addClass('btn-close')
        .attr('type', 'button')
        .attr('data-bs-dismiss', 'modal')
        .attr('aria-label', 'Close')
        .appendTo(modalHeader);
    
    // Body
    const modalBody = $('<div>')
        .addClass('modal-body')
        .appendTo(modalContent);
    
    $('<p>')
        .addClass('mb-3')
        .html(`<strong>Aula:</strong> ${reservation.NomeAula}<br>
               <strong>Data:</strong> ${reservation.date}<br>
               <strong>Orario:</strong> ${slot.time}`)
        .appendTo(modalBody);
    
    $('<label>')
        .addClass('form-label')
        .attr('for', `reportText-${reservationIndex}-${slotIndex}`)
        .text('Descrizione segnalazione (opzionale):')
        .appendTo(modalBody);
    
    const textarea = $('<textarea>')
        .addClass('form-control')
        .attr('id', `reportText-${reservationIndex}-${slotIndex}`)
        .attr('rows', '4')
        .attr('maxlength', '250')
        .attr('placeholder', 'Inserisci qui la tua segnalazione...')
        .appendTo(modalBody);
    
    const charCounter = $('<small>')
        .addClass('form-text text-muted')
        .text('0/250 caratteri')
        .appendTo(modalBody);
    
    textarea.on('input', function() {
        const length = $(this).val().length;
        charCounter.text(`${length}/250 caratteri`);
    });
    

    const modalFooter = $('<div>')
        .addClass('modal-footer')
        .appendTo(modalContent);
    
    $('<button>')
        .addClass('btn btn-secondary')
        .attr('type', 'button')
        .attr('data-bs-dismiss', 'modal')
        .text('Annulla')
        .appendTo(modalFooter);
    
    $('<button>')
        .addClass('btn btn-warning')
        .attr('type', 'button')
        .text('Invia Segnalazione')
        .on('click', function() {
            submitReport(slot, textarea.val());
            const bsModal = bootstrap.Modal.getInstance(modal[0]);
            bsModal.hide();
        })
        .appendTo(modalFooter);
    
    $('body').append(modal);
    
    const bsModal = new bootstrap.Modal(modal[0]);
    bsModal.show();
    
    modal.on('hidden.bs.modal', function() {
        $(this).remove();
    });
}

function submitReport(slot, description) {
    const reportData = {
        reservationId: slot.CodicePrenotazione,
        user : localStorage.getItem("username"),
        description: description,
    };
    
    console.log('Segnalazione inviata:', reportData);
    
    fetch('/apis/addReports.php', {
        method: 'POST',
        body: JSON.stringify(reportData)
    })
    .then(response => response.json())
    .catch(error => {
        console.error('Errore login:', error);
        $('#loginErrorMessage').text("Errore di comunicazione con il server.");
        $('#loginErrorModal').modal('show');
    });
    
    window.location.reload();

}

function createInfoCol(parent, colClass, label, value) {
    const col = $('<div>')
        .addClass(colClass)
        .appendTo(parent);
    
    $('<small>')
        .addClass('text-muted text-uppercase d-block mb-1')
        .text(label)
        .appendTo(col);
    
    $('<strong>')
        .text(value)
        .appendTo(col);
}

function createPagination(totalPages) {
    $('#paginationContainer').remove();
    
    const paginationContainer = $('<div>')
        .attr('id', 'paginationContainer')
        .addClass('d-flex justify-content-center p-4 border-top');
    
    const nav = $('<nav>').appendTo(paginationContainer);
    const ul = $('<ul>').addClass('pagination mb-0').appendTo(nav);
    
    const prevLi = $('<li>')
        .addClass('page-item')
        .toggleClass('disabled', currentPage === 1)
        .appendTo(ul);
    
    $('<a>')
        .addClass('page-link')
        .attr('href', '#')
        .text('Precedente')
        .on('click', function(e) {
            e.preventDefault();
            if (currentPage > 1) {
                currentPage--;
                renderReservations();
            }
        })
        .appendTo(prevLi);
    
    for (let i = 1; i <= totalPages; i++) {
        const li = $('<li>')
            .addClass('page-item')
            .toggleClass('active', i === currentPage)
            .appendTo(ul);
        
        $('<a>')
            .addClass('page-link')
            .attr('href', '#')
            .text(i)
            .on('click', function(e) {
                e.preventDefault();
                currentPage = i;
                renderReservations();
            })
            .appendTo(li);
    }
    
    const nextLi = $('<li>')
        .addClass('page-item')
        .toggleClass('disabled', currentPage === totalPages)
        .appendTo(ul);
    
    $('<a>')
        .addClass('page-link')
        .attr('href', '#')
        .text('Successivo')
        .on('click', function(e) {
            e.preventDefault();
            if (currentPage < totalPages) {
                currentPage++;
                renderReservations();
            }
        })
        .appendTo(nextLi);
    
    return paginationContainer;
}

$(document).ready(function() {
    loadReservations();
});