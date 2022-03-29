<?php

require_once 'application/models/invitation.php';
require_once 'application/helpers/token.php';

    if(isset($_GET["id"])){
        $idEvent = $_GET['id'];
        $invitations = get_invitations_by_event($idEvent);
        
        foreach($invitations as $ligne){
            echo $ligne["pseudo"], " ", url_token_raw($ligne["pseudo"],$ligne["token"]) , "\n";
        }
    }



?>