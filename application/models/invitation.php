<?php
require_once 'application/core/database.php';
require_once 'application/core/token.php';

define('ADMIN','admin');
define('INVITE','invite');

///////////////////////// Obtenir une  invitation précise //////////////////

//Obtenir les information sur une invitation, à partir du pseudo et du token

function get_invitation_by_token($pseudo,$token){
  global $pdo;
  $sql = 'SELECT event.*, i1.id AS idInvitation, i1.pseudo, i1.status,
                 i2.pseudo AS pseudoTarget
          FROM event
          JOIN invitation AS i1 ON i1.idEvent = event.id
          JOIN invitation AS i2 ON i2.id = i1.idTarget
          WHERE (i1.pseudo = ?) AND (i1.token = ?)';
  $query = $pdo->prepare($sql);
  $query->execute([$pseudo,$token]);
  if ($result = $query->fetch()){
    return $result;
  } else {
    return NULL;
  }
}

/***********
 * Même chose que la requête précédente, mais à partir de l'id
 */

function get_invitation_by_id($idInvitation){
  global $pdo;
  $sql = 'SELECT event.*, i1.id AS idInvitation, i1.pseudo, i1.status,
                i2.pseudo AS pseudoTarget
          FROM event
          JOIN invitation AS i1 ON i1.idEvent = event.id
          JOIN invitation AS i2 ON i2.id = i1.idTarget
          WHERE i1.id = ?';
  $query = $pdo->prepare($sql);
  $query->execute([$idInvitation]);
  if ($result = $query->fetch()){
    return $result;
  } else {
    return NULL;
  }
}

////////////////////////// Obtenir plusieurs invitations d'un évènement en particulier

/********
 * Retourne toutes les invitations pour un évènement, avec le créateur en première ligne
 *     $idEvent
 * retourne :
 *    Un tableau avec pour chaque ligne les champs suivants :
 *    - invitation : Tous
 */

function get_invitations_by_event($idEvent){
  global $pdo;
  $sql = 'SELECT p1.*, p2.pseudo AS pseudoTarget  FROM invitation AS p1
            JOIN invitation AS p2 ON p2.id = p1.idTarget
            WHERE p1.idEvent=? ORDER BY IF(p1.status="'.ADMIN.'",0,1)';
  $query = $pdo->prepare($sql);
  $query->execute([$idEvent]);
  return $query->fetchall();
}

/********
 * Retourne toutes les invitations confirmées pour un évènement, avec le créateur en première ligne
 *     $idEvent
 * retourne :
 *    Un tableau avec pour chaque ligne les champs suivants :
 *    - invitation : Tous
 */

function get_confirmed_invitations($idEvent){
  global $pdo;

  $sql = "SELECT * FROM invitation WHERE idEvent=$idEvent AND status='accepted' ";
  $query = $pdo->prepare($sql);
  $query->execute($invitation);
  return $query->fetchAll();

}


////////////////////////////////////// Modification des invitations ///////////

/**
 * Etablit le lien entre un compte (user) et une invitation
 * paramètres :
 *    $idUser
 *    $idInvitation
 */

function link_invitation($idUser,$idInvitation){
  global $pdo;

  //TODO
}

/***
 * Créé les invitations à partir du tableau des pseudos (le premier est l'admin)
 */

function create_invitations($idEvent,$pseudos){
  $invitations = [];

  //Création des données à insérer
  foreach($pseudos as $pseudo){
    $invitations[] = [
      'token' => generate_token(20),
      'idEvent' => $idEvent,
      'pseudo' => $pseudo,
      'status' =>  INVITE];
  }
  $invitations[0]['status'] = ADMIN; // Le premier de la liste est l'admin

  // Insertion dans la base et récupération des id
  global $pdo;
  $sql = 'INSERT INTO invitation(token,idEvent,pseudo,status)
          VALUES (:token,:idEvent,:pseudo,:status)';
  $query = $pdo->prepare($sql);
  foreach($invitations as &$invitation){
    $query->execute($invitation);
    $invitation['id'] = $pdo->lastInsertId();
  }

  //Calcul des cibles
  update_targets($invitations);
  return $invitations;
}


// Calcul des cibles pour un tableau d'invités
// Pas de valeur de retour, le tableau est modifié directement
function update_targets(&$invitations){
  //affectation des cibles
  $numbers = range(0, count($invitations)-1);
  shuffle($numbers);
  $next = [];
  for($i=0; $i<count($numbers); $i++){
    $next[$numbers[$i]] = $numbers[($i+1)%count($numbers)];
  }

  //Récupération des informations sur les cibles
  for($i=0; $i< count($invitations);$i++){
    $invitations[$i]['idTarget'] = $invitations[$next[$i]]['id'];
    $invitations[$i]['pseudoTarget'] = $invitations[$next[$i]]['pseudo'];
  }

  //Mise à jour dans la base
  global $pdo;
  $sql = 'UPDATE invitation
          SET idTarget=?
          WHERE id=?';
  $query = $pdo->prepare($sql);
  foreach($invitations as $invitation){
    $query->execute([$invitation['idTarget'],$invitation['id']]);
  }
}


/***
 * Met à jour le statut d'un invité, en vérifiant que la modification est possible
 * Si nécessaire, ajuste les cibles via get_confirmed_invitations() et update_targets();
 */

function update_status($idInvitation,$status,$oldStatus){

  if( in_array($status, ["invite", "admin", "accepted", "rejected"] ) ){
    if($status != $oldStatus){
      $sql = "UPDATE invitation SET status = $status WHERE id = $idInvitation;";
      $query = $pdo->prepare($sql);
      $query->execute($invitation);
      
      
    }

  }

  

}

?>
