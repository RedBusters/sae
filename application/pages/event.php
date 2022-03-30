<?php
require_once 'application/models/invitation.php';
require_once 'application/core/date.php';
require_once 'application/helpers/token.php';
require_once 'application/models/preference.php';

////// Récupération des informations sur l'évènement

if($action =='invitation'){
  $event = get_invitation_by_token($pseudo, $token);
} else if ($action == 'event'){
  $event = get_invitation_by_id($id);
}

if ($event != null) { // Si l'évènement a été trouvé
  extract($event);
  if ($status== ADMIN){
    $idEvent = $event['id'];
    $invitations = get_invitations_by_event($idEvent);
    $titre = "Détail de l'évènement";
  } else {
    $titre="$pseudo, vous êtes invité !";
    $invitations = NULL;
  }
  $_SESSION['idInvitation'] = $idInvitation;
  $_SESSION['pseudo'] = $pseudo;

  $_SESSION['pref_cible']= get_preferences($event["idTarget"]);
} else { // Si on n'a pas trouvé l'évènement
  echo $blade->run('errors.404',['log'=>'Cet évènement n\'existe pas']);
  exit();
}

/////////////////////////// Lancement de la page avec blade

echo $blade->run('event',compact('pseudo','titre','event','invitations'));
?>
