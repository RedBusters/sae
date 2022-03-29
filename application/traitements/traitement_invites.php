<?php
require_once 'application/models/invitation.php';
require_once 'application/helpers/token.php';

if(isset($_GET["accept"])){
    echo "</br> accept set";
    if($_GET["accept"] =='0' ){
        echo "</br> not updating, refused";
        update_status($_GET["inv_id"], "rejected", null );
    } else {
        echo "</br> updating, accepted";
        update_status($_GET["inv_id"], "accepted", null );

        update_targets(get_confirmed_invitations());
    }
    header("location: ".URL_INDEX."");
    
    
}


?>