<?php
    session_start();
    require_once "config.php";
    if(!$_SESSION['password'])
    {
        header('Location: admin.html');
    }
    if(isset($_POST['Valider']))
    {
        if(!empty($_POST['nom']) && !empty($_POST['ville']) && !empty($_POST['adresse']) && !empty($_POST['description']))
        {
            $nom = htmlspecialchars($_POST['nom']);
            $ville = htmlspecialchars($_POST['ville']);
            $adresse = htmlspecialchars($_POST['adresse']);
            $description = nl2br(htmlspecialchars($_POST['description']));

            $insersuite = $bdd->prepare('INSERT INTO etablissement(nom, ville, adresse, description)VALUES(?, ?, ?, ?)');
            echo "Formulaire compléter";
        }else{
            echo "Compléter le formulaire";
        }
    }
?>
