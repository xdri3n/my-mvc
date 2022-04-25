<?php

// ON RECUPERE DANS UN VARIABLE "PAGE" LE NOM DE LA PAGE QUI EST ENVOYEE PAR L'URL
// var_dump($_GET);

if (!empty($_GET['controller'])) 
{
    // RECUPERE CE QUI EST PASSEE DANS L'URL
    $controller = $_GET['controller'];
} 
else 
{
    $controller = 'home';
}

if(file_exists('../controller/' . $controller . '-controller.php')) 
{
    require '../controller/' . $controller . '-controller.php';

    if(!empty($_GET['action']))
    {
        $action = $_GET['action'];
        $action();
    }
    else 
    {
        $action = 'index';
        $action();
    }
}
else 
{
    require '../controller/error404-controller.php';
    index();
}
