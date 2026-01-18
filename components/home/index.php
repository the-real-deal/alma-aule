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
    <script src="/auth.js"></script>
    <header>
        <?php require "{$_SERVER['DOCUMENT_ROOT']}/components/common/navbar/navbar.php"?>
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