<?php

require_once 'application/models/invitation.php';
require_once 'application/helpers/token.php';

$invitations = get_invitations_by_event($id);

foreach($invitations as $ligne){
    echo $ligne["pseudo"], " ", url_token_raw($ligne["pseudo"],$ligne["token"]) , "\n";
}
    



?>