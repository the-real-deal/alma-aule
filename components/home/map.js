let mapOptions = {
    center: [44.494887, 11.342616],
    zoom: 16
}
const emiliaRomagnaBounds = [
    [43.85, 10.5],   // Sud-Ovest (latitudine, longitudine)
    [45.1, 13.3]     // Nord-Est (latitudine, longitudine)
];

let map = L.map('map', mapOptions).setView([44.494887, 11.342616], 13).setMaxBounds(emiliaRomagnaBounds);
L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    minZoom: 10,
    attribution: '&copy; OpenStreetMap',
}).addTo(map);
map.fitBounds(emiliaRomagnaBounds)

var redIcon = new L.Icon({
    iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-red.png',
    shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
    iconSize: [25, 41],
    iconAnchor: [12, 41],
    popupAnchor: [1, -34],
    shadowSize: [41, 41]
});
async function caricaSedi() {
    try {
        const response = await fetch('/apis/map.php');

        const sedi = await response.json();

        sedi.forEach(sede => {
            if (sede.Via && sede.Latitudine && sede.Longitudine) {

                var marker = L.marker([sede.Latitudine, sede.Longitudine], { icon: redIcon }).addTo(map);
                marker.bindPopup(`<b>${sede.Via}</b>`);
            }
        });

    } catch (error) {
        console.error("Errore nel caricamento delle sedi:", error);
    }

}

caricaSedi();