<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La premiere page</title>
    <link rel="stylesheet" href="./css/index.css">
<style>
        .deuxieme{
            width: 100%;
            height: 200px;
            background-color: rgb(148,111,59);
            display: flex;
            border: 1px solid #72582c;
            border-radius: 5px;
            
        }
        .deuxieme .image{
                width: 350px;
                height: 120px;
                display: flex;
                
                align-items: center;
                background-image: url(images/photo_2023-10-04_16-46-50.jpg);
                background-repeat: no-repeat;
                background-size: cover;
                background-position: center;
                margin-top: 35px;
        }
        .deuxieme .recherche:nth-child(2){
           margin-left: auto;
           display: flex;
          align-items: center;
          flex-direction: column;
          

        }
        .recherche input{
            background-color: #ffffff2e;
            color: #fff;
            letter-spacing: 1px;
            text-indent: 35px;
            border: none;
            margin: 10px;
            padding: 10px 15px;
            outline: none;
            border-radius: 10px;
            font-size: 16px;
        }
        .recherche input::placeholder{
          
            color: #fff;
            letter-spacing: 1px;
            text-indent: 35px;
            border: none;
        }

</style>
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
        <h3>Dernière Parutions</h3>
            <div id = "posted">
                <div class="livres">
                    <img src="images/photo_2023-10-04_16-46-34.jpg" alt="">
                    <a class="title" href="voir.php">livre1</a>
                    <div class="ajout">
                        <button type="submit"><a href="">Voir+</a></button>
                    </div>
                </div>
                <div class="livres">
                    <img src="images/photo_2023-10-04_16-46-34.jpg" alt="">
                    <a class="title" href="voir.php">livre2</a>
                    <div class="ajout">
                        <button type="submit"><a href="">Voir+</a></button>
                    </div>
                </div>
                <div class="livres">
                    <img src="images/photo_2023-10-04_16-46-34.jpg" alt="">
                    <a class="title" href="voir.php">livre3</a>
                    <div class="ajout">
                        <button type="submit"><a href="">Voir+</a></button>
                    </div>
                </div>
                <div class="livres">
                    <img src="images/photo_2023-10-04_16-46-34.jpg" alt="">
                    <a class="title" href="voir.php">livre4</a>
                    <div class="ajout">
                        <button type="submit"><a href="">Voir+</a></button>
                    </div>
                </div>
                <div class="livres">
                    <img src="images/photo_2023-10-04_16-46-34.jpg" alt="">
                    <a class="title" href="voir.php">livre5</a>
                    <div class="ajout">
                        <button type="submit"><a href="">Voir+</a></button>
                    </div>
                </div>
                <div class="livres">
                    <img src="images/photo_2023-10-04_16-46-34.jpg" alt="">
                    <a class="title" href="voir.php">livre5</a>
                    <div class="ajout">
                        <button type="submit"><a href="">Voir+</a></button>
                    </div>
                </div>
            </div>
           
    </div>

</section>



<main class="deuxieme">

    <div class="image"></div>
    <div class="recherche">
        <p>Je recherche un ouvrage , un auteur , un sujet</p><input type="text" name="" id="" placeholder="chercher"></div>
</main>    
</body>
</html>