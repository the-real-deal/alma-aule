function createUserCard(user) {
    // 1. Creazione del contenitore principale (colonna)
    const $col = $('<div></div>')
        .addClass('col-12 col-sm-6 col-md-4 col-lg-3 mb-4');

    // 2. Creazione della Card
    const $card = $('<div></div>').addClass('card h-100 shadow-sm');

    // 3. Header della card (opzionale, per dare colore in base al ruolo)
    const headerClass = user.Ruolo === 'Professore' ? 'bg-primary' : 'bg-success';
    const $header = $('<div></div>')
        .addClass(`card-header text-white ${headerClass}`)
        .html(`<small>${user.Username}</small>`);

    // 4. Corpo della card
    const $cardBody = $('<div></div>').addClass('card-body');

    // Titolo (Nome e Cognome)
    const $title = $('<h5></h5>')
        .addClass('card-title')
        .text(`${user.Nome} ${user.Cognome}`);

    // Sottotitolo (Ruolo + eventuale specifica Ordinario)
    const ruoloSpecifica = user.Ordinario ? ' (Ordinario)' : '';
    const $subtitle = $('<h6></h6>')
        .addClass('card-subtitle mb-2 text-muted')
        .text(`${user.Ruolo}${ruoloSpecifica}`);

    // Dettagli (Lista)
    const matricola = user.MatricolaProfessore ?? user.MatricolaStudente ?? 'N/D';
    const $details = $('<p></p>')
        .addClass('card-text small')
        .html(`
            <strong>Email:</strong> ${user.Mail}<br>
            <strong>Matricola:</strong> ${matricola}<br>
            <strong>Data Nascita:</strong> ${new Date(user.DataNascita).toLocaleDateString('it-IT')}<br>
            ${user.DataAssunzione ? `<strong>Assunto il:</strong> ${new Date(user.DataAssunzione).toLocaleDateString('it-IT')}` : ''}
        `);

    // Badge di stato (Attivo/Non Attivo)
    const statusBadge = user.Attivo 
        ? '<span class="badge bg-success">Attivo</span>' 
        : '<span class="badge bg-danger">Inattivo</span>';

    // 5. Assemblaggio
    $cardBody.append($title, $subtitle, $details, statusBadge);
    $card.append($header, $cardBody);
    $col.append($card);

    return $col;
}

$(document).ready(() => {
    const $container = $('#userList');
    const url = '/apis/users.php'
    fetch(url)
        .then(data => data.json())
        .then(users => {
            if (!users.success) {
                throw new Error("Something went wrong!");
            }
            JSON.parse(users.data).forEach(user => {
                $container.append(createUserCard(user));
            })
        });
});