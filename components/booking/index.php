<!DOCTYPE html>
<html lang="en">

<head>
    <?php require "{$_SERVER['DOCUMENT_ROOT']}/components/common/head.php" ?>
    <title>Booking - Alma Aule</title>
    <?php require "{$_SERVER['DOCUMENT_ROOT']}/components/common/map/map.php" ?>
</head>

<body>
    <script src="/auth.js"></script>
    <header>
        <?php require "{$_SERVER['DOCUMENT_ROOT']}/components/common/navbar/navbar.php"?>
    </header>
    <main>
        <div class="container-fluid d-flex">

            <div class="col card">
                <h2 class="card-header bg-primary text-light">Aule</h2>
                <div class="card-body">
                    <div class="list-group list-group-flush">
                        <div class="list-group list-group-flush mb-3">
                            <h4>Cesena</h4>
                            <hr class="border border-primary border-2 opacity-75 my-1 mx-1">
                            <button type="button" class="list-group-item list-group-item-action " aria-current="true">
                                The current button
                            </button>
                            <button type="button" class="list-group-item list-group-item-action">A second button item</button>
                            <button type="button" class="list-group-item list-group-item-action">A third button item</button>
                            <button type="button" class="list-group-item list-group-item-action">A fourth button item</button>
                            <button type="button" class="list-group-item list-group-item-action">A disabled button item</button>
                        </div>
                        <div class="list-group list-group-flush">
                            <h4>Forlì</h4>
                            <hr class="border border-primary border-2 opacity-75 my-1 mx-1">
                            <button type="button" class="list-group-item list-group-item-action" aria-current="true">
                                The current button
                            </button>
                            <button type="button" class="list-group-item list-group-item-action">A second button item</button>
                            <button type="button" class="list-group-item list-group-item-action">A third button item</button>
                            <button type="button" class="list-group-item list-group-item-action">A fourth button item</button>
                            <button type="button" class="list-group-item list-group-item-action">A disabled button item</button>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col" id="map"></div>
        </div>

    </main>

</body>

</html>