<?php    
    try 
    {
        $bdd = new PDO("mysql:host=localhost;dbname=pagination_paris_8;charset=utf8", "root", "Tnlvk0oIyc3wx8Qk");
    }
    catch(PDOException $e)
    {
        die('Erreur : '.$e->getMessage());
    }