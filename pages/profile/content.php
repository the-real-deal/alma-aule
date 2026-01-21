<div class="container d-flex justify-content-center align-items-start my-5"> 
    <div class="card border-primary shadow-sm d-flex w-100">
        <div class="card-body justify-content-center px-3 px-md-5 py-5" id="profileContainer">
            <!-- Il contenuto verrà caricato da JavaScript -->
        </div>
    </div>
</div>

<?php 
    require $_SERVER['DOCUMENT_ROOT'] . "/components/reservations/reservations.php";
    require $_SERVER['DOCUMENT_ROOT'] . "/components/reservationstats/reservationsStats.php";
?>

<section class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-uppercase mb-0">Le tue segnalazioni</h2>
    </div>

    <div class="card border-primary shadow-sm d-flex">
        <?php 
            $reportsComponent['container-classes'] = "card-body justify-content-center px-3 px-md-5 my-3";
            require "{$_SERVER['DOCUMENT_ROOT']}/components/reports/reports.php";
        ?>
    </div>
</section>