<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once "{$_SERVER['DOCUMENT_ROOT']}/components/common/head.php"?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./landing.css" rel="stylesheet">
    <script src="../common/animatedBackground.js"></script>
    <script src="./landing.js"></script>
    <title>Alma Aule — Landing page</title>
</head>
<body class="d-flex justify-content-center align-items-center">
    <main class="text-center text-white">
        <h1 class="display-1 fw-bold">Alma Aule</h1>
        <div class="fs-3">Prenota un'aula o una sala studio in pochi click.</div>
        <button class="btn btn-primary mt-4" onclick='handleLogInClick'>Accedi al servizio</button>
    </main>
</body>
</html>