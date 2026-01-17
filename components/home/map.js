let mapOptions = {
    center: [44.494887, 11.342616],
    zoom: 16
}

let map = L.map('map', mapOptions).setView([44.494887, 11.342616], 13);
L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; OpenStreetMap'
}).addTo(map);

// --- QUI COMINCIA LA PARTE NUOVA ---

// Funzione per caricare i dati
async function caricaSedi() {
    try {
        // Chiamiamo il file PHP che hai creato prima
        const response = await fetch('/apis/map.php');
        
        // Convertiamo la risposta in un oggetto Javascript
        const sedi = await response.json();

        // Cicliamo su ogni sede trovata
        sedi.forEach(sede => {
            // Controlliamo che latitudine e longitudine esistano per evitare errori
            if (sede.Via && sede.Latitudine && sede.Longitudine) {
                
                // Creiamo il marker
                var marker = L.marker([sede.Latitudine, sede.Longitudine]).addTo(map);
                marker.bindPopup(`<b>${sede.Via}</b>`);
            }
        });

    } catch (error) {
        console.error("Errore nel caricamento delle sedi:", error);
    }
}

// Eseguiamo la funzione
caricaSedi();