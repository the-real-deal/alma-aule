<!DOCTYPE html>
<html lang="en">
<head>
    <?php require "{$_SERVER['DOCUMENT_ROOT']}/components/common/head.php" ?>    
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <link href="./style.css" rel="stylesheet">

    <title>Alma Aule</title>
    

    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <script src="map.js" defer></script>
    <script src="prenotazioni.js"></script>

</head>
<body>
    <header>
        <nav class="navbar navbar-expand-md bg-primary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img class="w-25" src="/assets/imgs/logo-unibo.png" alt="Alma Mater Studiorum Logo">
                    <div class="vr"></div>
                    <h1>Alma Aule</h1>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="true" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <div class="navbar-nav">
                        <a class="nav-link">Home</a>
                        <a class="nav-link">Aule</a>
                        <a class="nav-link">Prenotazioni</a>
                        <a class="nav-link">Profilo</a>
                    </div>
                </div>
            </div>
            
        </nav>
    </header>
    <main>
        <div id=map></div>
    </main>

    <div class="container">
        <div class="header">
            <h1>Le Tue Prenotazioni</h1>
            <a href="#" class="vedi-tutte">Vedi tutte</a>
        </div>

        <div class="prenotazioni-card" id="prenotazioniContainer">
            <div class="loading">Caricamento...</div>
        </div>

        <div class="statistiche">
            <h2>Statistiche</h2>
            <div class="stat-row">
                <span class="stat-label">Totale Prenotazioni</span>
                <span class="stat-value" id="totalePrenotazioni">0</span>
            </div>
            <div class="stat-row">
                <span class="stat-label">Prenotazioni Future</span>
                <span class="stat-value" id="prenotazioniFuture">0</span>
            </div>
        </div>
    </div>

</body>
</html>

