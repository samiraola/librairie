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

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
}
body {
    width: 100%;
    min-height: 100vh;
    display: flex;
    flex-direction: column;
    overflow-x: hidden;
   
}
header {
    width: 100%;
    height: 50vh;
    display: flex;
    padding: 20px 30px;
    background-image: url(../);
    background-size: cover;
    background-repeat: no-repeat;
    justify-content: space-evenly;
    align-items: center; 
   color: #fff;
    
}

header a {
    text-decoration: none;
    color: #fff;
}

header .logo {
    font-size: 1.8em;
}

header .logo:hover {
    color: burlywood;
    transition: all .2s ease-in-out;
}

header ul {
    display: flex;
    justify-content: space-evenly;
    gap: 1em;
    list-style: none;
     align-items: center; 
    flex-grow: 1;
}

header ul li {
    min-width: 100px;
    padding: 5px;
}

header ul li a {
    font-size: 1.1em;
}

header ul .inscription {
   color: black;
    background-color: #fff;
    padding: 10px;
    border-radius: 5px;
}

header ul .inscription:hover {
    padding: 12px;
    transition: all .2s ease-in-out;
}

header ul input {
    min-height: 30px;
    padding: 5px 10px;
    outline: none;
    border: none;
    border-radius: 5px;
}
header .panier{
    width: 50px;
    height:50px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: url(../images/icons8-chariot-48.png);
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
}

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

#posted {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    justify-content: center;
    gap: 2em;
}

#posted .livres {
    display: flex;
    flex-direction: column;
    max-width: 300px;
    box-shadow: 0px 0px 5px 1px #aaa;
    border-radius: 2px;
    background-color: #fff;
}

#posted .livres:hover {
    transform: scale(1.1);
    box-shadow: 0px 0px 10px 2px #e1e1e1;
    transition: all .2s ease-in;
}

#posted .livres img {
    width: 100%;
}

#posted .livres .title {
    margin: 0 auto;
    padding: 5px;
    color: #261c85;
    font-weight: 700;
    width: fit-content;
}

#posted .livres .title:hover {
    color: burlywood;
    font-weight: 900;
    transition: all .2s ease-in-out;
}
#posted .livres .ajout{
    padding: 20px;
    
    gap: 1.2em; 
    text-align: center;
    
}
#posted .livres .ajout button{
    background-color: burlywood;

}
#posted .livres .ajout button a{
   text-decoration: none;
    color: black;
    border: none;
    outline: none; 
    
}
/* section deuxieme */

        body{
            background: rgba(250, 153, 22, 0.49);
        }
       
        .deuxieme{
            width: 100%;
            height: 200px;
            background-color: rgba(0, 0, 0, 0.39);
            backdrop-filter: blur(5px);
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
          align-items:center;
        }
        .deuxieme .recherche{
            margin-top: 70px;
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
        .boutton button{
            margin: 10px;
            padding: 10px 15px;
            outline: none;
            border-radius: 60px;
            font-size: 16px;
            background-color: #FF9504;
            font-size: 17px;
            text-transform: uppercase;
            cursor: pointer;
            border: none;
        }
        .contactez-nous{
            width:100%;
           height:620px;
            
            border: 1px solid #72582c;         
        }
        .contactez-nous h3{
            text-align:center;
        }
        form{
            display:flex;
            justify-content:space-around;
        }
        form .un{
           display:flex;
           
        }
        
        form .trois{
            text-align:justify;
            width : 50%;
            height:200px;
           margin-top:30px;
           
        }
       
        form .trois p{
            width:300px;
            margin-top:30px;
        }
        form .trois input{
            min-height: 30px;
            padding: 5px 10px;
            outline: none;
            border: none;
            border-radius: 5px;
            
        }
        .un .trois{
            margin:50px;
            padding:10px;
        }
        form .trois label {
            display:block;
        }
        .trois button{
            display:block;
            margin: 10px;
            padding: 10px 15px;
            outline: none;
            border-radius: 60px;
            font-size: 16px;
            background-color: #FF9504;
            font-size: 17px;
            text-transform: uppercase;
            cursor: pointer;
            border: none;
        }
        form .deux{
            display:flex;
            flex-direction:column;
            justify-content:right;
            text-align:justify;
           width : 50%;
          margin-top:50px;
        }
        .un .deux{
            margin:50px;
            padding:10px;
        }
        .un .deux span{
            width:300px;
            margin-top:30px;
        }
        .photo{
            width: 400px;
            height: 200px;
            background-image:url(images/mishaalzahed-h4x-Tksufvw-unsplash.jpg);
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            margin-left:auto;
        }
        .photo p{
            
            text-align:center;
            color:white;
        }
        .photo form{
            display:block;
            align-items:center;
            justify-content:center;
            margin-top:40px;
        }
        .photo form input{
           
            min-height: 30px;
            padding: 5px 10px;
            outline: none;
            border: none;
        }
        .photo form button{
           
            margin: 10px;
            padding: 10px 15px;
            outline: none;
            border-radius: 20px;
            font-size: 16px;
            background-color: #FF9504;
            font-size: 17px;
            text-transform: uppercase;
            cursor: pointer;
            border: none;
        }
        .trouver{
            width: 400px;
            height: 200px;
            background-color:grey;
        }
        .footer{
            width : 100%;
            height: 50px;
            background-color:grey;
            margin-top: 100px;
        }

</style>
</head>
<body>
<header>
        <a class="logo" href="./">Item librairie</a>
        <ul>
            <li><a href="./">Accueil</a></li>
            <li><a href="">Catégories</a></li>
            <form action="" method="post">
                <input type="search" name="search" id="search" placeholder="rechercher">
            </form>
            <li><a href="inscription.php" class="inscription">Deconnexion</a></li>
            <li><a href="" class="profil">profil</a></li>
            <div class="panier"></div>
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

<section class="bouton">
    <div class="boutton">
        <button type="button">Voir nos catalogues</button>
    </div>
</section>

<main class="contactez-nous">
    <h3>contactez-nous</h3>
    <form action="" method="post">
            <div class="un">
                <div class="trois">
                    <span>Envoyez-nous un message</span>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Earum modi quod doloremque molestias ipsum quidem enim tenetur eveniet. Quidem, neque ut aliquid amet reiciendis illum vero ipsum consequatur beatae, perferendis tempora delectus aut iusto quae inventore suscipit corrupti qui exercitationem molestiae! Neque nihil ullam, obcaecati e.</p>
                    <label for="nom">Nom</label>
                    <input type="text" name="nom" id="nom">
                    <label for="email">email</label>
                    <input type="text" name="email" id="email">
                    <label for="">Votre question</label>
                    <input type="text" name="question" id="question">
                    <button type="button">Envoyez</button>
                </div>
               
           
                    <div class="deux">
                        <p>trouvez-nous</p>
                        <span>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quidem, repudiandae repellat deserunt iusto necessitatibus mollitia officiis asperiores consectetur accusantium ducimus?</span>
                        <span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores, quibusdam?</span>
                        <span>Lorem ipsum dolor sit amet.</span>
                    </div>

                    
            </div>
    
        </form>
        <div class="photo">
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolorum, pariatur.</p>
        <form action="" method="post">
            <input type="text" name="" id="">
            <button type="button">Abonnez-vous</button>
        </form>
    </div>
</main>

<section class="nous-trouver">
    <h3>Nous trouver</h3>
   <div class="trouver">
   <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d26171.46258862916!2d-3.9596408046817517!3d5.393056608720285!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sfr!2sci!4v1697122790272!5m2!1sfr!2sci" width="400" height="300" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
   </div>
</section>
<section class="footer">
    <div class="foot">
   
    </div>
</section>

</body>
</html>