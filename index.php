<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La premiere page</title>
    <link rel="stylesheet" href="./css/index.css">
</head>
<body>
<header>
        <a class="logo" href="./">Item librairie</a>
        <ul>
            <li><a href="./">Accueil</a></li>
            <li><a href="">Catégories</a></li>
            <li><a href="connexion.php">Connexion</a></li>
            <form action="" method="post">
                <input type="search" name="search" id="search" placeholder="rechercher">
            </form>
            <li><a href="inscription.php" class="inscription">Inscription</a></li>
            <li><a href="" class="inscription">Vendre</a></li>
        </ul>
    </header>



<section>
    <div id ="content">
        <h3>Categories</h3>
            <div id = "posted">
                <div class="livres">
                    <img src="images/photo_2023-10-04_16-46-34.jpg" alt="">
                    <a class="title" href="voir.php">livre1</a>
                    <div class="ajout">
                        <button type="submit"><a href="">Ajouter au panier</a></button>
                    </div>
                </div>
                <div class="livres">
                    <img src="images/photo_2023-10-04_16-46-34.jpg" alt="">
                    <a class="title" href="voir.php">livre2</a>
                    <div class="ajout">
                        <button type="submit"><a href="">Ajouter au panier</a></button>
                    </div>
                </div>
                <div class="livres">
                    <img src="images/photo_2023-10-04_16-46-34.jpg" alt="">
                    <a class="title" href="voir.php">livre3</a>
                    <div class="ajout">
                        <button type="submit"><a href="">Ajouter au panier</a></button>
                    </div>
                </div>
                <div class="livres">
                    <img src="images/photo_2023-10-04_16-46-34.jpg" alt="">
                    <a class="title" href="voir.php">livre4</a>
                    <div class="ajout">
                        <button type="submit"><a href="">Ajouter au panier</a></button>
                    </div>
                </div>
                <div class="livres">
                    <img src="images/photo_2023-10-04_16-46-34.jpg" alt="">
                    <a class="title" href="voir.php">livre5</a>
                    <div class="ajout">
                        <button type="submit"><a href="">Ajouter au panier</a></button>
                    </div>
                </div>
                <div class="livres">
                    <img src="images/photo_2023-10-04_16-46-34.jpg" alt="">
                    <a class="title" href="voir.php">livre5</a>
                    <div class="ajout">
                        <button type="submit"><a href="">Ajouter au panier</a></button>
                    </div>
                </div>
            </div>
           
    </div>



    </section>
</body>
</html>