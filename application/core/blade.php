<?php //Création de la variable $blade
require 'vendor/autoload.php';
use eftec\bladeone\BladeOne;

$views = 'application/views';
$cache = 'cache';
$blade = new BladeOne($views,$cache,BladeOne::MODE_DEBUG);

require 'application/config/blade.php';
?>
