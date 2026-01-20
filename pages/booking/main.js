let cities;
function getCities() {
    return fetch('/apis/citta.php')
        .then(res => res.json())
        .then(data => data)
        .catch(err => console.error(err));
}
async function loadCitta() {
    const container = $("#citta-nav");
    const cities = await getCities();
    cities.forEach(citta => {
        const a = $('<a>')
            .addClass("list-group-item list-group-item-action")
            .attr('href', `#citta-${citta["id"]}`);

        const h3 = $('<h5>').text(citta["name"]);
        const hr = $('<hr>').addClass('border border-primary border-2 opacity-75 my-1 mx-1');

        a.append(h3).append(hr);
        container.append(a);
    });
}

async function loadAule() {
    const container = $("#aule");
    const cities = await getCities();

    fetch('/apis/aule.php')
        .then(res => res.json())
        .then(data => {
            cities.forEach(city => {
                const a = $('<a>')
                    .addClass('list-group list-group-item list-group-flush mb-3')
                    .attr('id', 'citta-' + city["id"]);

                const h3 = $('<h3>').text(city["name"]);
                const hr = $('<hr>').addClass('border border-primary border-2 opacity-75 my-1 mx-1');

                a.append(h3).append(hr);

                const auleFiltrate = data.filter(y => y.site["city"].name === city.name);
                console.log(`${city.name} aulefiltrate: ${auleFiltrate.length}`);
                a.append(aule(auleFiltrate));
                console.log(auleFiltrate);
                container.append(a);
            });
        })
        .catch(err => console.error(err));
}

function aule(auleList) {
    const fragment = document.createDocumentFragment();

    auleList.forEach(a => {
        const link = $('<a>')
            .attr('href', '/booking/schedule/')
            .addClass('list-group-item list-group-item-action')
            .attr('id', "aula-" + a.roomId);

        const topDiv = $('<div>').addClass('d-flex w-100 justify-content-between');
        topDiv.append($('<h4>').text(a.roomName));
        topDiv.append($('<small>').text(a.floorNumber));

        const postiDiv = $('<div>').addClass('container d-flex');
        postiDiv.append($('<strong>').text('Posti:'));
        postiDiv.append($('<span>').addClass('ps-1').text(a.seatsNumber));

        const indirizzoDiv = $('<div>').addClass('container d-flex');
        indirizzoDiv.append($('<strong>').text('Indirizzo:'));
        indirizzoDiv.append($('<span>').addClass('ps-1').text(a.site["street"]));

        link.append(topDiv).append(postiDiv).append(indirizzoDiv);
        fragment.appendChild(link[0]);
    });

    return fragment;
}

$(document).ready(() => {
    loadCitta();
    loadAule();
});
