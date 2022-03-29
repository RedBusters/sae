<?php
if( isset($_SESSION['id']) ){ 
    //
    echo $blade->run('profile');
} else {
    echo $blade->run('login');
}
?>
