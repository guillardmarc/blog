<?php
    //Création de la base de données
    $pdo = new PDO('mysql:host=localhost;port=3306','root',''); 
    $sql = "CREATE DATABASE IF NOT EXISTS `Blog` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci";
    $pdo->exec($sql);

    try{
        $pdo = new PDO('mysql:host=localhost;dbname=fichierClients;port=3306','root','',
        array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
     
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
        
        //Création de la table posts
        $req1 = "CREATE TABLE IF NOT EXISTS `Blog`.`posts`(
            `idPost` INT NOT NULL AUTO_INCREMENT,
            `titlePost` VARCHAR(100),
            `contentPost` TEXT,
            `authorPost` VARCHAR(100),
            `datePost` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP, 
            PRIMARY KEY(idPost));";
    
        $pdo->exec($req1);

        // Création de la table comments
        $req2 = "CREATE TABLE IF NOT EXISTS `Blog`.`comments`(
            `idComment` INT NOT NULL AUTO_INCREMENT,
            `authorComment` VARCHAR(100),
            `contentComment` TEXT,
            `dateComment` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP, 
            `idPost` INT(5), 
            PRIMARY KEY(idComment));";

    
        $pdo->exec($req2);

    }
      catch (PDOException $e){
        print "Erreur !: " . $e->getMessage() . "<br/>";
        die();
     }