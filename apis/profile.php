<?php
require_once "{$_SERVER['DOCUMENT_ROOT']}/bootstrap.php";

try {
    $username = $_SESSION['username'];
    $profileData = $dbh->getProfileData($username); 
    
    if ($profileData) {
        $labelType = ($profileData['tipo'] === 'studente') ? 'Studente' : 'Professore';
        ?>
        
        <div class="row">
            <div class="col-lg-4 text-center mb-4">
                <div class="avatar-circle mx-auto mb-3">
                    <img class="rounded" src="https://ui-avatars.com/api/?name=<?= urlencode($profileData['Nome']) ?>" alt="<?= $profileData['Nome'] ?>">
                </div>
                <h3 class="mb-1"><?= $profileData['Nome'] . ' ' . $profileData['Cognome'] ?></h3>
                <p class="text-muted mb-0"><?= $labelType ?></p>
            </div>

            <div class="col-lg-8">
                <h5 class="mb-3 text-primary">
                    <strong class="bi bi-person-badge"></strong> Informazioni Personali
                </h5>
                
                <div class="row g-3">
                    <div class="col-lg-6">
                        <div class="info-item p-3 bg-light rounded">
                            <small class="text-muted d-block mb-1">
                                <strong class="bi bi-envelope"></strong> Email
                            </small>
                            <strong><?= $profileData['Mail'] ?></strong> </div>
                    </div>
                    
                    <div class="col-lg-6">
                        <div class="info-item p-3 bg-light rounded">
                            <small class="text-muted d-block mb-1">
                                <strong class="bi bi-calendar"></strong> Data di Nascita
                            </small>
                            <strong><?= $profileData['DataNascita'] ?></strong>
                        </div>
                    </div>
                    
                    <div class="col-lg-6">
                        <div class="info-item p-3 bg-light rounded">
                            <small class="text-muted d-block mb-1">
                                <i class="bi bi-card-text"></i> Matricola
                            </small>
                            <strong><?= $profileData['Matricola'] ?></strong>
                        </div>
                    </div>

                    <?php if($profileData['tipo'] === 'professore' && isset($profileData['DataAssunzione'])) { ?>
                        <div class="col-md-6">
                            <div class="info-item p-3 bg-light rounded">
                                <small class="text-muted d-block mb-1">
                                    <strong class="bi bi-briefcase"></strong> Data Assunzione
                                </small>
                                <strong><?= $profileData['DataAssunzione'] ?></strong>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>

    <?php
    } else { ?>
        <div class="alert alert-warning" role="alert">
            Profilo non trovato per l'utente: <?= htmlspecialchars($username) ?>
        </div>
    <?php }
} catch (Exception $e) {?>
    <div class='alert alert-danger'>Errore: <?=$e->getMessage()?> </div>
<?php
}
?>