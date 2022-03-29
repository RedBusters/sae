<?php
$blade->includeScope=true;

// Racourcis pour les éléments blade :
// @icon(['icon'=>'home']) au lieu de @include('elements.icon',['icon'=>'home'])
$blade->addInclude('elements.icon', 'icon');
?>
