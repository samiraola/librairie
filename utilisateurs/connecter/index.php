<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La deuxieme page</title>
    <link rel="stylesheet" href="../css/deuxieme.css">
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
            <li class="dessous-nav">
                <a href="">Catégories</a>
                    <ul class="sous-nav">
                        <li><a href="categorie.php">XVe siècles</a></li>
                        <li><a href="categorie.php">XVIe siècles</a></li>
                        <li><a href="categorie.php">XVIIe siècles</a></li>
                    </ul>
            </li>
            <li><a href="deconnexion.php">Deconnexion</a></li>
            <form action="" method="post">
                <input type="search" name="search" id="search" placeholder="rechercher">
            </form>
            <li><a href="profil.php" class="inscription">Profil</a></li>
            <li><a href="" class="inscription">Vendre</a></li>
           
            <a href="panier.php" class="panier"></a>
        </ul>
</header>



<section>
    <div id ="content">
        <h3>Dernière Parutions</h3>
            <div id = "posted">
                <div class="livres">
                    <img src="../images/Coll85_AfriqueDuSud_Couverture-small.jpeg" width="100px" height="150px" alt="">
                    <a class="title" href="../detail.php">livre1</a>
                    <div class="ajout">
                        <button type="submit"><a href="">Voir+</a></button>
                    </div>
                </div>
                <div class="livres">
                    <img src="../images/s-L1200.webp" width="100px" height="150px" alt="">
                    <a class="title" href="../detail.php">livre2</a>
                    <div class="ajout">
                        <button type="submit"><a href="">Voir+</a></button>
                    </div>
                </div>
                <div class="livres">
                    <img src="../images/15738219393_HSGD8_1000.jpeg" width="100px" height="150px" alt="">
                    <a class="title" href="../detail.php">livre3</a>
                    <div class="ajout">
                        <button type="submit"><a href="">Voir+</a></button>
                    </div>
                </div>
                <div class="livres">
                    <img src="../images/image.png" width="100px" height="150px" alt="">
                    <a class="title" href="../detail.php">livre4</a>
                    <div class="ajout">
                        <button type="submit"><a href="">Voir+</a></button>
                    </div>
                </div>
                <div class="livres">
                    <img src="../images/9782218068164_1_75.jpeg" width="100px" height="150px" alt="">
                    <a class="title" href="../detail.php">livre5</a>
                    <div class="ajout">
                        <button type="submit"><a href="">Voir+</a></button>
                    </div>
                </div>
                <div class="livres">
                    <img src="../images/9782845822962-200x303-1.jpeg" width="100px" height="150px" alt="">
                    <a class="title" href="../detail.php">livre6</a>
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