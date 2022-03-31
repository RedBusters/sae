<?php
require_once 'application/models/preference.php';
/* 
['pref' => 'STRING',
 'animaux' => 'INT',
 'cuisine' => 'INT',
 'enfants' => 'INT',
 'livres' => 'INT',
 'maison' => 'INT',
 'mode' => 'INT',
 'loisirs' => 'INT',
 'vins' => 'INT' ],'POST'); */


if(isset($_SESSION["id"])){
    
    set_preference($_SESSION["id"],1,$commentaire);

    set_preference($_SESSION["id"],2,$animaux);
    
    set_preference($_SESSION["id"],3,$cuisine);
    
    set_preference($_SESSION["id"],4,$enfants);
    
    set_preference($_SESSION["id"],5,$livres_et_journaux);
    
    set_preference($_SESSION["id"],6,$maison);
    
    set_preference($_SESSION["id"],7,$mode_et_accessoires);
    
    set_preference($_SESSION["id"],8,$passions_et_loisirs);
    
    set_preference($_SESSION["id"],9,$vins_et_spiritueux);

    header("location: ".URL_INDEX."");

}

?>