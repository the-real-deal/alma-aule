<?php
require $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';
class Site
{
    public $siteId;
    public $street;
    public $lat;
    public $lon;
    public $city;
    public function __construct($site)
    {
        $this->siteId = $site[0];
        $this->street = $site[1];
        $this->lat = $site[2];
        $this->lon = $site[3];
        $this->city = $site[4];
    }

    public function getId()
    {
        return $this->siteId;
    }
}
class Room
{
    public $site;
    public $roomId;
    public $roomName;
    public $floorNumber;
    public $seatsNumber;
    public $accessibility;
    public $projector;
    public $plugs;
    public $laboratory;
    public function __construct($site, $roomId, $roomName, $floorNumber, $seatsNumber, $accessibilita, $projector, $plugs, $laboratory)
    {
        $this->site = new Site($site); //must insert $site as class site
        $this->roomId = $roomId;
        $this->roomName = $roomName;
        $this->floorNumber = $floorNumber;
        $this->seatsNumber = $seatsNumber;
        $this->accessibilita = $accessibilita;
        $this->projector = $projector;
        $this->plugs = $plugs;
        $this->laboratory = $laboratory;
    }
}

$rooms = array();
$sedi = $dbh->getSites()->fetch_all();
foreach ($sedi as $s) {

    foreach ($dbh->getSiteRooms($s[0])->fetch_all() as $a) {
        $tmp = new Room(
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
        array_push($rooms, $tmp);
    }
}

echo json_encode($aule);
