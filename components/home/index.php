<!DOCTYPE html>
<html lang="en">

<head>
    <?php require "{$_SERVER['DOCUMENT_ROOT']}/components/common/head.php" ?>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <title>Alma Aule</title>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <script src="map.js" defer></script>
    <script src="prenotazioni.js"></script>
    <link href="./home.css" rel="stylesheet">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-md bg-primary">
            <div class="container-fluid px-5">
                <button class="navbar-toggler border-1 border-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="true" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand text-white d-flex align-items-center order-md-last" href="#">
                    <img class="navbar-brand-logo" src="/assets/imgs/logo-unibo.png" alt="Alma Mater Studiorum Logo">
                    <div class="vr my-3 text-white"></div>
                    <h3 class="ps-3 m-0 text-uppercase">
                        Alma<br />Aule
                    </h3>
                </a>     
                <div class="collapse navbar-collapse text-white" id="navbarNav">
                    <div class="navbar-nav gap-1 gap-md-4">
                        <a class="nav-link text-white d-flex flex-row flex-md-column align-items-start align-items-md-center">
                            <strong class="fs-3 bi bi-house-fill"></strong>
                            <span class="d-inline-block my-auto ps-2 font-merriweather">Home</span>
                        </a>
                        <a class="nav-link text-white d-flex flex-row flex-md-column align-items-start align-items-md-center">
                            <strong class="fs-3 bi bi-door-closed-fill"></strong>
                            <span class="d-inline-block my-auto ps-2 font-merriweather">Aule</span>
                        </a>
                        <a class="nav-link text-white d-flex flex-row flex-md-column align-items-start align-items-md-center">
                            <strong class="fs-3 bi bi-bookmark-plus-fill"></strong>
                            <span class="d-inline-block my-auto ps-2 font-merriweather">Prenotazioni</span>
                        </a>
                        <a class="nav-link text-white d-flex flex-row flex-md-column align-items-start align-items-center">
                            <strong class="fs-3 bi bi-person-fill"></strong>
                            <span class="d-inline-block my-auto ps-2 font-merriweather">Profilo</span>
                        </a>
                    </div>
                </div> 
            </div>
        </nav>
    </header>
    <main class="p-4">
        <div id=map></div>
        <section class="container">
            <header class="header">
                <h2 class="text-uppercase">Le Tue Prenotazioni</h2>
                <a class="text-primary" href="#">Vedi tutte</a>
            </header>

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
        </section>
    </main>
</body>

</html>