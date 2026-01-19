<?php 
require $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

$result = $dbh->getPrenotazioni($_SESSION['username']);

$prenotazioni = 0;
$prenotazioniFuture = 0;
$oggi = date('Y-m-d H:i:s');
$response = [];
?>
<?php
ob_start();
?>
    <div class="carousel-inner">
<?php
if ($result->num_rows > 0) {
    $isFirst = true; // Per la classe active
    while($row = $result->fetch_assoc()) {
        $isFutura = $row['DataPrenotazione'] >= $oggi;
        $badgeClass = $isFutura ? 'bg-success' : 'bg-secondary';
        $badgeText = $isFutura ? 'Futura' : 'Passata';
        
        // Formattazione data in italiano
        $timestamp = strtotime($row['DataPrenotazione']);
        $dataFormattata = date('d/m/Y', $timestamp);
        
        $activeClass = $isFirst ? ' active' : '';
        
        $prenotazioni++;
        if ($isFutura) {
            $prenotazioniFuture++;
        }
    ?>
        <div class="carousel-item<?= $activeClass ?>">
            <div class="p-4">
                <div class="d-flex justify-content-between align-items-start mb-3 flex-wrap gap-2">
                    <h5 class="card-title mb-0 text-primary"><?= htmlspecialchars($row['NomeAula']) ?></h5>
                    <span class="badge <?= $badgeClass ?>"><?= $badgeText ?></span>
                </div>
                <div class="row g-3">
                    <div class="col-md-6 col-lg-3">
                        <small class="text-muted text-uppercase d-block mb-1">Data Prenotazione</small>
                        <strong><?= $dataFormattata ?></strong>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <small class="text-muted text-uppercase d-block mb-1">Via Sede</small>
                        <strong><?= htmlspecialchars($row['Via']) ?></strong>
                    </div>
                    <div class="col-md-6 col-lg-2">
                        <small class="text-muted text-uppercase d-block mb-1">Piano</small>
                        <strong>Piano <?= htmlspecialchars($row['NumeroPiano']) ?></strong>
                    </div>
                    <div class="col-md-6 col-lg-2">
                        <small class="text-muted text-uppercase d-block mb-1">Posti Disponibili</small>
                        <strong><?= htmlspecialchars($row['NumeroPosti']) ?> posti</strong>
                    </div>
                    <div class="col-md-6 col-lg-2">
                        <small class="text-muted text-uppercase d-block mb-1">Persone Prenotate</small>
                        <strong><?= htmlspecialchars($row['NumeroPersone']) ?> persone</strong>
                    </div>
                </div>
            </div>
        </div>
    <?php
        $isFirst = false; // Dopo il primo elemento
    }
    ?>
    </div>
    <?php
    $response['reservations'] = ob_get_clean();
    ob_start();
    ?>

    <!-- Statistiche (fuori dal carosello) -->
    <div class="p-4 pt-0">
        <div class="card shadow-sm">
            <div class="card-body p-4">
                <h3 class="card-title mb-4">Statistiche</h3>
                <div class="row g-3">
                    <div class="col-12">
                        <div class="d-flex justify-content-between align-items-center py-3 border-bottom">
                            <span class="text-muted">Totale Prenotazioni</span>
                            <span class="badge bg-primary fs-6" id="totalePrenotazioni"><?= $prenotazioni ?></span>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="d-flex justify-content-between align-items-center py-3">
                            <span class="text-muted">Prenotazioni Future</span>
                            <span class="badge bg-primary fs-6" id="prenotazioniFuture"><?= $prenotazioniFuture ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
    $response['stats'] = ob_get_clean();
} else { ?>
        <div class="carousel-item active">
            <div class="p-4">
                <p class="text-danger text-center mb-0">Nessuna prenotazione trovata.</p>
            </div>
        </div>
    </div>
<?php
$response['reservations'] = ob_get_clean();
}
echo json_encode($response);
?>