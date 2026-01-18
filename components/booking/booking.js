
async function loadAule(params) {
    const container = document.getElementsByClassName("card-body")
    try {
        const response = await fetch('/apis/aule.php');
        if (!response.ok) {
            throw new Error(`Errore HTTP: ${response.status}`);
        }
        const header = response.headers.get('content-type');
        const text = await response.text;

        let data;
        try {
            data = JSON.parse(text);
        } catch (error) {
            throw new Error('Risposta non valida dal server');
        }
        // if (data.error) {
        //     container.innerHTML = mostraErrore(data.message);
        //     return;
        // }


    } catch (error) {

    }
}

function aule(sede) {

}