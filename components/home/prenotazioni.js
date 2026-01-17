// Funzione per formattare la data
function formatDate(dateString) {
    const options = { year: 'numeric', month: 'long', day: 'numeric' };
    return new Date(dateString).toLocaleDateString('it-IT', options);
}

// Funzione per creare l'HTML di una prenotazione
function creaPrenotazioneHTML(prenotazione) {
    return `
        <div class="prenotazione-item">
            <div class="prenotazione-header">
                <div class="aula-nome">${prenotazione.nomeAula}</div>
                <span class="badge ${prenotazione.isFutura ? 'badge-futura' : 'badge-passata'}">
                    ${prenotazione.isFutura ? 'Futura' : 'Passata'}
                </span>
            </div>
            <div class="prenotazione-details">
                <div class="detail-item">
                    <span class="detail-label">Data Prenotazione</span>
                    <span class="detail-value">${formatDate(prenotazione.dataPrenotazione)}</span>
                </div>
                <div class="detail-item">
                    <span class="detail-label">Via Sede</span>
                    <span class="detail-value">${prenotazione.via}</span>
                </div>
                <div class="detail-item">
                    <span class="detail-label">Piano</span>
                    <span class="detail-value">Piano ${prenotazione.numeroPiano}</span>
                </div>
                <div class="detail-item">
                    <span class="detail-label">Posti Disponibili</span>
                    <span class="detail-value">${prenotazione.numeroPosti} posti</span>
                </div>
                <div class="detail-item">
                    <span class="detail-label">Persone Prenotate</span>
                    <span class="detail-value">${prenotazione.numeroPersone} persone</span>
                </div>
            </div>
        </div>
    `;
}

// Funzione per mostrare lo stato vuoto
function mostraStatoVuoto() {
    return `
        <div class="empty-state">
            <svg class="calendar-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                <line x1="16" y1="2" x2="16" y2="6"></line>
                <line x1="8" y1="2" x2="8" y2="6"></line>
                <line x1="8" y1="2" x2="8" y2="6"></line>
                <line x1="3" y1="10" x2="21" y2="10"></line>
            </svg>
            <p>Nessuna prenotazione trovata</p>
            <a href="#" class="prenota-btn">Prenota ora</a>
        </div>
    `;
}

// Funzione per mostrare errore
function mostraErrore(messaggio = 'Errore nel caricamento delle prenotazioni') {
    return `
        <div class="error-state">
            <p>${messaggio}</p>
            <button class="btn-primary p-3" onclick="caricaPrenotazioni()">Riprova</button>
        </div>
    `;
}

// Funzione principale per caricare le prenotazioni
async function caricaPrenotazioni() {
    const container = document.getElementById('prenotazioniContainer');
    
    // Mostra loading
    container.innerHTML = '<div class="loading">Caricamento...</div>';
    
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