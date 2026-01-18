
async function loadAule() {
    const container = document.getElementById("aule")
    fetch('/apis/aule.php')
        .then(res => res.json())
        .then(data => {
            let html = ``;

            new Set(data.map(x => x.sede["citta"])).forEach(citta => {
                html += `
            <div class="list-group list-group-flush mb-3">
                <h3>${citta}</h3>
                <hr class="border border-primary border-2 opacity-75 my-1 mx-1">
                ${aule(data.filter(y => y.sede["citta"] === citta))}
            </div>
            `
            })
            container.innerHTML = html;
        })
        .catch(err => console.error(err))

}

function aule(aule) {
    let html = '';
    aule.forEach(a => {
        html += `
        <a class="list-group-item list-group-item-action">
            <div class="d-flex w-100 justify-content-between">
                <h4>${a.nomeAula}</h4>
                <small>${a.numeroPiano}</small>
            </div>
            <div class="container d-flex ">
                <strong>Posti:</strong>
                <span class="ps-1">${a.numeroPosti}</span>
            </div>
            <div class="container d-flex ">
                <strong>Indirizzo:</strong>
                <span class="ps-1">${a.sede["via"]}</span>
            </div>
        </a>
            `
    });
    return html;
}

document.addEventListener('DOMContentLoaded', () => {
    loadAule();
});