<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nouveau post</title>
    <link rel="stylesheet" href="../ressouses/css/bootstrap.min.css">
    <link rel="stylesheet" href="../ressouses/css/app.css">
</head>
<body class="bodyBlog">
    <form class="formBlog" action="postCreate.php" method="POST">
        <h4 class="display-4 text-center">
            Formulaire post
        </h4>
        <input type="text" name="authorPost" placeholder="Votre nom">
        <input type="text" name="titlePost" placeholder="Titre du post">
        <textarea name="contentPost" cols="23" rows="3" placeholder="Text du post"></textarea>
        <input type="submit" value="Envoyer">
        <a href="../index.php">Retour</a>
    </form>  
</body>
</html>