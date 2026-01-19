<?php 
require $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';
try {
    $data = $dbh->getReportsData($_SESSION['username']);

    if($data) {
       <?php echo json_encode($data)?> 
    }
}
?>