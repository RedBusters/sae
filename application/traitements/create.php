<?php
require_once 'application/models/event.php';
require_once 'application/models/invitation.php';

///////////// Construction et nettoyage de la liste des pseudos des invités

$pseudos = explode(PHP_EOL,$pseudos); // Découpage en lignes
array_unshift($pseudos,$pseudo); // Ajout du créateur au début
foreach ($pseudos as &$value) {
  $value = htmlspecialchars(trim($value)); // Nettoyage des espaces et caractères spéciaux
}
$pseudos = array_filter($pseudos); // retrait des lignes vides

if (count($pseudos)< 3){ // Si il n'y a pas assez d'invités
  header('Location: '.URL_INDEX.'?action=create');
  exit();
}

/////////////////////////////////////// creation de l'évènement

$idEvent = create_event($description,  $event_dt, $max, $reveal_dt);
$invitations = create_invitations($idEvent, $pseudos);
$idInvitation = $invitations[0]['id'];

//////////////////////////// Connexion automatique à l'évènement créé

$_SESSION['idInvitation'] = $idInvitation;
$_SESSION['pseudo'] = $pseudo;

/////// Redirection sur la page de l'évènement créé

header('Location: '.URL_INDEX.'?action=event&id='.$idInvitation);

?>
