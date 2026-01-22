<h1>Bentornato, 
    <code class="fw-bold">@<?= $_SESSION['username'] ?></code>!
    <hr class="border border-primary border-2 opacity-75 my-1 w-25">
</h1>

<div class="py-5">
    <p class="h2 fw-bold">Ultime segnalazioni ricevute</p>
    <?php 
        require "{$_SERVER['DOCUMENT_ROOT']}/components/reports/reports.php";
    ?>
    <a class="pt-2 d-inline-block w-100 text-primary text-center" href="/pages/admin/reports/">Vedi tutte</a>
</div>
<hr class="mx-auto border border-primary border-2 opacity-75 my-1 w-75">
<div class="py-5">
    <p class="h2 fw-bold pb-3">Ultime prenotazioni</p>
    <?php 
        require "{$_SERVER['DOCUMENT_ROOT']}/components/reservations-table/reservations-table.php";
    ?>
    <a class="pt-2 d-inline-block w-100 text-primary text-center" href="/pages/admin/bookings/">Vedi tutte</a>
</div>