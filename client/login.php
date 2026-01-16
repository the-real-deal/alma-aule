<?php
$email="tmp@tmp.it";
$pwd="tmp";

if($_REQUEST["REQUEST_METHOD"] == "POST"){
    if(!empty($_POST["email"])){
        echo "<h2>PHP is Fun!</h2>";
        
        
    }
    else{
        echo "<h2>NO</h2>";
    }
    
}

?>
