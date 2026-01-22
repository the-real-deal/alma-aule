document.addEventListener("DOMContentLoaded", () => {
    const idAula = sessionStorage.getItem("idAula");
    getAula(idAula);
    const date = new Date().toJSON().slice(0, 10);
    $("#calendar").attr("min", date);
    $("#calendar").val(date);
    loadReservations();

    const container = $("#grid");
    const timeStart = 8;

    for (let i = 1; i < 10; i++) {
        const col = $("<div>").addClass("col-12 col-md-6 col-lg-4");

        const input = $('<input>')
            .addClass("btn-check")
            .attr("id", `btn-${i + timeStart}`)
            .attr("type", "checkbox");

        const label = $('<label>')
            .addClass("btn btn-outline-primary w-100")
            .attr("for", `btn-${i + timeStart}`)
            .text(`${i + timeStart}:00-${i + timeStart + 1}:00`);

        col.append(input).append(label);
        container.append(col);
    }

    $("#calendar").on("input", () => {
        loadReservations();
    });

    $("#book").on("click", () => {
        $(".btn-check:checked").each((index, btn) => {
            const hour = parseInt(btn.id.replace("btn-", ""));
            const date = new Date($("#calendar").val());
            date.setHours(hour + 1);

            $.ajax({
                url: "/apis/reserve.php",
                type: "post",
                data: {
                    idAula: idAula,
                    date: date.toISOString().slice(0, 19).replace('T', ' '),
                    seats: $("#capacity").find(":selected").val()
                }
            });
        });
        loadReservations();
    });
});

function getAula(idAula) {
    $.ajax({
        url: "/apis/aula.php",
        type: "get",
        data: { idAula: idAula },
        success: function (response) {
            const aula = JSON.parse(response);
            $("#title").text(aula.NomeAula);
            $("#address").text(aula.Indirizzo);

            $("#accessibility > *").addClass(aula.Accessibilita ? "text-success" : "text-primary");
            $("#projector > *").addClass(aula.Proiettore ? "text-success" : "text-primary");
            $("#plugs > *").addClass(aula.Prese ? "text-success" : "text-primary");
            $("#lab > *").addClass(aula.Laboratorio ? "text-success" : "text-primary");

            setCapacity(aula.NumeroPosti);
        }
    });
}

function loadReservations() {
    $.ajax({
        url: "/apis/getRoomReservations.php",
        type: "get",
        data: {
            idAula: sessionStorage.getItem("idAula"),
            day: $("#calendar").val(),
            seats: $("#capacity").val()
        },
        success: function (response) {
            // Reset tutti i bottoni
            $(".btn-outline-secondary").removeClass("btn-outline-secondary")
                .addClass("btn-outline-primary");
            $(".btn-check").prop('disabled', false).prop("checked", false);

            const now = new Date();
            const selectedDate = new Date($("#calendar").val());

            const todayStart = new Date(now.getFullYear(), now.getMonth(), now.getDate());
            const selectedDateStart = new Date(selectedDate.getFullYear(), selectedDate.getMonth(), selectedDate.getDate());

            const isToday = selectedDateStart.getTime() === todayStart.getTime();

            $(".btn-check").each((index, btn) => {
                const hour = parseInt(btn.id.replace("btn-", ""));
                if (isToday && hour <= now.getHours()) {
                    $(btn).prop('disabled', true);
                    $(`[for='${btn.id}']`)
                        .removeClass("btn-outline-primary")
                        .addClass("btn-outline-secondary");
                }
            });

            // Disabilita gli slot già prenotati
            const res = JSON.parse(response);
            res.forEach(element => {
                const reservationHour = new Date(element.DataPrenotazione).getHours();
                $(`#btn-${reservationHour}`).prop('disabled', true);
                $(`[for='btn-${reservationHour}']`)
                    .removeClass("btn-outline-primary")
                    .addClass("btn-outline-secondary");
            });
        }
    });
}

function setCapacity(max) {
    for (let i = 1; i <= max; i++) {
        $("#capacity").append($("<option>").val(i).text(i));
    }
}