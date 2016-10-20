<?php
include('fonctions.php');
Demarrer();

// Suppression des variables de session
        $_SESSION['id'] = null;
        $_SESSION['pseudo'] = null;

//Suppression de la session
        session_destroy();

        header('Location: index.php');
