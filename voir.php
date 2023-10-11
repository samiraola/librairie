<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="./css/connexion.css">
    <style>
        section {
            flex-grow: 1;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        #content {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 2em;
            width: 100%;
            max-width: 1200px;
        }

        #content .livre{
            display: flex;
            flex-direction: column;
            width: 100%;
            max-width: 900px;
            gap: 1.5em;
        }

        #content .livre .title{
            text-transform: uppercase;
            text-align: center;
        }

        #content .livre img{
            width: 100%;
           
        }

        #content .livre p{
            text-align: justify;
        }

        #content .livre .description{
            padding: 10px;
            font-size: 1.2em;
            font-weight: 900;
            color: #333;
        }

        #content .livre .details{
            width: 100%;
            display: flex;
            padding: 5px;
            justify-content: space-between;
            font-weight: 700;
        }

    </style>
    
</head>
<body>
    <nav>
        <a class="logo"   href="">Livres</a>
        <ul>
            <li><a href="./">Accueil</a></li>
            <li><a href="">Catégories</a></li>
            <li><a href="connexion.php">Connexion</a></li>
            <form action="" method="">
                <input type="search" name="search" id="search" placeholder="rechercher..." >
            </form>
            <li><a href="inscription.php" class="inscription" >Inscription</a></li>
            
        </ul>
    </nav>
    <section>
        <div id="content">
            <div class="livre">
                <h3 class="title">Mon Article 1</h3>
                <img src="images/photo_2023-10-04_16-46-34.jpg" alt="">
                <div class="description">
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Maiores, libero? Ipsa magnam, eaque
                        consectetur fuga esse accusamus voluptatem, laudantium quidem nulla nihil maiores iure
                        veniam, amet ratione facere expedita. Perspiciatis.</p>
                </div>
                <div class="details">
                    <p class="name">Ecrit par : Brou fabien</p>
                    <p class="date">Le Mardi 10 0ctobre 2023</p>
                </div>
    </section>            