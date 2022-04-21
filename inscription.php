<?php
    require_once 'config.php';

    if(isset($_POST['nom']) && isset($_POST['email']) && isset($_POST['password']))
    {
        $nom = htmlspecialchars($_POST['nom']);
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);

        $check = $bdd->prepare('SELECT nom, email, password FROM utilisateurs WHERE email = ?');
        $check->execute(array($email));
        $data = $check->fetch();
        $row = $check->rowCount();

        if($row == 0)
        {
            if(strlen($nom) <= 100)
            {
                if(filter_var($email, FILTER_VALIDATE_EMAIL))
                {
                    $password = hash('sha256', $password);
                    $insert = $bdd->prepare('INSERT INTO utilisateurs(nom, email, password) VALUES(:nom, :email, :password)');
                    $insert->execute(array(
                        'nom' => $nom, 'email' => $email, 'password' => $password,
                    ));
                    header('Location:inscription.html?reg_err=succes');
                }else header('Location:inscritpion.html?reg_err=email');
            }else header('Location: inscription.html?reg_err=nom_lenght');
        }else header('Location inscritpion.html?reg_err=already');
    }

    
?>