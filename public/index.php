<?php

// POUR VERIFIER LE PARAMETRE QUI EST PASSE DANS L'URL
// var_dump($_GET);

// SI UN PARAMETRE EST PASSE DANS L'URL JE LE RECUPERE
if (!empty($_GET['controller'])) 
{
    // RECUPERE CE QUI EST PASSEE DANS L'URL
    $controller = $_GET['controller'];
} 
else 
{
    // SINON JE PASSE HOME
    $controller = 'home';
}

// SI LE CONTROLEUR EXISTE JE VAIS CHERCHER LE FICHIER DANS LE BON REPERTOIRE
if(file_exists('../controller/' . $controller . '-controller.php')) 
{
    require '../controller/' . $controller . '-controller.php';

    // SI UNE ACTION EST PASSE EN PARAMETRE J'APPELLE UNE FONCTION DANS LE CONTROLLER AVEC LE NOM DU PARAMETRE PASSE
    if(!empty($_GET['action']))
    {
        $action = $_GET['action'];
        $action();
    }
    else 
    {
        // SINON PAR DEFAUT J'EXECUTE LA FONCTION INDEX DU CONTROLLEUR
        $action = 'index';
        $action();
    }
}
else 
{
    // SI UN CONTROLLEUR EST PASSE EN PARAMETRE MAIS N'EXISTE PAS J'APPELLE LE CONTROLLEUR ERROR404
    require '../controller/error404-controller.php';
    index();
}