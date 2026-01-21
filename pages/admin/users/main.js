let users;

function handleAccountAction(username) {
    fetch('/apis/toggleAccount.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ username: username })
    })
    .then(response => response.json())
    .then(res => {
        const $displayStatus = $('#modalExitStatus');
        const $messageDisplay = $('.modal-body');
        $messageDisplay.empty();
        if (!res.success) {
            $displayStatus.append($('<strong></strong>').addClass('bi bi-robot'));
            $displayStatus.text("Qualcosa è andato storto!");
            $messageDisplay.append($('<code></code>').text('@' + username));
            $messageDisplay.append($('<span></span>')
            .append($('<strong></strong>').text(':impossibile modificarne lo stato.')));
            return;
        }
        const user = users.find(u => u.Username === username);
        if (user) user.Attivo = !user.Attivo;
        displayUsers(users);
        $displayStatus.text("Operazione riuscita!");
        $messageDisplay.append($('<code></code>').text('@' + username));
        $messageDisplay.append($('<span></span>')
        .append($('<strong></strong>').text((user.Attivo ? ' attivato' : ' disattivato')))
            .append(' correttamente.'));
    }).catch(e => {
        throw new Error(e)
    })
}

function createUserCard(user) {
    const $col = $('<div></div>')
        .addClass('col-12 col-sm-6 col-md-4 col-lg-3 mb-4');

    const $card = $('<div></div>').addClass('card h-100 shadow-sm');

    let headerColor;
    switch (user.Ruolo) {
        case 'Professore':
            headerColor = 'bg-primary-subtle text-white';
            break;
        case 'Studente':
            headerColor = 'bg-success-subtle text-dark';
            break;
        default:
            headerColor = 'bg-warning text-dark';
            break;
    }
    const $header = $('<div></div>')
        .addClass(`card-header ${headerColor}`)
        .append($('<small>').text('@'+user.Username));

    const $cardBody = $('<div></div>').addClass('card-body d-flex flex-column');

    const $title = $('<p></p>')
        .addClass('h5 fw-bold card-title')
        .text(`${user.Nome} ${user.Cognome}`);

    const ruoloSpecifica = user.Ordinario ? ' (Ordinario)' : '';
    const $subtitle = $('<h6></h6>')
        .addClass('card-subtitle mb-2 text-muted')
        .text(`${user.Ruolo}${ruoloSpecifica}`);

    const enrollmentNr = user.MatricolaProfessore ?? user.MatricolaStudente ?? 'N/D';
    const $details = $('<p></p>')
        .addClass('card-text small');
    
    $details.append(($('<strong>').text('Email: ')).append(user.Mail+'<br>'));
    $details.append(($('<strong>').text('Matricola: ')).append(enrollmentNr+'<br>'));
    $details.append(($('<strong>').text('Data Nascita: ')).append(new Date(user.DataNascita).toLocaleDateString('it-IT')+'<br>')
    .append(user.DataAssunzione ? `<strong>Assunto il:</strong> ${new Date(user.DataAssunzione).toLocaleDateString('it-IT')}` : ''));


    const $bottomRow = $('<footer></footer>')
        .addClass("d-flex justify-content-between mt-auto");

    const $statusBadge = $('<span class="card-footer"></span>')
        .addClass(`my-auto badge ${user.Attivo ? "bg-success" : "bg-primary"}`)
        .text(`${user.Attivo ? "Attivo" : "Disabilitato"}`);

    const $actionButton = $('<form></form>')
        .attr('method', 'POST')
        .append($('<button></button>')
            .addClass(`btn btn-${user.Attivo ? "primary" : "secondary"}`)
            .text(`${user.Attivo ? "Disabilita" : "Abilita"}`)
            .attr('type', 'button')
            .attr('data-bs-toggle', 'modal')
            .attr('data-bs-target', '#successModal')
            .attr('data-bs-username', user.Username)
            .on('click', (e) => {
                e.preventDefault();
                handleAccountAction(user.Username);
            }));
            
    $bottomRow
        .append($statusBadge)
        .append($actionButton);

    $cardBody.append($title, $subtitle, $details);

    if (user.Ruolo !== 'Admin') {
        $cardBody.append($bottomRow);
    }

    $card.append($header, $cardBody);
    $col.append($card);

    return $col;
}

function lookForUser(data) {
    const query = $("#searchUserInput").val().toLowerCase();
    return data.filter(user =>
        user.Mail.toLowerCase().includes(query) ||
        user.Nome.toLowerCase().includes(query) ||
        user.Cognome.toLowerCase().includes(query) ||
        user.Username.toLowerCase().includes(query)
    );
}

function displayUsers(users) {
    const $container = $('#userList');
    $container.empty();
    users.forEach(user => {
        $container.append(createUserCard(user));
    })
}


$(document).ready(() => {
    const url = '/apis/users.php';
    fetch(url)
        .then(data => data.json())
        .then(fetchedUsers => {
            if (!fetchedUsers.success) {
                throw new Error("Something went wrong!");
            }
            users = JSON.parse(fetchedUsers.data);
            displayUsers(users);
    });

    $("#searchUserInput").on("input", function () {
        displayUsers(lookForUser(users));
    });
});