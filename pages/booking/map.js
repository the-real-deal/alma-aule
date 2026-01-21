
let cit;
document.addEventListener("DOMContentLoaded", () => {
    fetch('/apis/citta.php')
        .then(res => res.json())
        .then(data => {
            cit = data;
            const firstScrollSpyEl = document.querySelector('[data-bs-spy="scroll"]')
            firstScrollSpyEl.addEventListener('activate.bs.scrollspy', (e) => {

                el = document.getElementsByClassName("active")[0];
                console.log()
                city = cit.find(x => {
                    console.log(el.getAttribute("href").replace("#citta-", ""))
                    return x["id"] == el.getAttribute("href").replace("#citta-", "")
                });
                console.log(city);
                const map = document.getElementById('map');
                L.map('map').setView([city["lat"], city["lon"]], L.getMinZoom());
            })
        })
        .catch(err => console.error(err));


})

