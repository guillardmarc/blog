<?php
    $pdo = new PDO('mysql:host=localhost;dbname=Blog;port=3306', 'root', '',
    array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        if ($_POST) {
            $contentComment = $_POST['contentComment'];
            $authorComment = $_POST['authorComment'];
            $idPost = $_GET['id'];
            var_dump($_POST);

                $req1 = $pdo->prepare("
                INSERT INTO comments(authorComment,contentComment,idPost)
                VALUES (:authorComment,:contentComment,:idPost)
            ");
        
                $req1->execute(array(
                    ':authorComment' => $authorComment,
                    ':contentComment' => $contentComment,
                    ':idPost' => $idPost
                ));

        }

    header('location:../index.php');