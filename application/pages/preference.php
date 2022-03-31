<?php
require_once 'application/models/preference.php';

if(isset($_SESSION["id"])){
    echo $blade->run('preference');
}

?>
