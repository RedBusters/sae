<?php

unset($_SESSION['id']);
unset($_SESSION['mail']);
unset($_SESSION['idInvitation']);
 
header('Location: '.URL_INDEX); 
exit;
?>
