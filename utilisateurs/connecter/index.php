<?php
session_start();
require_once "../config.php";
if(!$connexion){
    die('Erreur de connexion à la Base de Donnée');
     }

if(!empty($_SESSION['id'])){
$sessionId = $_SESSION['id'];
$selection="SELECT * FROM utilisateurs WHERE id='$sessionId' ";

 $query=mysqli_query ($connexion,$selection);

 $recuperation=mysqli_fetch_assoc($query);
 if($recuperation){
   
 }else{
    die("utilisateur inconnu");
 }
}else{
    header('LOCATION:../../connexion.php');
}
$requete1 = "SELECT * FROM categorie";
$query1 = mysqli_query($connexion,$requete1);

if($query1){
    $result = mysqli_fetch_all($query1,MYSQLI_ASSOC);
    
}
$requete = "SELECT * FROM livres LIMIT 6";
$query = mysqli_query($connexion,$requete);

if(!$query){
    echo "OOps! Une erreur est survenue, veuillez réessayer plus tard!";
} else{
    $articles = mysqli_fetch_all($query,MYSQLI_ASSOC); 
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La deuxieme page</title>
    <link rel="stylesheet" href="../css/deuxieme.css">
<style>
    .hero {
    text-align: center;
    background-image: url('hero-background.jpg');
    background-size: cover;
    background-position: center;
    padding: 100px 0;
}

.hero h2 {
    font-size: 36px;
    margin-bottom: 20px;
}

.hero p {
    font-size: 18px;
    margin-bottom: 30px;
}

.hero a {
    display: inline-block;
    padding: 10px 20px;
    background-color: #007bff;
    color: #fff;
    text-decoration: none;
}

        #posted .livres{
            width : 250px;
            height : 400px;
        }
        #posted .livres img{
            width : 100%;
            height : 250px;
        }
        #posted .livres .ajout{
           padding : 30px;
        }
        #posted .livres .ajout button{
            width : 100%;
            height : 30px;
            border : none;
            background-color: #007bff;
            
        }
        #posted .livres .ajout button:hover{
            border : 1px solid white;
            background-color: #261c85;;
            color : white;
        }
        .livres .ajout button a{
            text-decoration: none;
            color : white;
           
        }
        .deuxieme{
            width: 80%;
            height: 200px;
            display: flex;
            justify-content : center;
            align-items: center;
            border: 1px solid #007bff;
            border-radius: 5px;
           margin-left : 120px;
        }
        .deuxieme .image{
            width: 300px;
            height: 170px;
            display: flex;
            border-radius : 20px;
            justify-content : center;
            align-items: center;
            background-image: url(./images/photo_2023-10-04_16-46-50.jpg);
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
                
        }
         .deuxieme .recherche:nth-child(2){
           display: flex;
          align-items: center;
          justify-content : center;
          
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
            color: #fff;
            background-color: #007bff;
            font-size: 17px;
            text-transform: uppercase;
            cursor: pointer;
            border: none;
        }
        .contact-us {
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            text-align: center;
}

.contact-us h3 {
    font-size: 24px;
}

.contact-content {
    display: flex;
    justify-content: space-between;
    margin-top: 20px;
}

.contact-form,
.find-us,
.photo {
    flex: 1;
    padding: 10px;
}
.photo input{
    padding : 10px;
}
.contact-form h4,
.find-us h4 {
    font-size: 18px;
}
.find-us{
    margin-left : 130px;
}
.find-us p{
    width : 300px;
    padding : 10px;
}
.contact-form p {
    text-align: left;
}

.column {
    text-align: left;
    margin-bottom: 20px;
}

.column label {
    display: block;
    margin-bottom: 5px;
}

.column input {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 3px;
    outline: none;
}

.send-button,
.subscribe-button {
    background-color: #007bff;
    color: #fff;
    border: none;
    padding: 10px 20px;
    border-radius: 3px;
    cursor: pointer;
    text-transform: uppercase;
}

.send-button:hover,
.subscribe-button:hover {
    background-color: #007bff;
}

        .trouver{
            margin-top : 50px;
            width: 400px;
            height: 300px;
            background-color:#007bff;
        }
        footer{
            width : 100%;
            height: 50px;
            text-align: center;
            line-height: 50px;
            background-color:#007bff;
            
        }
        

</style>
</head>
<body>

<nav class="navbar">
        <a href="./" class="logo">Item-librairie</a>
        <div class="nav-links ">
            <ul>
                <li class="active"><a href="./">Accueil</a></li>
                <li class="dessous-nav">
                <a href="">Catégories</a>
                    <ul class="sous-nav">
                        <?php foreach($result as $value) : ?>
                    <li><a href="categorie.php?id=<?php echo $value['id']; ?>"><?php echo $value['titre'] ; ?></a></li>
                       
                        <?php endforeach; ?>
                    </ul>
            </li>
                <li><a href="../connexion.php">Deconnexion</a></li>
                <form action="" method="post">
                <input type="search" name="search" id="search" placeholder="rechercher">
            </form>
                <li><a href="profil.php" class="inscription">profil</a></li>
                <li><a href="" class="inscription">Vendre</a></li>
                <li class="panier">
                <a href="panier.php" class="panier"><span class="number"><?php echo $nb_panier ?? 0; ?></span></a>
               
                
            </ul>
        </div>
        <img src="./images/images.png" alt="" class="menu-hamberger">
    </nav>
<header>

</header>

<section class="hero">
            <h2>Bienvenue dans notre librairie en ligne</h2>
            <p>Découvrez une vaste collection de livres rares et historiques sur l'Afrique.</p>
            <a href="../livres.php">Parcourir les livres</a>
        </section>
<section>
<section class="nouveautes">
            <h2>Nouveautés</h2>
            <div class="livres">
                <!-- Insérez des éléments de livre ici -->
            </div>
        </section>
    <div id ="content">
       
            <div id = "posted">
                <?php
                    foreach($articles as $article) : 
                ?>
                <div class="livres">
                    <img src="<?php echo $article['image']; ?>" alt="">
                    <p class="title"><?php echo $article["titre"];  ?></p>
                    <div class="ajout">
                        <button type="submit"><a href="detail.php?article_id=<?php echo $article['id']; ?>">Voir+</a></button>
                    </div>
                </div>
                <?php endforeach;?>
            </div>
           
    </div>

</section>



<main class="deuxieme">

    <div class="image"></div>
    <div class="recherche">
        <p>Je recherche un ouvrage,un auteur,un sujet</p><input type="text" name="" id="" placeholder="rechercher..."></div>
</main> 

<section class="bouton">
    <div class="boutton">
        <button type="button">Voir nos catalogues</button>
    </div>
</section>

<main class="contact-us">
    <h3>Contactez-nous</h3>
    <div class="contact-content">
        <form action="" method="post" class="contact-form">
            <div class="column">
                <h4>Envoyez-nous un message</h4>
                <p>
                En soumettant ce formulaire, vous acceptez que les informations saisies soient exploitées dans le cadre d’informations et de la relation commerciale qui peut en découler.
                </p>
            </div>
            <div class="column">
                <label for="nom">Nom :</label>
                <input type="text" name="nom" id="nom">

                <label for="email">Email :</label>
                <input type="text" name="email" id="email">

                <label for="question">Votre question :</label>
                <input type="text" name="question" id="question">

                <button type="button" class="send-button">Envoyer</button>
            </div>
        </form>

        <div class="find-us">
            <h4>Retrouvez-nous</h4>
            <p>
            votre librairie
                côte d’ivoire 
                Abidjan , cocody ,
                angre gestoci
                contact@votrelibrairie.com
                05-65-68-00-44
            </p>
            <p>N’hésitez pas à nous faire part de vos recherches ou de vos centres d’intérêt</p>
            
        </div>
    </div>

    <div class="photo">
        <p>Vous souhaitez recevoir nos articles dès leur parutions?</p>
        <form action="" method="post" class="subscribe-form">
            <input type="text" name="email" id="subscribe-email" placeholder="saississez votre e-mail">
            <button type="button" class="subscribe-button">Abonnez-vous</button>
        </form>
    </div>
</main>

<section class="nous-trouver">
    <h3>Nous trouver</h3>
   <div class="trouver">
   <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d26171.46258862916!2d-3.9596408046817517!3d5.393056608720285!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sfr!2sci!4v1697122790272!5m2!1sfr!2sci" width="400" height="300" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
   </div>
</section>
<footer>
        <p>&copy; 2023 Librairie en Ligne. Tous droits réservés.</p>
    </footer>

</body>
</html>