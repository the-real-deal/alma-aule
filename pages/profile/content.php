<div class="container d-flex justify-content-center align-items-start my-5"> 
    <div class="card border-primary shadow-sm d-flex w-50">
        <div class="card-body justify-content-center px-3 px-md-5 my-3" id="profileContainer">
            <!-- Il contenuto verrà caricato da JavaScript -->
        </div>
    </div>
</div>

<?php 
    require $_SERVER['DOCUMENT_ROOT'] . "/components/reservations/reservations.php";
    require $_SERVER['DOCUMENT_ROOT'] . "/components/reservationstats/reservationsStats.php";
    require $_SERVER['DOCUMENT_ROOT'] . "/components/reports/reports.php";
?>