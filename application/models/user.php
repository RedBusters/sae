<?php
require_once 'application/core/database.php';

// Essaie de logger un utilisateur
// Retourne null en cas d'échec,
// En cas de succès, retourne l'id et l'email (dans un tableau associatif)

function log_in($email, $password){
  global $pdo;
  $sql = "SELECT * FROM users WHERE email = ? AND mdp = SHA1(?) ;";
  $query = $pdo->prepare($sql);
  
  $query->execute([$email, $password]); 

  $result = $query->fetch();
  if($result != false){
    return ["id" => $result['id'], "email" => $email];
  } else {
    return null;
  }
  
}

// Test si un utilisateur a accès à une invitation
// Retourne un booléen indiquant si cet utilisateur est bien l'invité
function has_access($idUser,$idInvitation){
  global $pdo;
  $sql = "SELECT * FROM invitation WHERE id=$idInvitation";
  $query = $pdo->prepare($sql);
  $query->execute($invitation);
  $result = $query->fetch();
  if($idUser == $result["idTarget"] ) return true;
  return false;

}

// Vérifie si l'accès à une invitation est authorisé,
// en utilisant les informations de la session
// Génère une erreur 401 et sort si ce n'est pas le cas
function check_access($idInvitation){
  global $blade;

  $sql = "SELECT * FROM invitation WHERE id=? AND pseudo=?";

  $query = $pdo->prepare($sql);
  $query->execute([$idInvitation, $_SESSION["pseudo"]]);
  $result = $query->fetch();
  if($result == NULL || $result == false){
    header("HTTP/1.1 401 Unauthorized");
    exit;
  } else {
    return true;
  }

  //TODO
}


/***
 * Retourne toutes les invitations d'un utilisateur, triées par date
 * - event : tous les champs
 * - invitation : tous les champs (id avec comme alias idInvitation)
 * - la cible (invitation aussi) :
 *     pseudo avec comme alias pseudoTarget
 *     idUser avec comme alias idUserTarget
 */
function get_invitations_by_user($idUser){
  global $pdo;
/*   $sql = "SELECT * FROM users WHERE id=?";
  $query = $pdo->prepare($sql);
  $query->execute([$idUser]);
  $user = $query->fetch(); */
  
  $sql = "SELECT event.*, invitation.* , users.email as pseudoTarget, users.id as idUserTarget FROM event JOIN invitation ON event.id= invitation.idEvent JOIN users ON invitation.idTarget=users.id WHERE idTarget=?";
  $query = $pdo->prepare($sql);
  $query->execute([$idUser]);
  $result = $query->fetchall();
  return $result;
}

/***
 * Comme ci-dessus, mais uniquement les invitations d'évènements qui n'ont pas
 * encore eu lieu
 */
function get_future_invitations($idUser){
  global $pdo;

  //TODO

}

?>
