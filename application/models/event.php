<?php
require_once 'application/core/database.php';

 /**
  * Créé un évènement avec les informations données en paramètre
  * Retourne l'identifiant de l'évènement créé
  */

 function create_event($description,  $event_dt, $max, $reveal_dt){
   global $pdo;
   $sql = 'INSERT INTO event(description,creation_dt,event_dt,max,reveal_dt)
           VALUES(?,CURDATE(),?,?,?)';
   $query = $pdo->prepare($sql);
   $query->execute([$description, $event_dt, $max, $reveal_dt]);
   $id = $pdo->lastInsertId();
   return $id;
 }











?>
