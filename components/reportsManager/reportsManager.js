let allReportsData = []; // Variabile globale per i dati

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
                $('#reportsContainer').append($("<div>").addClass("alert alert-danger").attr("role=alert").text(response.message));
            }
        },
        error: function(error) {
            $('#reportsContainer').append($("<div>").addClass("alert alert-danger").text("Errore nel caricamento"));
        }
    });
}

function setupSearch() {
    $('#reportInput').on('input', function() {
        const searchTerm = $(this).val().toLowerCase();
        
        // Filtriamo i report basandoci su NomeAula o Descrizione
        const filteredReports = allReportsData.filter(report => {
            return report.NomeAula.toLowerCase().includes(searchTerm) || 
                   report.Descrizione.toLowerCase().includes(searchTerm) ||
                   report.Via.toLowerCase().includes(searchTerm);
        });

        // Relodiamo solo la parte dell'accordion
        renderReports(filteredReports);
    });
}

function renderReports(reports, username = "") {
    const container = $('#reportsContainer');
    container.empty(); // Puliamo il container prima di ridisegnare

    if (reports.length === 0) {
        container.append($("<div>").addClass("alert alert-warning").text("Nessun risultato trovato"));
    }
    
    const accordion = $('<div>')
        .addClass('accordion accordion-flush')
        .attr('id', 'accordionExample');
    
    reports.forEach((report, index) => {
        const item = createReportItem(report, index);
        accordion.append(item);
    });
    
    container.append(accordion);
}

function createReportItem(report, index) {
    const accordionItem = $('<div>').addClass('accordion-item');
    const header = $('<p>').addClass('h2 fw-bold accordion-header').appendTo(accordionItem);
    
    const button = $('<div>') 
        .addClass('accordion-button collapsed')
        .css('cursor', 'pointer') 
        .attr({
            'role': 'button',
            'data-bs-target': `#collapse${index}`,
            'aria-expanded': 'false',
            'aria-controls': `collapse${index}`
        })
        .appendTo(header);
    -
    button.on('click', function(e) {
        if ($(e.target).is('input[type="checkbox"]')) {
            // Si esce dalla funzione immediatamente. Server per non aprire e mostrare
            // La descrizione dell'accordation
            return; 
        }

        const targetCollapse = $(`#collapse${index}`);
        targetCollapse.collapse('toggle');
        
        $(this).toggleClass('collapsed');
        const isExpanded = $(this).attr('aria-expanded') === 'true';
        $(this).attr('aria-expanded', !isExpanded);
    });

    const row = $('<span>').addClass('row g-3 w-100 align-items-center').appendTo(button);
    
    const formattedDate = new Date(report.DataPrenotazione).toLocaleDateString('it-IT', { 
        year: 'numeric', month: 'long', day: 'numeric' 
    });
    
    createReportInfoCol(row, 'col-lg-3', 'NomeAula', report.NomeAula);
    createReportInfoCol(row, 'col-lg-3', 'Data', formattedDate);

    const statusCol = $('<span>').addClass('col-lg-2').appendTo(row);
    $('<small>').addClass('text-muted d-block mb-1 text-uppercase').text('Risolto').appendTo(statusCol);
    
    $('<input>')
        .addClass('form-check-input bg-primary')
        .attr('type', 'checkbox')
        .attr('style', 'width: 25px; height: 25px; cursor: pointer;')
        .prop('checked', report.Stato == 1)
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
    setupSearch();
});