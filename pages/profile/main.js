async function caricaProfilo() {
    var xhr = new XMLHttpRequest();

    xhr.onload = function() {
        if (xhr.status === 200) {
            const container = document.getElementById('profileContainer');
            container.innerHTML = xhr.responseText; 
        } 
    };

    xhr.open("GET", "/apis/profile.php", true);
    xhr.send();
}

document.addEventListener('DOMContentLoaded', () => {
    caricaProfilo();
});