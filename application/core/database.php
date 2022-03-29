<?php //Connexion à la base (création de $pdo)
require_once 'application/config/config.php';

try {
	// On essaie de créer une instance de PDO.
	$pdo = new PDO("mysql:host=$DB_HOST;dbname=$DB_NAME", $DB_LOGIN, $DB_PASSWORD,
     array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
}
catch(Exception $e) {
  echo "Echec de la connexion à la base de données<br>";
	echo "Paramètres de la connexion définis dans le fichier config/config.php :";
  print_r(compact(['DB_HOST','DB_NAME', 'DB_LOGIN', 'DB_PASSWORD']));
	echo "Message d'erreur reçu : <br>\n ".$e->getMessage()."<br>";
}


 ?>
