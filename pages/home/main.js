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
                console.log(response.message)
                $('#mainReservationsCard').empty().append($('<div>').append(($('<p>').addClass('text-danger text-center mb-0').text(response.message))));            
            }
        },
        error: function(error) {
            console.error('Errore nel caricamento delle prenotazioni:', error);
            $('#mainReservationsCard').append($('<div>').append(($('<p>')).addClass('text-danger text-center mb-0').text("Errore nel caricamento delle prenotazioni")));
        }
    });
}

function renderReservations() {
    const mainCard = $('#mainReservationsCard');
    mainCard.empty();
    const futureReservations = allReservations.filter(x => x.isFuture === true);
    
    if (futureReservations.length > 0) {
        const item = createReservationCard(futureReservations[0], 0);
        mainCard.append(item);
    }
}


$(document).ready(function() {
    loadReservations();
});