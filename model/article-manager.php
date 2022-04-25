<?php

try 
{
    // MODELE => new PDO('mysql:host=myhost;dbname=mydb', 'login', 'password';
    $pdo = new PDO('mysql:host=localhost;dbname=mvc-blog', 'root', 'root', 
    [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
}
catch (exception $pe)
{
    echo 'Erreur : ', $pe->getMessage();
}


class Article 
{
    
    public function getAll() 
    {
        // CONNEXION A LA BDD
        $pdo = $GLOBALS['pdo'];
    
        $sql = 'SELECT * FROM article';
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
    
        return $stmt->fetchAll();
    }
    
    
    public function getElementById($id) 
    {
        $pdo = $GLOBALS['pdo'];
    
        $sql = 'SELECT * FROM article WHERE id = :id';
    
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':id' => $id]);
    
        return $stmt->fetch();
    }
    
    
    public function create(array $data) 
    {
        $pdo = $GLOBALS['pdo'];
    
        $sql = 'INSERT INTO article (title, content, created_at, is_archived), VALUES (:title, :content, :created_at, :is_archived)';
    
        $stmt = $pdo->prepare($sql);
        $stmt->execute($data);
    
        // ON RECUPERE LE DERNIER ID MODIFIE
        return $pdo->lastInsertId();
    }
    
    
    public function update(array $data)
    {
        $pdo = $GLOBALS['pdo'];
    
        $sql = 'UPDATE article SET title = :title, content = :content, :created_at = :created_at, is_archived = :is_archived WHERE id = :id';
    
        $stmt = $pdo->prepare($sql);
        return $stmt->execute($data);
    }
    
    
    public function delete($id) 
    {
        $pdo = $GLOBALS['pdo'];
    
        $sql = 'DELETE FROM article WHERE id = :id';
    
        $stmt = $pdo->prepare($sql);
        return $stmt->execute([':id' => $id]);
    }
}