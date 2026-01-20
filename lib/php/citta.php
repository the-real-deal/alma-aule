<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/lib/php/uuid.php';
class City{
    public $name;
    public $id;
    public function __construct($name) {
        $this->name = $name;
        $this->id= guidv4();
    }
    
}
?>