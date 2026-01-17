let mapOptions = {
    center: [44.494887, 11.342616],
    zoom: 16
}

let map = L.map('map', mapOptions).setView([44.494887, 11.342616], 13);
L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; OpenStreetMap'
}).addTo(map);

async function caricaSedi() {
    try {
        const response = await fetch('/apis/map.php');
        
        const sedi = await response.json();

        sedi.forEach(sede => {
            if (sede.Via && sede.Latitudine && sede.Longitudine) {
                
                var marker = L.marker([sede.Latitudine, sede.Longitudine]).addTo(map);
                marker.bindPopup(`<b>${sede.Via}</b>`);
            }
        });

    } catch (error) {
        console.error("Errore nel caricamento delle sedi:", error);
    }
}

caricaSedi();