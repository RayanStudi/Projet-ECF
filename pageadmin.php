<?php
    session_start();
    if(!$_SESSION['password'])
    {
        header('Location: admin.html');
    }

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Page administrateur</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="/css/suite.css">
    </head>
    <body>
        <a href="geresuite.html" class="suite">Gérer les etablissement</a>
    </body>
</html>