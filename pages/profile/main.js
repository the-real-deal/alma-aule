function creaProfiloHTML(data) {
    const tipo = data.tipo === 'studente' ? 'Studente' : 'Professore';
    const iniziali = (data.Nome.charAt(0) + data.Cognome.charAt(0)).toUpperCase();
    
    let html = `
        <div class="row">
            <!-- Avatar e info principali -->
            <div class="col-md-4 text-center mb-4">
                <div class="avatar-circle mx-auto mb-3" style="width: 150px; height: 150px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-size: 3rem; font-weight: bold; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
                    ${iniziali}
                </div>
                <h3 class="mb-1">${data.Nome} ${data.Cognome}</h3>
                <p class="text-muted mb-0">${tipo}</p>
            </div>
            
            <!-- Dettagli -->
            <div class="col-md-8">
                <h5 class="mb-3 text-primary">
                    <i class="bi bi-person-badge"></i> Informazioni Personali
                </h5>
                
                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="info-item p-3 bg-light rounded">
                            <small class="text-muted d-block mb-1">
                                <i class="bi bi-envelope"></i> Email
                            </small>
                            <strong>${data.Mail}</strong>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="info-item p-3 bg-light rounded">
                            <small class="text-muted d-block mb-1">
                                <i class="bi bi-calendar"></i> Data di Nascita
                            </small>
                            <strong>${formatDate(data.DataNascita)}</strong>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="info-item p-3 bg-light rounded">
                            <small class="text-muted d-block mb-1">
                                <i class="bi bi-card-text"></i> Matricola
                            </small>
                            <strong>${data.Matricola}</strong>
                        </div>
                    </div>
    `;
    
    // Se è un professore, mostra anche la data di assunzione
    if(data.tipo === 'professore' && data.DataAssunzione) {
        html += `
                    <div class="col-md-6">
                        <div class="info-item p-3 bg-light rounded">
                            <small class="text-muted d-block mb-1">
                                <i class="bi bi-briefcase"></i> Data Assunzione
                            </small>
                            <strong>${formatDate(data.DataAssunzione)}</strong>
                        </div>
                    </div>
        `;
    }
    
    html += `
                </div>
            </div>
        </div>
    `;
    
    return html;
}

function formatDate(dateString) {
    if(!dateString) return 'N/A';
    
    const date = new Date(dateString);
    const options = { year: 'numeric', month: 'long', day: 'numeric' };
    return date.toLocaleDateString('it-IT', options);
}

function mostraErrore(messaggio) {
    return `
        <div class="alert alert-danger" role="alert">
            <i class="bi bi-exclamation-triangle-fill"></i>
            <strong>Errore:</strong> ${messaggio}
        </div>
    `;
}

async function caricaProfilo() {
    const container = document.getElementById('profileContainer');
    
    // Mostra loading
    container.innerHTML = `
        <div class="text-center py-5">
            <div class="spinner-border text-primary" role="status">
                <span class="visually-hidden">Caricamento...</span>
            </div>
            <p class="mt-3 text-muted">Caricamento profilo...</p>
        </div>
    `;

    try {
        const response = await fetch('/apis/profile.php');

        if (!response.ok) {
            throw new Error(`Errore HTTP: ${response.status}`);
        }

        const text = await response.text();
        console.log('👉 Risposta raw:', text);

        let result;
        try {
            result = JSON.parse(text);
        } catch (e) {
            console.error('👉 Errore parsing JSON:', e);
            throw new Error('Risposta non valida dal server');
        }

        console.log('👉 Dati ricevuti:', result);

        if (result.success && result.data) {
            container.innerHTML = creaProfiloHTML(result.data);
        } else {
            container.innerHTML = mostraErrore(result.error || 'Dati non disponibili');
        }

    } catch (error) {
        console.error('👉 Errore caricamento profilo:', error);
        container.innerHTML = mostraErrore(error.message);
    }
}

document.addEventListener('DOMContentLoaded', () => {
    caricaProfilo();
});