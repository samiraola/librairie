<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La premiere page</title>
    <link rel="stylesheet" href="./css/categorie.css">
<style>
        body{
            background: rgba(250, 153, 22, 0.49);
        }
        .sous-nav{
        list-style: none;
        display: none;
        position: absolute;
        left : 0;
        top : 30px;
        background-color: #fff;
        width : max-content;
        padding : 10px;
        }
        .sous-nav li a:hover{
            padding: 6px;
            background-color : burlywood;
           
        }
        .sous-nav li{
            text-align : center;
            margin :5px;
        }
        .sous-nav li a{
            
            color : #000;
        }
        .dessous-nav{
            position: relative;
        }
        .dessous-nav:hover .sous-nav{
        display: block;
        }

        

</style>
</head>
<body>
<header>
        <a class="logo" href="./">Item librairie</a>
        <ul>
            <li><a href="./">Accueil</a></li>
            <li class="dessous-nav">
                <a href="">Catégories</a>
                    <ul class="sous-nav">
                        <li><a href="#section1">XVe siècles</a></li>
                        <li><a href="#section2">XVIe siècles</a></li>
                        <li><a href="#section3">XVIIe siècles</a></li>
                    </ul>
            </li>
            <li><a href="../connexion.php">Connexion</a></li>
            <form action="" method="post">
                <input type="search" name="search" id="search" placeholder="rechercher">
            </form>
            <li><a href="../inscription.php" class="inscription">Inscription</a></li>
            <li><a href="" class="inscription">Vendre</a></li>
            <div class="panier"></div>
        </ul>
</header>
<section id="section1">
<div id ="content">
        <h3>Categorie du XVe siècles</h3>
            <div id = "posted">
                <div class="livres">
                    <img src="images/Coll85_AfriqueDuSud_Couverture-small.jpeg" width="200px" height="250px" alt="">
                    <a class="title" href="voir.php">livre1</a>
                    <div class="ajout">
                        <button type="submit"><a href="">Voir+</a></button>
                    </div>
                </div>
                <div class="livres">
                    <img src="images/s-L1200.webp" width="200px" height="250px" alt="">
                    <a class="title" href="voir.php">livre2</a>
                    <div class="ajout">
                        <button type="submit"><a href="">Voir+</a></button>
                    </div>
                </div>
                <div class="livres">
                    <img src="images/15738219393_HSGD8_1000.jpeg" width="200px" height="250px" alt="">
                    <a class="title" href="voir.php">livre3</a>
                    <div class="ajout">
                        <button type="submit"><a href="">Voir+</a></button>
                    </div>
                </div>
</div>    
</section>
<section id="section2">
<div id ="content">
        <h3>Categorie du XVIe siècles</h3>
            <div id = "posted">
                <div class="livres">
                    <img src="images/Coll85_AfriqueDuSud_Couverture-small.jpeg" width="200px" height="250px" alt="">
                    <a class="title" href="voir.php">livre1</a>
                    <div class="ajout">
                        <button type="submit"><a href="">Voir+</a></button>
                    </div>
                </div>
                <div class="livres">
                    <img src="images/s-L1200.webp" width="200px" height="250px" alt="">
                    <a class="title" href="voir.php">livre2</a>
                    <div class="ajout">
                        <button type="submit"><a href="">Voir+</a></button>
                    </div>
                </div>
                <div class="livres">
                    <img src="images/15738219393_HSGD8_1000.jpeg" width="200px" height="250px" alt="">
                    <a class="title" href="voir.php">livre3</a>
                    <div class="ajout">
                        <button type="submit"><a href="">Voir+</a></button>
                    </div>
                </div>
</div>    
</section>
<section id="section3">
<div id ="content">
        <h3>Categorie du XVIIe siècles</h3>
            <div id = "posted">
                <div class="livres">
                    <img src="images/Coll85_AfriqueDuSud_Couverture-small.jpeg" width="200px" height="250px" alt="">
                    <a class="title" href="voir.php">livre1</a>
                    <div class="ajout">
                        <button type="submit"><a href="">Voir+</a></button>
                    </div>
                </div>
                <div class="livres">
                    <img src="images/s-L1200.webp" width="200px" height="250px" alt="">
                    <a class="title" href="voir.php">livre2</a>
                    <div class="ajout">
                        <button type="submit"><a href="">Voir+</a></button>
                    </div>
                </div>
                <div class="livres">
                    <img src="images/15738219393_HSGD8_1000.jpeg" width="200px" height="250px" alt="">
                    <a class="title" href="voir.php">livre3</a>
                    <div class="ajout">
                        <button type="submit"><a href="">Voir+</a></button>
                    </div>
                </div>
</div>    
</section>

