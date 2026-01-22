<?php
require "{$_SERVER['DOCUMENT_ROOT']}/bootstrap.php";

$id = intval($_POST['id']);

if ($dbh->deleteReservation($id)) {
    echo json_encode([
        'success'=> true,
        'message'=> "Prenotazione correttamente eliminata!"
    ]);
} else {
    echo json_encode([
        'success'=> false,
        'message'=> "Qualcosa è andato storto :\\"
    ]);
}