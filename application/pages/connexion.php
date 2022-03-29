<?php
if(isset($_SESSION['pseudo'])){
    echo $blade->run('profile');
} else {
    echo $blade->run('connexion');
}
?>
