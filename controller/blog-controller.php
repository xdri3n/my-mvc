<?php

class BlogController 
{
    
    public function __construct ()
    {
        include '../model/article-manager.php';
    }

    public function index() 
    {   
        $articles = new ArticleManager();
        $articles->getAll();
        
        include '../view/blog.html.php';
    }
    
    public function article() 
    {
        $article = new ArticleManager();
    
        $article = $article->getElementByID($_GET['id']);
    
        include '../view/article.html.php';
    }
}