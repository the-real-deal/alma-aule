function caricaReports() {
    $.ajax({
        url: "/apis/reports.php",
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
            console.error('Errore nel caricamento delle segnalazioni:', error);
            $('#reportsContainer').html(
                '<div class="alert alert-danger" role="alert">Errore nel caricamento delle segnalazioni</div>'
            );
        }
    });
}

function renderReports(data) {
    const container = $('#reportsContainer');
    
    if (data.reports.length === 0) {
        container.html(
            $('<div>')
                .addClass('alert alert-warning')
                .attr('role', 'alert')
                .text(`${data.username} : Non hai fatto nessuna segnalazione`)
        );
        return;
    }
    
    const accordion = $('<div>')
        .addClass('accordion accordion-flush justify-content-center')
        .attr('id', 'accordionExample');
    
    data.reports.forEach((report, index) => {
        const item = createReportItem(report, index);
        accordion.append(item);
    });
    
    container.append(accordion);
}

function createReportItem(report, index) {
    const accordionItem = $('<div>').addClass('accordion-item');
    
    const header = $('<h2>')
        .addClass('accordion-header')
        .appendTo(accordionItem);
    
    const button = $('<button>')
        .addClass('accordion-button collapsed')
        .attr({
            'type': 'button',
            'data-bs-toggle': 'collapse',
            'data-bs-target': `#collapse${index}`,
            'aria-expanded': 'false',
            'aria-controls': `collapse${index}`
        })
        .appendTo(header);
    
    const buttonContent = $('<div>')
        .addClass('w-100')
        .appendTo(button);
    
    const row = $('<div>')
        .addClass('row g-3')
        .appendTo(buttonContent);
    
    const formattedDate = new Date(report.DataPrenotazione).toLocaleDateString('it-IT', { year: 'numeric', month: 'long', day: 'numeric', hour: '2-digit', minute: '2-digit' })
    
    createReportInfoCol(row, 'col-md-6 col-lg-3', 'NomeAula', report.NomeAula);
    createReportInfoCol(row, 'col-md-6 col-lg-3', 'Via Sede', report.Via);
    createReportInfoCol(row, 'col-md-6 col-lg-2', 'Piano', report.NumeroPiano);
    createReportInfoCol(row, 'col-md-6 col-lg-2', 'Data Prenotazione', formattedDate);
    
    const collapseDiv = $('<div>')
        .addClass('accordion-collapse collapse')
        .attr({
            'id': `collapse${index}`,
            'data-bs-parent': '#accordionExample'
        })
        .appendTo(accordionItem);
    
    $('<div>')
        .addClass('accordion-body')
        .text(report.Descrizione)
        .appendTo(collapseDiv);
    
    return accordionItem;
}

function createReportInfoCol(parent, colClass, label, value) {
    const col = $('<div>')
        .addClass(colClass)
        .appendTo(parent);
    
    $('<small>')
        .addClass('text-muted text-uppercase d-block mb-1')
        .text(label)
        .appendTo(col);
    
    $('<strong>')
        .text(value)
        .appendTo(col);
}

$(document).ready(function() {
    caricaReports();
});