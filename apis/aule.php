<?php
require $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';
class Sede
{
    public $codiceSede;
    public $via;
    public $latitudine;
    public $longitudine;
    public $citta;
    public function __construct($sede)
    {
        $this->codiceSede = $sede[0];
        $this->via = $sede[1];
        $this->latitudine = $sede[2];
        $this->longitudine = $sede[3];
        $this->citta = $sede[4];
    }

    public function getCodice()
    {
        return $this->codiceSede;
    }
}
class Aula
{
    public $sede;
    public $codiceAula;
    public $nomeAula;
    public $numeroPiano;
    public $numeroPosti;
    public $accessibilita;
    public $proiettore;
    public $prese;
    public $laboratorio;
    public function __construct($sede, $codiceAula, $nomeAula, $numeroPiano, $numeroPosti, $accessibilita, $proiettore, $prese, $laboratorio)
    {
        $this->sede = new Sede($sede); //must insert $sede as class Sede
        $this->codiceAula = $codiceAula;
        $this->nomeAula = $nomeAula;
        $this->numeroPiano = $numeroPiano;
        $this->numeroPosti = $numeroPosti;
        $this->accessibilita = $accessibilita;
        $this->proiettore = $proiettore;
        $this->prese = $prese;
        $this->laboratorio = $laboratorio;
    }
}

$aule = array();
$sedi = $dbh->getSedi()->fetch_all();
foreach ($sedi as $s) {

    foreach ($dbh->getAulePerSede($s[0])->fetch_all() as $a) {
        $tmp = new Aula(
            $s,
            $a[0],
            $a[1],
            $a[3],
            $a[4],
            $a[5],
            $a[6],
            $a[7],
            $a[8]
        );
        array_push($aule, $tmp);
    }
}
error_log(json_encode($aule));
echo json_encode($aule);
