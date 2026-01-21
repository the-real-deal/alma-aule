<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/lib/php/uuid.php';
class City{
    public $name;
    public $id;
    public $lat;
    public $long;
    public function __construct($id,$name,$lat,$lon) {
        $this->name = $name;
        $this->id= $id;
        $this->lat=$lat;
        $this->long=$lon;
    }
    
}
?>