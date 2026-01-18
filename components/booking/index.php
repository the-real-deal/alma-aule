<!DOCTYPE html>
<html lang="en">

<head>
    <?php require "{$_SERVER['DOCUMENT_ROOT']}/components/common/head.php" ?>
    <title>Booking - Alma Aule</title>
    <?php require "{$_SERVER['DOCUMENT_ROOT']}/components/common/map/map.php" ?>
    <script src="booking.js"></script>
</head>

<body>
    <script src="/auth.js"></script>
    <header>
        <?php require "{$_SERVER['DOCUMENT_ROOT']}/components/common/navbar/navbar.php" ?>
    </header>
    <main>
        <div class="container-fluid d-flex gap-2">

            <div class="col card">
                <h2 class="card-header bg-primary text-light">Aule</h2>
                <div class="card-body">
                    <div id="aule" class="list-group list-group-flush">

                    </div>
                </div>
            </div>
            <div class="col" id="map"></div>
        </div>


    </main>

</body>

</html>