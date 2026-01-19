function caricaPrenotazioni() {
    var xhr = new XMLHttpRequest();
    
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            console.log(xhr.responseText);
            var data = JSON.parse(xhr.responseText);
            var element = document.getElementById("prenotazioniCarousel");
            element.insertAdjacentHTML('afterbegin', data.reservations);
            if(data.stats) {
                element.insertAdjacentHTML('afterend', data.stats);
            }
            if (xhr.status === 200) {
                // Inizializza il carosello Bootstrap
                var carouselElement = document.getElementById('prenotazioniCarousel');
                if (carouselElement && typeof bootstrap !== 'undefined') {
                    var carousel = new bootstrap.Carousel(carouselElement, {
                        interval: false, // Disabilita lo scorrimento automatico
                        wrap: true
                    });
                }
            } 
        }
    };
    
    xhr.open("GET", "/apis/prenotazioni.php", true);
    xhr.send();
}

document.addEventListener('DOMContentLoaded', function() {
    caricaPrenotazioni();
});