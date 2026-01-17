const keyName = 'username';
const dati = localStorage.getItem(keyName);

fetch('/apis/login.php', {
    method: 'POST',
    headers: {
        'Content-Type': 'application/json',
    },
    body: JSON.stringify({
        dati: dati
    })
    .then(response => response.json())
    }).then(data => {  
        if(data.success && data.username !== "") { 
            localStorage.setItem(keyName, data.username);
        }
    })
.catch(error => {
    console.error('ERRORE nella fetch:', error);
});