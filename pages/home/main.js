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
    const item = createReservationCard(allReservations.filter(x => x['isFuture'] == true).sort()[0]);
    mainCard.append(item);
    
}


$(document).ready(function() {
    loadReservations();
});