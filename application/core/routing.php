<?php // Gestion des routes (liens entre urls et code à exécuter)

$routes = [];

/*****
 *
 * page : l'url attendue est index.php?page=xxx avec xxx le paramètre page
 * name : nom du fichier (.php) à inclure. c'est ce fichier qui s'occuppe de l'affichage
 * params : tableau associatif donnant les noms et types des paramètres attendus
 *       types : INT / FLOAT / EMAIL / STRING
 *       exemple : [ 'login' => 'STRING', email' => 'EMAIL']
 * method : methode (par défaut get)
 */

function add_route($action ,$name = NULL, $params = NULL, $method = 'GET'){
  if ($name ==  NULL) $name = 'pages/'.$action;
  global $routes;
  $routes[$action][] = ['name' => $name, 'params' => $params, 'method' => $method];
}

/******
* Applique les règles de routages définies (dans config/routes.php)
*/

function route(){
  global $routes;
  $action = isset($_GET['action']) ? $_GET['action'] : 'index';
  $log = "Action $action demandée<br>\n";// routes :".print_r($routes,true)." <br>\n";
  if (isset($routes[$action])) {
    $log .= "L'action est dans les routes<br>\n";
    $rules = $routes[$action];
    foreach ($rules as  $rule) {
      $log .= "Test des règles pour ". $rule['name'] ."<br> \n";
      $log .= print_r($rule,true)." <br>\n";
      $method = $rule['method'];
      if ($_SERVER['REQUEST_METHOD'] != $method) continue;
      $SRC = ($method == 'GET') ? $_GET : $_POST;
      $log .= "Méthode $method, valeurs transmises : ".print_r($SRC,true)." <br>\n";
      $attr = ['action'=>$action];
      $valid = true;
      if ($rule['params'] != NULL){
        $log .= "Vérifications des paramètres :<br>\n";
        foreach ($rule['params'] as $pname => $ptype) {
          $log .= "$pname ($ptype)";
          $valid = $valid && check_arg($attr, $SRC, $pname, $ptype);
          $log .= ($valid ? 'correct' : 'incorrect')."<br>\n";
          if (!$valid) break;
        }
      }
      if ($valid){
        return ['name' => $rule['name'], 'params' => $attr];
      }
    }
  }
  global $blade;
  echo $blade->run('errors.404', ['log'=>$log]);
  exit();
}

function check_type(&$value, $type){
  if ($type==='ANY') return true;
  if (substr($type,-2) == '[]'){ // Si le type est un tableau
    if (!is_array($value)) return false;
    $element_type = substr($type,0,-2);
    // On supprime les éléments vides (null ou '')
    $value=array_values(array_filter($value,function($v) { return !is_null($v) && $v !== ''; }));
    foreach ($value as $v) { // On vérifie le type de ceux qui restent
      if (!check_type($v,$element_type)) return false;
    }
    return true;
  }
  // Si le type n'est pas un tableau
  $flag = array('flags' => FILTER_NULL_ON_FAILURE);
  switch ($type) {
    case 'INT':
        $value = filter_var($value, FILTER_VALIDATE_INT, $flag);
        if ($value === 0) $value="0";
        break;
    case 'FLOAT':
        $value = filter_var($value, FILTER_VALIDATE_FLOAT, $flag);
        break;
    case 'EMAIL':
        $value = filter_var($value, FILTER_VALIDATE_EMAIL, $flag);
        break;
    case 'DATE':
        $value = validateDate($value);
        break;
    case 'STRING':
        $value = filter_var($value, FILTER_SANITIZE_STRING);
        break;
    default:
      return false;
  }
  return $value !== null;
}

function check_arg(&$attr, $SRC, $pname, $ptype){
  if (!isset($SRC[$pname])) return false;
  $value = $SRC[$pname];
  if (!is_array($value)) $value = trim($value);

  if (!check_type($value,$ptype) || ($value==null)) return false;

  $attr[$pname] = $value;
  return true;
}

function validateDate($date, $format = 'Y-m-d'){
    $d = DateTime::createFromFormat($format, $date);
    return ($d && $d->format($format) === $date) ? $date : null;
}


?>
