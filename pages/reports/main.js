async function caricaReports() {
    var xhr = new XMLHttpRequest();

    xhr.onload = function() {
        if (xhr.status === 200) {
            const container = document.getElementById('reportsContainer');
            container.innerHTML = xhr.responseText; 
        } 
    };

    xhr.open("GET", "/apis/reports.php", true);
    xhr.send();
}

document.addEventListener('DOMContentLoaded', () => {
    caricaReports();
});