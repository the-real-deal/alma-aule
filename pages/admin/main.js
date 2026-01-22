function caricaReports() {
    // Clear the container before re-rendering to avoid duplicates on refresh
    $('#reportsContainer').empty();

    $.ajax({
        url: "/apis/getAllReports.php",
        type: "GET",
        dataType: "json",
        success: function(response) {
            if (response.success) {
                renderReports(response.data);
            } else {
                $('#reportsContainer').html(
                    `<div class="alert alert-danger" role="alert">${response.message}</div>`
                );
            }
        },
        error: function(error) {
            console.error('Errore nel caricamento:', error);
            $('#reportsContainer').html('<div class="alert alert-danger">Errore nel caricamento</div>');
        }
    });
}

function renderReports(data) {
    const container = $('#reportsContainer');

    if (data.reports.length === 0) {
        container.html(`<div class="alert alert-warning">${data.username}: Nessuna segnalazione</div>`);
        return;
    }
    
    const accordion = $('<div>')
        .addClass('accordion accordion-flush')
        .attr('id', 'accordionExample');
    
    data.reports.forEach((report, index) => {
        const item = createReportItem(report, index);
        accordion.append(item);
    });
    
    container.append(accordion);
}

function createReportItem(report, index) {
    const accordionItem = $('<div>').addClass('accordion-item');
    const header = $('<p>').addClass('h2 fw-bold accordion-header').appendTo(accordionItem);
    
    const button = $('<button>')
        .addClass('accordion-button collapsed')
        .attr({
            'type': 'button',
            'data-bs-toggle': 'collapse',
            'data-bs-target': `#collapse${index}`
        })
        .appendTo(header);
    
    const row = $('<span>').addClass('row g-3 w-100 align-items-center').appendTo(button);
    
    const formattedDate = new Date(report.DataPrenotazione).toLocaleDateString('it-IT', { 
        year: 'numeric', month: 'long', day: 'numeric' 
    });
    
    createReportInfoCol(row, 'col-md-3', 'NomeAula', report.NomeAula);
    createReportInfoCol(row, 'col-md-3', 'Data', formattedDate);

    const statusCol = $('<span>').addClass('col-md-2').appendTo(row);
    $('<small>').addClass('text-muted d-block mb-1 text-uppercase').text('Risolto').appendTo(statusCol);
    
    const checkbox = $('<input>')
        .addClass('form-check-input bg-primary')
        .attr('type', 'checkbox')
        .attr('style', 'width: 25px; height: 25px;')
        .prop('checked', report.Stato == 1)
        .on('click', function(e) {
            e.stopPropagation();
        })
        .on('change', function() {
            updateReportStatus(report.CodiceSegnalazione);
        })
        .appendTo(statusCol);
    
    const collapseDiv = $('<div>')
        .addClass('accordion-collapse collapse')
        .attr('id', `collapse${index}`)
        .attr('data-bs-parent', '#accordionExample')
        .appendTo(accordionItem);
    
    $('<div>').addClass('accordion-body').text(report.Descrizione).appendTo(collapseDiv);
    
    return accordionItem;
}

function updateReportStatus(reportId) {
    fetch("/apis/updateReportsStatus.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify({
            id: reportId
        })
    })
    .then(response => response.json())
    .then((decodedResponse) => {
        console.log(decodedResponse)
        caricaReports()
    })
    .catch(() => alert("Errore durante l'aggiornamento"));
}

function createReportInfoCol(parent, colClass, label, value) {
    const col = $('<span>').addClass(colClass).appendTo(parent);
    $('<small>').addClass('text-muted text-uppercase d-block mb-1').text(label).appendTo(col);
    $('<strong>').text(value).appendTo(col);
}

$(document).ready(function() {
    caricaReports();
});