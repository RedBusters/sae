<?php
require_once 'application/core/database.php';

// Retourne la description des préférences d'un utilisateur si elle
// existe, NULL sinon

function get_description($idUser){
  global $pdo;

  $sql = "SELECT valeur FROM preferences WHERE idUser=? AND idcategorie=?";
  $query = $pdo->prepare($sql);
  $query->execute([$idUser, 1]);
  $result = $query->fetch();
  if($result != false) return $result;
  return NULL;
}

//Modifie la description des préférences d'un utilisateur
function set_description($idUser, $description){
  global $pdo;

  $sql="UPDATE preferences SET valeur=? WHERE iduser=? AND idcategorie=1;";
  $query = $pdo->prepare($sql);
  $query->execute([$description, $idUser]);
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
  $table = [];
  $sql ="SELECT * FROM preference WHERE idUser =?";
  $query = $pdo->prepare($sql);
  $query->execute([$idUser]);
  
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
  $table = [];
  $sql ="SELECT * FROM preference WHERE idUser =? AND valeur NOT NULL";
  $query = $pdo->prepare($sql);
  $query->execute([$idUser]);
}

// Définit le score de préférence d'un utilisateur pour une categorie.
// Un score de 0 se traduit par le retrait de la préférence (delete)

function set_preference($idUser,$idCategory,$score){
  global $pdo;

  $sql ="SELECT * FROM preference WHERE idUser =? AND idcategorie=?";
  $query = $pdo->prepare($sql);
  $query->execute([$idUser, $idCategory]);
  $result = $query->fetch();
  if( $result == false || $result == NULL){
    $sql= "INSERT INTO preferences (iduser, idcategorie, valeur) VALUES (?,?,?);";
    $query = $pdo->prepare($sql);
    $query->execute([$idUser, $idCategory, $score]);
  }

}

?>
