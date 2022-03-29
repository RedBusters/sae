<?php
require_once 'application/core/database.php';

// Retourne la description des préférences d'un utilisateur si elle
// existe, NULL sinon

function get_description($idUser){
  global $pdo;

  //TODO
}

//Modifie la description des préférences d'un utilisateur
function set_description($idUser, $description){
  global $pdo;

  //TODO
}

// Liste toutes les préférences d'un utilisateur pour chaque
// catégorie. Toutes les catégories sont toujours retournées,
// Même si il n'y a pas de préférence (on a alors la valeur NULL pour le score)
// Les préférences sont triées par ordre alphabétique
// Paramètre : idUser
// Retour : un tableau avec pour chaque ligne les champs :
//      - description
//      - score (éventuellement à NULL)
//      - idCategory

function get_all_preferences($idUser){
  global $pdo;

  //TODO
}

// Liste les préférences d'un utilisateur pour chaque
// catégorie. Les catégories sans score ne sont pas retourénes
// Les préférences sont triées par score décroissant
// Paramètre : idUser
// Retour : un tableau avec pour chaque ligne les champs :
//      - description
//      - score
//      - idCategory

function get_preferences($idUser){
  global $pdo;

  // TODO
}

// Définit le score de préférence d'un utilisateur pour une categorie.
// Un score de 0 se traduit par le retrait de la préférence (delete)

function set_preference($idUser,$idCategory,$score){
  global $pdo;

  //TODO
}

?>
