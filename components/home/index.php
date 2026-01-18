<!DOCTYPE html>
<html lang="en">

<head>
    <?php require "{$_SERVER['DOCUMENT_ROOT']}/components/common/head.php" ?>

    <title>Home - Alma Aule</title>


    <script src="prenotazioni.js"></script>
    <link href="./home.css" rel="stylesheet">
    <?php require "{$_SERVER['DOCUMENT_ROOT']}/components/common/map/map.php" ?>
</head>

<body>
    <script src="/logout.js" defer></script>
    <header>
        <?php require "{$_SERVER['DOCUMENT_ROOT']}/components/common/navbar/navbar.php"?>
        <!-- <nav class="navbar navbar-expand-md bg-primary">
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
                            <span class="d-inline-block my-auto ps-2 ps-md-0 font-merriweather">Home</span>
                        </a>
                        <a href="/components/booking" class="nav-link text-white d-flex flex-row flex-md-column align-items-start align-items-md-center">
                            <strong class="fs-3 bi bi-door-closed-fill"></strong>
                            <span class="d-inline-block my-auto ps-2 ps-md-0 font-merriweather">Aule</span>
                        </a>
                        <a class="nav-link text-white d-flex flex-row flex-md-column align-items-start align-items-md-center">
                            <strong class="fs-3 bi bi-bookmark-plus-fill"></strong>
                            <span class="d-inline-block my-auto ps-2 ps-md-0 font-merriweather">Prenotazioni</span>
                        </a>
                        <a class="nav-link text-white d-flex flex-row flex-md-column align-items-start align-items-center">
                            <strong class="fs-3 bi bi-person-fill"></strong>
                            <span class="d-inline-block my-auto ps-2 ps-md-0 font-merriweather">Profilo</span>
                        </a>
                        <a id="logoutBtn" class="nav-link text-white d-flex flex-row flex-md-column align-items-start align-items-center">
                            <strong class="fs-3 bi bi-box-arrow-left"></strong>
                            <span class="d-inline-block my-auto ps-2 ps-md-0 font-merriweather">Logout</span>
                        </a>
                    </div>
                </div>
            </div>
        </nav> -->
    </header>
    <main class="p-4">
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
    </main>
</body>

</html>