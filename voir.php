<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="">
    <style>
        * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
}

body {
    width: 100%;
    min-height: 100vh;
    
   
}

nav {
    display: flex;
    padding: 10px 30px;
    background-color: burlywood;
    justify-content: space-evenly;
    gap: 2em;
    align-items: center;
    color: #fff
}

nav a {
    text-decoration: none;
    color: #fff
}

nav .logo {
    padding: 10px;
    border: 1px solid #fff;
    font-size: 1.8em;
}

nav .logo:hover {
    background-color: #fff;
    color: burlywood;
    transition: all .2s ease-in-out;
}

nav ul {
    display: flex;
    justify-content: space-evenly;
    gap: 1em;
    list-style: none;
    align-items: center;
    flex-grow: 1;
}

nav ul li {
    min-width: 100px;
    padding: 5px;
}

nav ul li a {
    font-size: 1.1em;
}

nav ul .inscription {
    color: black;
    background-color: #fff;
    padding: 10px;
    border-radius: 5px;
}

nav ul .inscription:hover {
    padding: 12px;
    transition: all .2s ease-in-out;
}

nav ul input {
    min-height: 30px;
    padding: 5px 10px;
    outline: none;
    border: none;
    border-radius: 5px;
   
}

@media screen and (max-width: 930px) {
   nav {
        flex-direction: column;
    }
}

@media screen and (max-width: 730px) {
    ul {
        flex-direction: column;
    }

   nav ul form,
    input {
        width: 100%;
    }
}
section {
            padding: 20px;
            display:flex;
            justify-content:space-evenly;
        }
        #content{
            width:500px;
            height:500px;
            display:flex;
            justify-content:left;
            align-items:left;
            
            margin-right: auto;
            background-color:red;
        }
        #content .livre img{
            width:50%;
            float:left; 
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
                <img src="images/photo_2023-10-04_16-46-34.jpg"  class="image" alt="">
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