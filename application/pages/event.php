<?php
require_once 'application/models/invitation.php';
require_once 'application/core/date.php';
require_once 'application/helpers/token.php';
require_once 'application/models/preference.php';
require_once 'application/models/event.php';
require_once 'application/models/user.php';


////// Récupération des informations sur l'évènement

if($action =='invitation'){
  $event = get_invitation_by_token($pseudo, $token);
} else if ($action == 'event'){
  $event = get_invitation_by_id($id);
}
 /* var_dump($event);  */
if ($event != null) { // Si l'évènement a été trouvé
  extract($event);
  $_SESSION["idEvent"] = $_GET["id"];
  if($action =='invitation'){
    
    $titre="$pseudo, vous êtes invité !";
    $invitations = NULL;
    $_SESSION['idInvitation'] = $idInvitation;
    $_SESSION['pseudo'] = $pseudo;
    $_SESSION['pref_cible']= get_preferences($event["idTarget"]);
    
    if ($status== ADMIN){
      
      $invitations = get_invitations_by_event($event['id']);
      
      $titre = "Détail de l'évènement";
    } else {

    }
//    echo $blade->run('event',compact('pseudo','titre','event','invitations'));

  } else{
    if(isset($_SESSION["id"])){
      $invitations = get_invitations_by_event($event['id']);
      //$has_access = false;
      foreach($invitations as $invit){
        //if($invit["id"])
      }
//      echo $blade->run('event',compact('event'));
    }
    
  }

} else { // Si on n'a pas trouvé l'évènement
  echo $blade->run('errors.404',['log'=>'Cet évènement n\'existe pas']);
  exit();
}
$titre="Détail de l'évènement";
/////////////////////////// Lancement de la page avec blade
echo $blade->run('event',compact('pseudo','titre','event','invitations'));
?>
