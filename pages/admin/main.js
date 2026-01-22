function caricaReports() {
    $('#reportsContainer').empty();

    $.ajax({
        url: "/apis/getAllReports.php",
        type: "GET",
        dataType: "json",
        success: function(response) {
            if (response.success) {
                allReportsData = response.data.reports;
                renderReports(response.data.reports, response.data.username);
            } else {
                $('#reportsContainer').html(
                    `<div class="alert alert-danger" role="alert">${response.message}</div>`
                );
            }
        },
        error: function(error) {
            $('#reportsContainer').html('<div class="alert alert-danger">Errore nel caricamento</div>');
        }
    });
}

function renderReports(reports, username = "") {
    const container = $('#reportsContainer');
    container.empty(); // Puliamo il container prima di ridisegnare

    if (reports.length === 0) {
        container.html(`<div class="alert alert-warning">Nessun risultato trovato</div>`);
        return;
    }
    
    const accordion = $('<div>')
        .addClass('accordion accordion-flush')
        .attr('id', 'accordionExample');
    
    reports.slice(0, Math.min(reports.length,5)).forEach((report, index) => {
        const item = createReportItem(report, index);
        accordion.append(item);
    });
    
    container.append(accordion);
}

$(document).ready(function() {
    caricaReports();
    setupSearch();
});