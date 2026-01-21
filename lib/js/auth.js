// Funzione per controllare il localStorage
function checkStoredAuth() {
    const keyName = 'username';
    const dati = localStorage.getItem(keyName);
    const currentPath = window.location.pathname;
    
    fetch('/apis/login.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ dati: dati })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success && data.username !== "") {
            if (currentPath.includes('/admin') && !data.admin) {
                window.location.href = '/404';
            } else if (currentPath.includes('/login')) {
                window.location.href = data.admin ? '/admin' : '/home';
            }
        } else {

            if (currentPath.includes('/admin')) {
                window.location.href = '/404';
            } else if (!currentPath.includes('/login') && 
                    !currentPath.includes('/landing') && 
                    !currentPath.includes('/404')) {
                window.location.href = '/landing/';
            }
        }
    })
    .catch(error => {
        console.error('ERRORE nella fetch:', error);
    });
}

// Funzione per aggiungere al localStorage al momento del login
function setupLoginForm() {
    const loginForm = document.getElementById('loginForm');

    if (loginForm) {
        loginForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const formData = new FormData(this);
            formData.append('submit', '1');

            fetch('/apis/login.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json()) // Usiamo direttamente .json()
            .then(data => {
                if(data.success) {
                    // Login avvenuto con successo
                    localStorage.setItem('username', data.username);
                    window.location.href = data.admin ? '/admin' : '/home';
                } else {
                    const errorMsg = data.message || "Si è verificato un errore sconosciuto.";
                    $('#loginErrorMessage').text(errorMsg);
                    $('#loginErrorModal').modal('show');
                }
            })
            .catch(error => {
                console.error('Errore login:', error);
                $('#loginErrorMessage').text("Errore di comunicazione con il server.");
                $('#loginErrorModal').modal('show');
            });
        });
    }
}

checkStoredAuth();
setupLoginForm();