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
    
    if(isset($_POST["pref"])) set_preference($_SESSION["id"],1,$_POST["pref"]);

    if(isset($_POST["animaux"])) set_preference($_SESSION["id"],2,$_POST["animaux"]);
    
    if(isset($_POST["cuisine"])) set_preference($_SESSION["id"],3,$_POST["cuisine"]);
    
    if(isset($_POST["enfants"])) set_preference($_SESSION["id"],4,$_POST["enfants"]);
    
    if(isset($_POST["livres"])) set_preference($_SESSION["id"],5,$_POST["livres"]);
    
    if(isset($_POST["maison"])) set_preference($_SESSION["id"],6,$_POST["maison"]);
    
    if(isset($_POST["mode"])) set_preference($_SESSION["id"],7,$_POST["mode"]);
    
    if(isset($_POST["loisirs"])) set_preference($_SESSION["id"],8,$_POST["loisirs"]);
    
    if(isset($_POST["vins"])) set_preference($_SESSION["id"],9,$_POST["vins"]);
    

}

?>