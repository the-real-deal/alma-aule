// Funzione per controllare il localStorage
function checkStoredAuth() {
    const keyName = 'username';
    const dati = localStorage.getItem(keyName);
    if (dati) {
        fetch('/apis/login.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ dati: dati })
        })
        .then(response => response.json())
        .then(data => {
            if(data.success && data.username !== "") { 
                window.location.href = '/home/';
            }
        })
        .catch(error => {
            console.error('ERRORE nella fetch:', error);
        });
    }
}

// Funzione per gestire il login
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
            .then(response => response.text())
            .then(text => {
                try {
                    const data = JSON.parse(text);
                    if(data.success) {
                        localStorage.setItem('username', data.username);
                        window.location.href = '/home/';
                    } else {
                        alert('Email e/o password errati');
                    }
                } catch(e) {
                    console.error('Errore parsing:', e);
                }
            })
            .catch(error => {
                console.error('Errore login:', error);
            });
        });
    }
}


// Esegui entrambe le funzioni quando il DOM è pronto
document.addEventListener('DOMContentLoaded', function() {
    checkStoredAuth();
    setupLoginForm();
});
