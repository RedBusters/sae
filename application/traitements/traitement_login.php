<?php
require_once 'application/core/database.php';
require_once 'application/models/user.php';

if(isset($_POST["mail"]) || isset($_POST["pass"])){

/* 
    

*/

   
    $login = log_in($_POST["mail"], $_POST["pass"]);
    
    
    if($login != null){
        
        
        $_SESSION["id"]= $login["id"];
        $_SESSION["email"] = $_POST["mail"];
        $_SESSION["invitations"] = get_invitations_by_user($login["id"]);
        header('Location: '.URL_INDEX."?action=profile&id=".$_SESSION["id"]);

        exit;

    } else {
        echo "wrong id/pass";
        $sql = "INSERT INTO `users` (`id`, `email`, `mdp`) VALUES ( NULL, ?, SHA1(?) );";
        $query = $pdo->prepare($sql);
        $query->execute( [ $_POST["mail"],$_POST["pass"] ]);
        $id = $pdo->lastInsertId();
        header('Location: '.URL_INDEX."?action=profile&id=".$id);
        //header('Location: '.URL_INDEX."?action=profile&id=".$login["id"]);

        
    } 

    
}


?>