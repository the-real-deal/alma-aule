# Alma Aule
> Progetto finale per il corso di Tecnologie Web, LT Ingegneria e Scienze Informatiche @ Università di Bologna, Campus di Cesena

## Componenti del gruppo
- Cristian Di Donato, `cristian.didonato@studio.unibo.it`
- Nicholas Magi, `nicholas.magi@studio.unibo.it`
- Samuele Trapani, `samuele.trapani@studio.unibo.it`

## Installazione

Per aggiungere la repo a XAMPP bisogna:
1. Aprire il terminale all'interno della cartella `XAMPP` creata dal wizard di installazione.

2. Eliminare la cartella `xamppfiles/htdocs`: 
```sh
rm -rf xamppfiles/htdocs
```

3. Posizionarsi all'interno della cartella `xamppfiles`:
```sh
cd xamppfiles
```

4. Clonare la repository tramite il comando:
```sh
git clone git@github.com:the-real-deal/alma-aule.git htdocs
```

5. Aprire il browser e andare su `localhost` (previo avvio del server Apache di XAMPP).

## Struttura del progetto
```
.
├── apis/
│   ├── aule.php
│   ├── login.php
│   ├── ...
├── assets/
│   ├── css/
│   ├── fonts/
│   └── imgs/
├── bootstrap.php
├── components/
│   ├── common/
│   │   ├── head.php
│   │   └── navbar/
│   │       ├── navbar.css
│   │       ├── navbar.js
│   │       └── navbar.php
│   ├── map/
│   │   ├── map.css
│   │   ├── map.include
│   │   └── map.js
|   |__ ...
├── config.php
├── db/
|── docs/
├── index.php
├── lib/
│   ├── js/
│   │   ├── animatedBackground.js
│   │   ├── auth.js
│   │   ├── jquery-3.7.1-min.js
│   │   └── logout.js
│   └── php/
│       ├── auth.php
│       ├── fileutils.php
│       └── links.php
├── pages/
│   ├── 404/
│   │   ├── content.php
│   │   ├── index.php
│   │   ├── main.js
│   │   └── style.css
│   ├── booking/
│   ├── home/
│   ├── landing/
│   ├── login/
│   └── profile/
│   └── ...
├── README.md
├── template/
│   ├── base.php
│   └── fullpage.php
└── TODO.md
```

## Come progettare una pagina

### Template
Tutte le pagine dell'applicazione hanno un minimo comune denominatore, che è un **template**. 

Un template determina il layout generale della pagina (dove è collocata la navbar, dove sta il contenuto principale e dove si trova il footer).

È possibile osservare le varianti di template disponibili all'interno della cartella `template`.

### Impostazioni della pagina
All'interno di un file `template` si fa riferimento ad una variabile globale `$page`, che consiste in un array associativo in cui ad ogni chiave corrisponde parametro della pagina, e ad ogni valore il valore del parametro.

In particolare, all'interno di `$page` possiamo impostare i seguenti parametri:
| PARAMETRO           	| TIPO          	| DESCRIZIONE                                                                                                                                         	|
|---------------------	|---------------	|-----------------------------------------------------------------------------------------------------------------------------------------------------	|
| `"title"`             	| `string\|NULL`  	| Il titolo della pagina (mostrato, per esempio, nelle tab del browser).                                                                              	|
| `"content"`           	| `string`        	| Il percorso al contenuto della pagina `.php`.                                                                                                       	|
| `"css"`               	| `array<string>` 	| I percorsi/URL ai fogli di stile che devono essere collegati alla pagina.                                                                           	|
| `"js"`                	| `array<string>` 	| I percorsi/URL agli script javascript che devono essere collegati alla pagina.                                                                      	|
| `"container-classes"` 	| `string\|NULL`  	| Una stringa che contiene alcune classi CSS che devono essere applicate al container del contenuto della pagina (tipicamente è l'elemento `<main>`). 	|
| `"container-id"`      	| `string\|NULL`  	| Un id da associare al al container del contenuto della pagina (tipicamente è l'elemento `<main>`).                                                  	|

### Struttura & creazione di una pagina
Per creare una pagina occorre seguire i seguenti step:
1. Crea una cartella all'interno di `pages` con il nome della pagina (ad esempio, `home`)
2. All'interno di `pages/home` crea i seguenti file:
    - `index.php`: "entry point" della pagina, qui vengono configurati tutti i parametri precedentemente elencati
    - `content.php`: il contenuto effettivo della pagina (che non deve essere il contenuto di un intero documento HTML, ma solo la parte centrale di interesse della pagina)
    - (opzionali) `main.js`, `style.css` o qualunque altro foglio di script/stile necessario.
3. In `index.php`, seguire una struttura simile:
```php
<?php
    require_once "{$_SERVER['DOCUMENT_ROOT']}/bootstrap.php";
    $page_name = FileUtils::getFolderName($_SERVER['PHP_SELF']);
    // opzionale!
    $page["title"] = "Home";
    $page["content"] = "{$_SERVER['DOCUMENT_ROOT']}/pages/{$page_name}/content.php";
    // opzionale!
    $page["css"] = [ 
        "/pages/{$page_name}/style.css",
        "https://unpkg.com/leaflet@1.9.4/dist/leaflet.css",
        "/components/map/map.css", 
    ];
    // opzionale!
    $page["js"]= [ 
        "https://unpkg.com/leaflet@1.9.4/dist/leaflet.js",
        "/components/map/map.js", 
        "/pages/{$page_name}/main.js",
    ];
    require "{$_SERVER['DOCUMENT_ROOT']}/template/base.php";
```
4. Osservare come dev'essere - in linea di massima - la struttura di `content.php`:

```html
<div id="map"></div>
<section class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-uppercase mb-0">Le Tue Prenotazioni</h2>
        <a class="text-primary text-decoration-none fw-semibold" href="#">Vedi tutte</a>
    </div>

    <div class="card shadow-sm mb-4">
        <div class="card-body p-4" id="prenotazioniContainer">
            <div class="text-center py-5">
                <div class="spinner-border text-primary" role="status">
                    <span class="visually-hidden">Caricamento...</span>
                </div>
                <p class="mt-3 text-muted">Caricamento prenotazioni...</p>
            </div>
        </div>
    </div>

    <div class="card shadow-sm">
        <div class="card-body p-4">
            <h3 class="card-title mb-4">Statistiche</h3>
            <div class="row g-3">
                <div class="col-12">
                    <div class="d-flex justify-content-between align-items-center py-3 border-bottom">
                        <span class="text-muted">Totale Prenotazioni</span>
                        <span class="badge bg-primary fs-6" id="totalePrenotazioni">0</span>
                    </div>
                </div>
                <div class="col-12">
                    <div class="d-flex justify-content-between align-items-center py-3">
                        <span class="text-muted">Prenotazioni Future</span>
                        <span class="badge bg-primary fs-6" id="prenotazioniFuture">0</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
```

## Importante!
> [!IMPORTANT]
> Quando è necessario referenziare la pagina all'interno dell'applicazione, si può optare per una delle seguenti possibilità:
> * `/pages/<nome_pagina>/index.php`
> * `/pages/<nome_pagina>`
> * `/<nome_pagina>/`
>
> È preferibile l'ultima, e ricorda di evitare **sempre** di referenziare `content.php`!


## Configurazione Iniziale

### File Config
Affinché l'applicativo funzioni correttamente, è necessario modificare il file di configurazione:

* Apri il file `config`.
* Imposta il campo `PORT` con il valore della porta **MySQL** utilizzata da **XAMPP**.

> **Attenzione:** Se la porta non corrisponde a quella indicata su XAMPP, l'applicativo non riuscirà a connettersi al database.

### Setup del Database
Per clonare e installare il database necessario:

1. Accedi al pannello di controllo su `localhost/phpmyadmin`.
2. Seleziona la funzione **Importa**.
3. Carica il file `almaule.sql` che trovi all'interno della cartella `db` del progetto.

---

## Credenziali di Accesso

Di seguito sono riportati gli account di test pre-configurati per le varie tipologie di utente:

| Ruolo | Descrizione | Email | Password |
| :--- | :--- | :--- | :--- |
| **Studente** | Con prenotazioni e segnalazioni attive | `beagre003@studio.unibo.it` | `StudPass004` |
| **Professore** | Con prenotazioni attive | `fedrus001@studio.unibo.it` | `ProfPass002` |
| **Professore** | Account vuoto (senza storico) | `marmar001@studio.unibo.it` | `ProfPass001` |
| **Admin** | Accesso completo | `vinesp001@studio.unibo.it` | `Admin001` |

---

## Funzionalità della Piattaforma

### Utenti Base (Studenti e Professori)
Tutti gli utenti standard hanno accesso alle seguenti funzioni:
* **Prenotazioni:** Effettuare nuove prenotazioni per aule specifiche.
* **Storico:** Visualizzare la lista delle prenotazioni passate e future.
* **Statistiche:** Consultare dati riguardanti il numero di prenotazioni effettuate.
* **Segnalazioni:**
    * Creare segnalazioni relative a prenotazioni passate (già effettuate).
    * Visualizzare le proprie segnalazioni inviate.

### Amministratore (Admin)
L'utente Admin possiede i privilegi più elevati per la gestione della piattaforma:
* **Gestione Prenotazioni:** Visualizzazione globale di tutte le prenotazioni con possibilità di **modifica** o **eliminazione**.
* **Gestione Segnalazioni:** Visualizzazione di tutte le segnalazioni e possibilità di aggiornare lo stato (es. segnare come *Risolta*).
* **Gestione Aule:** Modifica delle caratteristiche delle aule (es. presenza proiettore, disponibilità prese elettriche, ecc.).
* **Gestione Utenti:** Possibilità di attivare o disabilitare gli account registrati sulla piattaforma.

---

## Documentazione e Analisi
All'interno della cartella `docs` è disponibile il materiale relativo alla fase di analisi e progettazione:

* **Mockup:** Bozze grafiche dell'interfaccia utente.
* **Personas:** Profili utente utilizzati per definire i requisiti.

Consultare questi file per comprendere meglio l'approccio progettuale adottato.