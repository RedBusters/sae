<?php
require_once 'application/core/routing.php';

// Configuration des routes, c'est à dire l'association entre les pages demandées
// et le code php à exécuter

// Le premier paramètre est la page demandées dans l'url (?action=xxx)


// Le deuxième paramètre indique le fichier php à exécuter (sans l'extension). Par exemple,
// pages/index correspond à pages/index.php
// Par défaut, le répertoire est pages/ et le nom le même que le premier paramètre


// Les paramètres suivants indiquent les éventuelles valeurs attendues,
// avec leurs noms, leurs types, et si il s'agit de GET ou POST
// Le fichier php correspondant n'est lancé que si tous les paramètres
// existent et ont le bon type. Les paramètres validés sont automatiquement convertis
// en variables php de même nom

add_route('index','pages/index'); // route par défaut

// Création d'un nouvel évènement
add_route('create','pages/create'); // formulaire
add_route('create','traitements/create', // traitement
            ['event_dt' => 'DATE',
             'description' => 'STRING',
             'max' => 'FLOAT',
             'pseudo' => 'STRING',
             'reveal_dt' => 'DATE',
             'pseudos' => 'STRING' ],
          'POST');
add_route('create','pages/create',NULL, 'POST'); // Si il manque des valeurs 

// Consultation d'un évènement
add_route('invitation','pages/event',['pseudo' => 'STRING', 'token' => 'STRING'],'GET');
add_route('event','pages/event',['id' => 'INT'],'GET');
add_route('list','traitements/list',['id' => 'INT'],'GET');
add_route('inv_process','traitements/traitement_invites',
[
   'accept' => 'INT',
   'inv_id' => 'INT' // 0 si refusé, 1 si accepté
], 'GET');

add_route('legal','pages/legal');
// Déconnexion
add_route('logout','traitements/logout');
add_route('login','pages/login');
add_route('pref','pages/preference');
add_route('preference','traitements/traite_pref',['pref' => 'STRING', 'animaux' => 'INT','cuisine' => 'INT','enfants' => 'INT','livres' => 'INT','maison' => 'INT','mode' => 'INT','loisirs' => 'INT','vins' => 'INT', ],'POST');
add_route('process_login','traitements/traitement_login',['mail' => 'STRING', 'pass' => 'STRING'],'POST');
add_route('profile','pages/login');




?>
