<?php

$pdo = new PDO(
    'mysql:host=localhost;dbname=bLOG;port=3306',
    'root',
    '',
    array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$req1 = $pdo->prepare("SELECT * FROM posts");
$req1->execute();
$posts = $req1->fetchAll(PDO::FETCH_ASSOC);

$req2 = $pdo->prepare("SELECT * FROM comments");
$req2->execute();
$comments = $req2->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyBlog</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    <link rel="stylesheet" href="./ressouses/css/bootstrap.min.css">
    <link rel="stylesheet" href="./ressouses/css/app.css">
    <script src="./ressouses/js/bootstrap.bundle.min.js"></script>
</head>

<body class="bodyBlog">
    <section class="sectionBlog border border-secondary border-5">
        <h1 class="display-4">
            Myblog
        </h1>
        <div class="accordion accordion-flush mx-3 overflow-auto rounded-2" id="accordionFlushExample">
            <div class="accordion-item">
                <?php
                foreach ($posts as $key => $value) {
                ?>
                    <h2 class="accordion-header" id="flush-headingOne">
                        <button class="accordion-button collapsed bg-secondary" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne<?php echo $value['idPost'];?>" aria-expanded="false" aria-controls="flush-collapseOne">
                            <?php echo $value['titlePost'] ?>
                            <?php echo $value['contentPost'] ?>
                            <?php echo $value['authorPost'] ?>
                            <?php echo $value['datePost'] ?>
                            
                            <?php echo $value['idPost'] ?>
                        </button>
                        
                    </h2>
                    <div id="flush-collapseOne<?php echo $value['idPost'];?>" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <?php
                                foreach ($comments as $key => $value2) {
                                    if ($value['idPost'] == $value2['idPost']) {
                                        
                                    echo $value2['contentComment'];
                                    echo $value2['authorComment'];
                                    echo $value2['dateComment'];
                                    }
                                }
                            ?>
                        </div>
                    </div>
                    <a class="mx-auto" href="./comment/commentType.php?id=<?php echo $value['idPost'] ?>">commenter</a>
                <?php
                }
                ?>

            </div>
        </div>
        <a class="aPostAdd my-3 py-2" title="Nouveau post" href="./post/postType.php">
            <i class="far fa-circle"></i>
            <i class="fas fa-circle"></i>
        </a>
    </section>
</body>

</html>