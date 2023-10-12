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
        section{
            width: 100%;
            height: 400px;
            border: 1px solid #FF9504;
            display:flex;
            align-items: center;
        }
        #content{
            width: 50%;
            border: 1px solid #FF9504;
        }
        .livre{
            display: flex;
            align-items: center;
        }
        .livre p{
            display: flex;
            flex-direction: column;
            text-decoration: underline;
            
        }
        .livre img{
            width: 250px;
           
        }
        .details{
            display: flex;
            justify-content: right;
            align-items: right;
        }
        .details button{
            display: flex;
            justify-content: right;
            float: right;
            text-align: justify;
        }
        .details button{
        background-color: #FF9504;
        font-size: 17px;
        text-transform: uppercase;
        cursor: pointer;
        border: none;
        margin: 10px;
        padding: 10px 15px;
        outline: none;
        border-radius: 60px;
        font-size: 16px;
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
    <section class="form">
        <div id="content">
                    <div class="livre">
                        <img src="images/photo_2023-10-04_16-46-34.jpg"  class="image" alt="">
                        <div class="desc">
                            <div class="description">
                                <span>La grande histoire de l’Afrique</span>
                                <p> Hors-série Les Grands Dossiers N° 8 - décembre 2019- janvier 2020</p>
                            </div>
                        </div>
                    </div>              
                            <div class="details">
                                            
                                <div class="quantite">
                                    <p>quantite 1</p>
                                </div>
                                <div class="prix">
                                        <p>15000fr</p>
                                </div>
                                <button type="button">supprimer</button>
                            </div>
                </div>
        </div>        
               
    </section>            