let rooms = [];

function displayRooms(rooms) {
    const $container = $("#listAule");
    $container.empty(); // Pulisce il contenitore
    const cittaUnivoche = [...new Set(rooms.map(x => x.sede["citta"]))];

    $.each(cittaUnivoche, function (i, city) {
        const filteredRooms = rooms.filter(y => y.sede["citta"] === city);

        // Creiamo il gruppo per la città
        const $group = $('<div></div>')
            .addClass("list-group list-group-flush mb-3");

        const $title = $('<h3></h3>').text(city);
        const $hr = $('<hr>')
            .addClass("border border-primary border-2 opacity-75 my-1 mx-1");

        $group.append($title, $hr);

        // Aggiungiamo le aule filtrate
        renderAuleInto($group, filteredRooms);

        $container.append($group);
    });
}

function loadRooms() {
    $.getJSON('/apis/aule.php')
        .done(function (data) {
            rooms = data;
            displayRooms(rooms);
        })
        .fail(function (err) {
            console.error("Errore nel caricamento delle aule:", err);
        });
}

function renderAuleInto($target, auleList) {
    $.each(auleList, function (i, a) {
        const $link = $('<a></a>').addClass("list-group-item list-group-item-action");
        const $header = $('<div></div>')
            .addClass('d-flex w-100 justify-content-between')
            .append($('<h4></h4>').text(a.nomeAula))
            .append($('<small></small>').text(a.numeroPiano));

        const $posti = $('<div></div>')
            .addClass('container d-flex')
            .append($('<strong>Posti:</strong>'))
            .append($('<span class="ps-1"></span>').text(a.numeroPosti));

        const $indirizzo = $('<div></div>')
            .addClass('container d-flex')
            .append($('<strong>Indirizzo:</strong>'))
            .append($('<span class="ps-1"></span>').text(a.sede["via"]));

        $link.append($header, $posti, $indirizzo);
        $target.append($link);
    });
}

function lookForRoom(data) {
    const query = $("#searchRoomInput").val().toLowerCase();
    return data.filter(aula =>
        aula.nomeAula.toLowerCase().includes(query) ||
        aula.sede["citta"].toLowerCase().includes(query) ||
        aula.sede["via"].toLowerCase().includes(query)
    );
}

$(function () {
    loadRooms();
    $("#searchRoomInput").on("input", function () {
        displayRooms(lookForRoom(rooms));
    });
});