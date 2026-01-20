function loadReservations() {
    $.ajax({
        url: "/apis/reservations.php",
        type: "GET",
        dataType: "json",
        success: function(response) {
            if (response.success) {
                renderReservations(response.data);
            } else {
                $('#reservationsCarousel').html(
                    `<div class="p-4"><p class="text-danger text-center mb-0">${response.message}</p></div>`
                );
            }
        },
        error: function(error) {
            console.error('Errore nel caricamento delle prenotazioni:', error);
            $('#reservationsCarousel').html(
                '<div class="p-4"><p class="text-danger text-center mb-0">Errore nel caricamento delle prenotazioni</p></div>'
            );
        }
    });
}

function renderReservations(data) {
    const carousel = $('#reservationsCarousel');
    const carouselInner = $('<div>').addClass('carousel-inner')
    if (data.reservations.length === 0) {
        carouselInner.append($('<div>')
        .addClass('carousel-item active')
            .append(
                $('<div>')
                    .addClass('p-4')
                    .append(
                        $('<p>')
                            .addClass('text-danger text-center mb-0')
                            .text('Nessuna prenotazione trovata.')
                    )
                )
            );
        
        carousel.append(carouselInner);
        return;
    }
    
    data.reservations.forEach((reservation, index) => {
        const item = createReservationItem(reservation, index === 0);
        carouselInner.append(item);
    });
    
    carousel.append(carouselInner);
    
    const stats = createStatsCard(data.stats);
    carousel.after(stats);
    
    if (typeof bootstrap !== 'undefined') {
        new bootstrap.Carousel(carousel[0], {
            interval: false,
            wrap: true
        });
    }
}

function createReservationItem(reservation, isActive) {
    const badgeClass = reservation.isFuture ? 'bg-success' : 'bg-secondary';
    const badgeText = reservation.isFuture ? 'Futura' : 'Passata';
    
    const timestamp = new Date(reservation.DataPrenotazione).toLocaleDateString('it-IT', { year: 'numeric', month: 'long', day: 'numeric', hour: '2-digit', minute: '2-digit' });
    const formattedDate = timestamp;
    
    const carouselItem = $('<div>')
        .addClass('carousel-item')
        .toggleClass('active', isActive);

    const content = $('<div>')
        .addClass('p-4')
        .appendTo(carouselItem);
    
    const header = $('<div>')
        .addClass('d-flex justify-content-between align-items-start mb-3 flex-wrap gap-2')
        .appendTo(content);
    
    $('<h5>')
        .addClass('card-title mb-0 text-primary')
        .text(reservation.NomeAula)
        .appendTo(header);
    
    $('<span>')
        .addClass(`badge ${badgeClass}`)
        .text(badgeText)
        .appendTo(header);
    
    const row = $('<div>')
        .addClass('row g-3')
        .appendTo(content);
    
    createInfoCol(row, 'col-md-6 col-lg-3', 'Data Prenotazione', formattedDate);
    createInfoCol(row, 'col-md-6 col-lg-3', 'Via Sede', reservation.Via);
    createInfoCol(row, 'col-md-6 col-lg-2', 'Piano', `${reservation.NumeroPiano}`);
    createInfoCol(row, 'col-md-6 col-lg-2', 'Posti Disponibili', `${reservation.NumeroPosti} posti`);
    createInfoCol(row, 'col-md-6 col-lg-2', 'Persone Prenotate', `${reservation.NumeroPersone} persone`);
    
    return carouselItem;
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

function createStatsCard(stats) {
    const wrapper = $('<div>').addClass('p-4 pt-0');
    
    const card = $('<div>')
        .addClass('card shadow-sm')
        .appendTo(wrapper);
    
    const cardBody = $('<div>')
        .addClass('card-body p-4')
        .appendTo(card);
    
    $('<h3>')
        .addClass('card-title mb-4')
        .text('Statistiche')
        .appendTo(cardBody);
    
    const row = $('<div>')
        .addClass('row g-3')
        .appendTo(cardBody);
    
    createStatRow(row, 'Totale Prenotazioni', stats.total, 'totalePrenotazioni', true);
    createStatRow(row, 'Prenotazioni Future', stats.future, 'prenotazioniFuture', false);
    
    return wrapper;
}

function createStatRow(parent, label, value, id, hasBorder) {
    const col = $('<div>')
        .addClass('col-12')
        .appendTo(parent);
    
    const content = $('<div>')
        .addClass('d-flex justify-content-between align-items-center py-3')
        .toggleClass('border-bottom', hasBorder)
        .appendTo(col);
    
    $('<span>')
        .addClass('text-muted')
        .text(label)
        .appendTo(content);
    
    $('<span>')
        .addClass('badge bg-primary fs-6')
        .attr('id', id)
        .text(value)
        .appendTo(content);
}

$(document).ready(function() {
    loadReservations();
});