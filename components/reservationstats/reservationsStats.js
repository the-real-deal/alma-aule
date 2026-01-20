function loadStats() {
    $.ajax({
        url: "/apis/reservationsStats.php",
        type: "GET",
        dataType: "json",
        success: function(response) {
            if (response.success) {
                renderStats(response.stats);
            } else {
                $('#statsContainer').html(
                    `<div class="col-12"><p class="text-danger text-center mb-0">${response.message}</p></div>`
                );
            }
        },
        error: function(error) {
            console.error('Errore nel caricamento delle statistiche:', error);
            $('#statsContainer').html(
                '<div class="col-12"><p class="text-danger text-center mb-0">Errore nel caricamento delle statistiche</p></div>'
            );
        }
    });
}

function renderStats(stats) {
    const container = $('#statsContainer');
    container.empty();
    
    createStatRow(container, 'Totale Prenotazioni', stats.total, 'totalePrenotazioni', true);
    createStatRow(container, 'Prenotazioni Future', stats.future, 'prenotazioniFuture', false);
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
    loadStats();
});