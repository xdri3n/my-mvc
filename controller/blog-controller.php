<?php

include '../model/article-manager.php';

function index() 
{   
    $articles = new Article();

    $articles->getAll();
    
    // PRESENTATION DE LA PAGE
    include '../view/blog.html.php';
}

function article() 
{
    include '../view/article.html.php';
}