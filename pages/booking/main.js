let cities;

async function loadCitta() {
    const container = document.getElementById("citta-nav");
    fetch('/apis/citta.php')
        .then(res => res.json())
        .then(data => {
            cities=data;
            cities.sort();
            loadAule();
            cities.forEach(citta => {
                
                const a = document.createElement('a');
                a.className = "list-group-item list-group-item-action";
                
                a.href = `#${citta["id"]}`;
                const h3 = document.createElement('h5');
                h3.textContent = citta["name"];
                const hr = document.createElement('hr');
                hr.className = 'border border-primary border-2 opacity-75 my-1 mx-1';

                a.appendChild(h3);
                a.appendChild(hr);
                container.appendChild(a);
            })
                
        }).catch(err => console.error(err))
}
async function loadAule() {
    const container = document.getElementById("aule")
    fetch('/apis/aule.php')
        .then(res => res.json())
        .then(data => {
            const fragment = document.createDocumentFragment();
            cities.forEach(city => {
                const a = document.createElement('a');
                a.className = 'list-group list-group-item list-group-flush mb-3';
                a.id = city["id"];
                const h3 = document.createElement('h3');
                h3.textContent = city["name"];

                const hr = document.createElement('hr');
                hr.className = 'border border-primary border-2 opacity-75 my-1 mx-1';

                a.appendChild(h3);
                a.appendChild(hr);
                // Aggiungi le aule filtrate
                console.log(city["name"][0]);
                const auleFiltrate = data.filter(y => y.site["city"].name === city["name"][0]);
                a.appendChild(aule(auleFiltrate));
                fragment.appendChild(a);
            })
            container.appendChild(fragment);
        })
        .catch(err => console.error(err))

}

function aule(aule) {
    const fragment = document.createDocumentFragment();

    aule.forEach(a => {

        const link = document.createElement('a');
        link.href = '/booking/schedule/';
        link.className = 'list-group-item list-group-item-action';
        link.id=a.roomId;
        const topDiv = document.createElement('div');
        topDiv.className = 'd-flex w-100 justify-content-between';

        const h4 = document.createElement('h4');
        h4.textContent = a.roomName;

        const small = document.createElement('small');
        small.textContent = a.floorNumber;

        topDiv.appendChild(h4);
        topDiv.appendChild(small);

        const postiDiv = document.createElement('div');
        postiDiv.className = 'container d-flex';

        const postiStrong = document.createElement('strong');
        postiStrong.textContent = 'Posti:';

        const postiSpan = document.createElement('span');
        postiSpan.className = 'ps-1';
        postiSpan.textContent = a.seatsNumber;

        postiDiv.appendChild(postiStrong);
        postiDiv.appendChild(postiSpan);

        const indirizzoDiv = document.createElement('div');
        indirizzoDiv.className = 'container d-flex';

        const indirizzoStrong = document.createElement('strong');
        indirizzoStrong.textContent = 'Indirizzo:';

        const indirizzoSpan = document.createElement('span');
        indirizzoSpan.className = 'ps-1';
        indirizzoSpan.textContent = a.site["street"];

        indirizzoDiv.appendChild(indirizzoStrong);
        indirizzoDiv.appendChild(indirizzoSpan);

        link.appendChild(topDiv);
        link.appendChild(postiDiv);
        link.appendChild(indirizzoDiv);
        fragment.appendChild(link);
    });
    return fragment;
}

document.addEventListener('DOMContentLoaded', () => {
    loadCitta();
    
});