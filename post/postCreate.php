    <?php
    $pdo = new PDO('mysql:host=localhost;dbname=Blog;port=3306', 'root', '',
    array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        if ($_POST) {
            $titlePost = $_POST['titlePost'];
            $contentPost = $_POST['contentPost'];
            $authorPost = $_POST['authorPost'];

                $req1 = $pdo->prepare("
                INSERT INTO posts(titlePost,contentPost,authorPost)
                VALUES (:titlePost,:contentPost,:authorPost)
            ");
        
                $req1->execute(array(
                    ':titlePost' => $titlePost,
                    ':contentPost' => $contentPost,
                    ':authorPost' => $authorPost,
                ));

        }

    header('location:../index.php');