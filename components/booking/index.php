<!DOCTYPE html>
<html lang="en">

<head>
    <?php require "{$_SERVER['DOCUMENT_ROOT']}/components/common/head.php" ?>
    <title>Booking - Alma Aule</title>
    <?php require "{$_SERVER['DOCUMENT_ROOT']}/components/common/map/map.php" ?>
</head>

<body>
    <main>

        <div id="map"></div>
        <div class="container-fluid"></div>
        <?php
        $data = require "/apis/aule.php";
        foreach ($data as $obj) {
            echo '<h1>$obj["as"]</h1>';
        }
        ?>
    </main>

</body>

</html>