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

function setupSearch() {
    $('#reportInput').on('input', function() {
        const searchTerm = $(this).val().toLowerCase();
        
        // Filtriamo i report basandoci su NomeAula o Descrizione
        const filteredReports = allReportsData.filter(report => {
            return report.NomeAula.toLowerCase().includes(searchTerm) || 
                   report.Descrizione.toLowerCase().includes(searchTerm) ||
                   report.Via.toLowerCase().includes(searchTerm);
        });

        // Riaffittiamo solo la parte dell'accordion
        renderReports(filteredReports);
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
    
    reports.forEach((report, index) => {
        const item = createReportItem(report, index);
        accordion.append(item);
    });
    
    container.append(accordion);
}

function createReportItem(report, index) {
    const accordionItem = $('<div>').addClass('accordion-item');
    const header = $('<p>').addClass('h2 fw-bold accordion-header').appendTo(accordionItem);
    
    // NOTA BENE: Ho RIMOSSO 'data-bs-toggle': 'collapse'.
    // Ora questo elemento non apre più l'accordion automaticamente.
    const button = $('<div>') 
        .addClass('accordion-button collapsed')
        .css('cursor', 'pointer') 
        .attr({
            'role': 'button',
            // 'data-bs-toggle': 'collapse',  <-- RIMOSSO DELIBERATAMENTE
            'data-bs-target': `#collapse${index}`,
            'aria-expanded': 'false',
            'aria-controls': `collapse${index}`
        })
        .appendTo(header);
    
    // --- GESTIONE MANUALE DEL CLICK ---
    button.on('click', function(e) {
        // Verifica chirurgica: Se l'elemento cliccato è un input checkbox...
        if ($(e.target).is('input[type="checkbox"]')) {
            // ...esci dalla funzione immediatamente. Non fare nulla.
            // La checkbox cambierà stato da sola (comportamento nativo HTML).
            return; 
        }

        // Se siamo arrivati qui, non hai cliccato la checkbox.
        // Quindi vogliamo aprire/chiudere l'accordion.
        const targetCollapse = $(`#collapse${index}`);
        
        // Usiamo il metodo nativo di Bootstrap (o jQuery wrapper) per fare il toggle
        targetCollapse.collapse('toggle');
        
        // OPZIONALE: Gestione visiva della classe 'collapsed' sul bottone
        // (Bootstrap lo fa in automatico sugli eventi, ma per sicurezza visiva immediata):
        $(this).toggleClass('collapsed');
        const isExpanded = $(this).attr('aria-expanded') === 'true';
        $(this).attr('aria-expanded', !isExpanded);
    });

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
        .attr('style', 'width: 25px; height: 25px; cursor: pointer;')
        .prop('checked', report.Stato == 1)
        .on('change', function() {
            // Qui parte solo la chiamata al server
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