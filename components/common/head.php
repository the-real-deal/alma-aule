<?php 
    require_once "{$_SERVER['DOCUMENT_ROOT']}/bootstrap.php";
    define("COMMON_DIR", "../common");
    define("ASSETS_DIR", "../../assets");
?>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
<!-- Bootstrap icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
<!-- Global CSS (custom) -->
<link rel="stylesheet" href="<?php echo COMMON_DIR . '/global.css'; ?>">
<!-- JQuery -->
<script src="<?php echo ASSETS_DIR . '/js/jquery-3.7.1-min.js' ?>"></script>
<!-- Bootstrap Bundle (JS) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous" defer></script>

<!-- Navbar -->
<link rel="stylesheet" href="<?php echo COMMON_DIR . '/navbar/navbar.css'; ?>">
<script src="<?php echo COMMON_DIR . '/navbar/navbar.js'; ?>" defer></script>