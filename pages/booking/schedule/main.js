document.addEventListener("DOMContentLoaded", () => {
    const idAula = sessionStorage.getItem("idAula");
    getAula(idAula);
    const container = $("#grid");
    const timeStart = 8;
    let row = $("<div>").addClass("row"); // Inizializza la prima row

    for (let i = 1; i < 10; i++) {
        const col = $("<div>").addClass("col pb-1");
        const input = $('<input>')
            .addClass("btn-check")
            .attr("id", `btn-${i}`)
            .attr("type", "checkbox")
            .attr("autocomplete", "off");
        const label = $('<label>')
            .addClass("btn btn-outline-primary text-nowrap align-content-center p-1 w-100 h-100")
            .attr("for", `btn-${i}`)
            .text(`${i + timeStart}:00-${i + timeStart + 1}:00`);

        col.append(input).append(label);
        row.append(col);

        if (i % 3 == 0) {
            container.append(row);
            row = $("<div>").addClass("row"); // Crea una NUOVA row
        }
    }

    // Aggiungi l'ultima row se contiene elementi
    if (row.children().length > 0) {
        container.append(row);
    }
});

function getAula(idAula) {

    $.ajax({
        url: "/apis/aula.php",
        type: "get",
        data: {
            idAula: idAula,
        },
        success: function (response) {
            const aula = JSON.parse(response);
            $("#title").text(aula.NomeAula);
            $("#address").text(aula.Indirizzo);
        }

    });
}
