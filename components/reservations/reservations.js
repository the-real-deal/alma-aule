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
                allReservations = response.reservations;
                renderReservations();
            } else {
                $('#mainReservationsCard').html(
                    `<div class="p-4"><p class="text-danger text-center mb-0">${response.message}</p></div>`
                );
            }
        },
        error: function(error) {
            console.error('Errore nel caricamento delle prenotazioni:', error);
            $('#mainReservationsCard').html(
                '<div class="p-4"><p class="text-danger text-center mb-0">Errore nel caricamento delle prenotazioni</p></div>'
            );
        }
    });
}

function renderReservations() {
    const mainCard = $('#mainReservationsCard');
    mainCard.empty();
    
    const totalPages = Math.ceil(allReservations.length / itemsPerPage);
    const startIndex = (currentPage - 1) * itemsPerPage;
    const endIndex = startIndex + itemsPerPage;
    const pageReservations = allReservations.slice(startIndex, endIndex);
    
    const reservationsContainer = $('<div>').appendTo(mainCard);
    
    pageReservations.forEach((reservation) => {
        const item = createReservationCard(reservation);
        reservationsContainer.append(item);
    });
    
    const pagination = createPagination(totalPages);
    mainCard.append(pagination);
}

function createReservationCard(reservation) {
    const badgeClass = reservation.isFuture ? 'bg-success' : 'bg-secondary';
    const badgeText = reservation.isFuture ? 'Futura' : 'Passata';
    
    const timestamp = new Date(reservation.DataPrenotazione).toLocaleDateString('it-IT', { year: 'numeric', month: 'long', day: 'numeric', hour: '2-digit', minute: '2-digit' });
    const formattedDate = timestamp;
    
    const card = $('<div>')
        .addClass('p-4 border-bottom');

    const header = $('<div>')
        .addClass('d-flex justify-content-between align-items-start mb-3 flex-wrap gap-2')
        .appendTo(card);
    
    // Container per titolo e checkbox
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
        .addClass('row g-3')
        .appendTo(card);
    
    createInfoCol(row, 'col-lg-6 col-lg-3', 'Data Prenotazione', formattedDate);
    createInfoCol(row, 'col-lg-6 col-lg-3', 'Via Sede', reservation.Via);
    createInfoCol(row, 'col-lg-6 col-lg-2', 'Piano', `${reservation.NumeroPiano}`);
    createInfoCol(row, 'col-lg-6 col-lg-2', 'Posti Disponibili', `${reservation.NumeroPosti} posti`);
    createInfoCol(row, 'col-lg-6 col-lg-2', 'Persone Prenotate', `${reservation.NumeroPersone} persone`);
    
    return card;
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