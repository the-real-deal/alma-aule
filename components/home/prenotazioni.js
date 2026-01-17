// Funzione per formattare la data
function formatDate(dateString) {
    const options = { year: 'numeric', month: 'long', day: 'numeric' };
    return new Date(dateString).toLocaleDateString('it-IT', options);
}

// Funzione per creare l'HTML di una prenotazione
function creaPrenotazioneHTML(prenotazione) {
    return `
        <div class="card mb-3 border">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-start mb-3 flex-wrap gap-2">
                    <h5 class="card-title mb-0 text-primary">${prenotazione.nomeAula}</h5>
                    <span class="badge ${prenotazione.isFutura ? 'bg-success' : 'bg-secondary'}">
                        ${prenotazione.isFutura ? 'Futura' : 'Passata'}
                    </span>
                </div>
                <div class="row g-3">
                    <div class="col-md-6 col-lg-3">
                        <small class="text-muted text-uppercase d-block mb-1">Data Prenotazione</small>
                        <strong>${formatDate(prenotazione.dataPrenotazione)}</strong>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <small class="text-muted text-uppercase d-block mb-1">Via Sede</small>
                        <strong>${prenotazione.via}</strong>
                    </div>
                    <div class="col-md-6 col-lg-2">
                        <small class="text-muted text-uppercase d-block mb-1">Piano</small>
                        <strong>Piano ${prenotazione.numeroPiano}</strong>
                    </div>
                    <div class="col-md-6 col-lg-2">
                        <small class="text-muted text-uppercase d-block mb-1">Posti Disponibili</small>
                        <strong>${prenotazione.numeroPosti} posti</strong>
                    </div>
                    <div class="col-md-6 col-lg-2">
                        <small class="text-muted text-uppercase d-block mb-1">Persone Prenotate</small>
                        <strong>${prenotazione.numeroPersone} persone</strong>
                    </div>
                </div>
            </div>
        </div>
    `;
}

// Funzione per mostrare lo stato vuoto
function mostraStatoVuoto() {
    return `
         <div class="text-center py-5">
            <svg width="80" height="80" class="text-muted mb-3" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                <line x1="16" y1="2" x2="16" y2="6"></line>
                <line x1="8" y1="2" x2="8" y2="6"></line>
                <line x1="3" y1="10" x2="21" y2="10"></line>
            </svg>
            <p class="text-muted mb-4">Nessuna prenotazione trovata</p>
            <a href="#" class="btn btn-primary">
                <i class="bi bi-plus-circle me-2"></i>Prenota ora
            </a>
        </div>
    `;
}

// Funzione per mostrare errore
function mostraErrore(messaggio = 'Errore nel caricamento delle prenotazioni') {
    return `
       <div class="alert alert-danger text-center" role="alert">
            <i class="bi bi-exclamation-triangle fs-3 d-block mb-2"></i>
            <p class="mb-3">${messaggio}</p>
            <button class="btn btn-outline-danger" onclick="caricaPrenotazioni()">
                <i class="bi bi-arrow-clockwise me-2"></i>Riprova
            </button>
        </div>
    `;
}

// Funzione principale per caricare le prenotazioni
async function caricaPrenotazioni() {
    const container = document.getElementById('prenotazioniContainer');

    // Mostra loading
    container.innerHTML = `
        <div class="text-center py-5">
            <div class="spinner-border text-primary" role="status">
                <span class="visually-hidden">Caricamento...</span>
            </div>
            <p class="mt-3 text-muted">Caricamento prenotazioni...</p>
        </div>
    `;

    try {

        const response = await fetch('/apis/prenotazioni.php');

        if (!response.ok) {
            throw new Error(`Errore HTTP: ${response.status}`);
        }

        const contentType = response.headers.get('content-type');

        const text = await response.text();

        let data;
        try {
            data = JSON.parse(text);
        } catch (e) {
            throw new Error('Risposta non valida dal server');
        }


        if (data.error) {
            container.innerHTML = mostraErrore(data.message);
            return;
        }

        document.getElementById('totalePrenotazioni').textContent = data.statistiche.totalePrenotazioni;
        document.getElementById('prenotazioniFuture').textContent = data.statistiche.prenotazioniFuture;


        if (data.prenotazioni.length === 0) {
            container.innerHTML = mostraStatoVuoto();
        } else {
            let html = '';
            data.prenotazioni.forEach((prenotazione, index) => {
                html += creaPrenotazioneHTML(prenotazione);
            });
            container.innerHTML = html;
        }

    } catch (error) {
        container.innerHTML = mostraErrore(error.message);
    }
}

document.addEventListener('DOMContentLoaded', () => {
    caricaPrenotazioni();
});