let rooms = [];

function displayRooms(rooms) {
    const $container = $("#listAule");
    $container.empty();
    const uniquesCity = [...new Set(rooms.map(x => x.site["city"].name))];

    $.each(uniquesCity, function (_, city) {
        const filteredRooms = rooms.filter(y => y.site["city"].name === city);

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

function renderAuleInto($target, roomList) {
    $.each(roomList, function (_, a) {
        const $link = $('<a></a>').addClass("list-group-item list-group-item-action");
        const $header = $('<div></div>')
            .addClass('d-flex w-100 justify-content-between')
            .append($('<h4></h4>')
                .text(a.roomName)
                .addClass('pe-3 pe-lg-0'))
            .append($('<small id="floorNumberPlaceholder"></small>')
                .text(a.floorNumber)
                .addClass("d-flex align-items-center badge mb-auto")
            );

        const $posti = $('<div></div>')
            .addClass('container d-flex')
            .append($('<strong>Posti:</strong>'))
            .append($('<span></span>')
                .text(a.seatsNumber)
                .addClass("ps-1")
            );
            
        const $indirizzo = $('<div></div>')
            .addClass('container d-flex')
            .append($('<strong>Indirizzo:</strong>'))
            .append($('<span class="ps-1"></span>')
                .text(a.site["street"])
                .addClass("ps-1")
            );

        $link.append($header, $posti, $indirizzo);
        $target.append($link);
    });
}

function lookForRoom(data) {
    const query = $("#searchRoomInput").val().toLowerCase();
    return data.filter(room =>
        room.roomName.toLowerCase().includes(query) ||
        room.site["city"].name.toLowerCase().includes(query) ||
        room.site["street"].toLowerCase().includes(query)
    );
}

$(function () {
    loadRooms();
    $("#searchRoomInput").on("input", function () {
        displayRooms(lookForRoom(rooms));
    });
});