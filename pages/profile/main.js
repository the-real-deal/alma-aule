function caricaProfilo() {
    $.ajax({
        url: "/apis/profile.php",
        type: "GET",
        dataType: "json",
        success: function(response) {
            if (response.success) {
                renderProfile(response.data);
            }
        },
        error: function(error) {
            console.error('Errore nel caricamento del profilo:', error);
            $('#profileContainer').append($('<div>').addClass('alert alert-danger').text('Errore nel caricamento del profilo'));
        }
    });
}

function renderProfile(profileData) {
    const labelType = (profileData.tipo === 'studente') ? 'Studente' : 'Professore';
    const container = $('#profileContainer');
    
    // Crea la riga principale
    const row = $('<div>').addClass('row');
    
    // Colonna sinistra (avatar e nome)
    const leftCol = $('<div>')
        .addClass('col-lg-4 text-center mb-4')
        .appendTo(row);
    
    $('<div>')
        .addClass('avatar-circle mx-auto mb-3')
        .append(
            $('<img>')
                .addClass('rounded')
                .attr('src', `https://ui-avatars.com/api/?name=${encodeURIComponent(profileData.Nome)}`)
                .attr('alt', profileData.Nome)
        )
        .appendTo(leftCol);
    
    $('<h3>')
        .addClass('mb-1')
        .text(`${profileData.Nome} ${profileData.Cognome}`)
        .appendTo(leftCol);
    
    $('<p>')
        .addClass('text-muted mb-0')
        .text(labelType)
        .appendTo(leftCol);
    
    // Colonna destra (informazioni)
    const rightCol = $('<div>')
        .addClass('col-lg-8')
        .appendTo(row);
    
    $('<h4>')
        .addClass('mb-3 text-primary')
        .append(
            $('<strong>').addClass('bi bi-person-badge')
        )
        .append(' Informazioni Personali')
        .appendTo(rightCol);
    
    const infoRow = $('<div>')
        .addClass('row g-3')
        .appendTo(rightCol);
    
    createInfoItem(infoRow, 'col-lg-6', 'bi bi-envelope', 'Email', profileData.Mail);
    createInfoItem(infoRow, 'col-lg-6', 'bi bi-calendar', 'Data di Nascita', profileData.DataNascita);
    createInfoItem(infoRow, 'col-lg-6', 'bi bi-card-text', 'Matricola', profileData.Matricola);
    
    if (profileData.tipo === 'professore' && profileData.DataAssunzione) {
        createInfoItem(infoRow, 'col-md-6', 'bi bi-briefcase', 'Data Assunzione', profileData.DataAssunzione);
    }
    
    container.empty().append(row);
}

function createInfoItem(parent, colClass, iconClass, label, value) {
    const col = $('<div>')
        .addClass(colClass)
        .appendTo(parent);
    
    const infoItem = $('<div>')
        .addClass('info-item p-3 bg-light rounded')
        .appendTo(col);
    
    $('<small>')
        .addClass('text-muted d-block mb-1')
        .append(
            $('<strong>').addClass(iconClass)
        )
        .append(` ${label}`)
        .appendTo(infoItem);
    
    $('<strong>')
        .text(value)
        .appendTo(infoItem);
}

$(document).ready(function() {
    caricaProfilo();
});