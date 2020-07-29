<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?= $title ?> </title>

    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <a href="index.php"><h1 id="title">Booksss</h1></a>
        <p>Bienvenue sur Booksss !</p> 
        <a href="http://localhost/books/viewForm.php">Ajouter des livres !</a><br>
    </header>

    <main>
        <div id="contenu">
            <?= $content ?>
        </div>
    </main>

    <footer>
        Voici une description rapide de vos livres préférés ! 
    </footer>
</body>
</html>