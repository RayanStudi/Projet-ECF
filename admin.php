<?php
    session_start();

    if(isset($_POST['id']) && isset($_POST['password']))
    {
        $id_defaut = "admin";
        $password_defaut = "admin456";

        $id = htmlspecialchars($_POST['id']);
        $password = htmlspecialchars($_POST['password']);

        if($id_defaut == $id && $password_defaut == $password)
        {
            $_SESSION['password'] = $password;
            header('Location: pageadmin.php');
        }else {
            echo "Mots de passe ou identifiant incorrect";
        } 
    }else {
        echo "Veuillez mettre les identifiant";
    }

?>