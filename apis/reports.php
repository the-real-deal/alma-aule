<?php 
require $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';
try {
    $data = $dbh->getReports($_SESSION['username']);
    if($data->num_rows > 0) {
        ?>
        <div class="accordion accordion-flush justify-content-center" id="accordionExample">
        <?php
        for($i=0;$row = $data->fetch_assoc();$i++) {
            ?>
            <div class="accordion-item">
                <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?=$i?>" aria-expanded="false" aria-controls="collapse<?=$i?>">
                    <div class="w-100">
                        <div class="row g-3">
                            <div class="col-md-6 col-lg-3">
                                <small class="text-muted text-uppercase d-block mb-1">NomeAula</small>
                                <strong><?= htmlspecialchars($row['NomeAula']) ?></strong>
                            </div>
                            <div class="col-md-6 col-lg-3">
                                <small class="text-muted text-uppercase d-block mb-1">Via Sede</small>
                                <strong><?= htmlspecialchars($row['Via']) ?></strong>
                            </div>
                            <div class="col-md-6 col-lg-2">
                                <small class="text-muted text-uppercase d-block mb-1">Piano</small>
                                <strong><?= htmlspecialchars($row['NumeroPiano']) ?></strong>
                            </div>
                            <div class="col-md-6 col-lg-2">
                                <small class="text-muted text-uppercase d-block mb-1">Data Prenotazione</small>
                                <strong><?= htmlspecialchars(date('d/m/Y', strtotime($row['DataPrenotazione']))) ?></strong>
                            </div>
                        </div>
                    </div>
                </button>
                </h2>
                <div id="collapse<?=$i?>" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <?= htmlspecialchars($row['Descrizione']) ?>
                </div>
                </div>
            </div>
        <?php
        }
        ?>
        </div>
        <?php
    } else {
        ?>
        <div class="alert alert-warning" role="alert">
            <?= htmlspecialchars($_SESSION['username']) ?> : Non hai fatto nessuna segnalazione
        </div>
    
<?php
    }
} catch (Exception $e) {
?>
    <div class='alert alert-danger'>Errore: <?=$e->getMessage()?> </div>
<?php
}
?>