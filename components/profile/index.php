
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require "{$_SERVER['DOCUMENT_ROOT']}/components/common/head.php" ?>
    <title>Profilo - Alma Aule</title>
</head>
<body>
    <script src="/auth.js"></script>
    <header>
        <?php require "{$_SERVER['DOCUMENT_ROOT']}/components/common/navbar/navbar.php"?>
    </header>

    <section class="container mt-4">
        <div class="card shadow-sm mb-4">
            <div class="card-body p-4" id="profileContainer">
                <!-- Il contenuto verrà caricato da JavaScript -->
            </div>
        </div>
    </section>
    
    <script src="profile.js"></script>
</body>
</html>