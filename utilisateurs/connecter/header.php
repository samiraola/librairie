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
$requete = "SELECT * FROM livres";
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
    <title>Document</title>
    <style>
        *{
    margin: 0;
    padding: 0;
    list-style: none;
    text-decoration: none;
}
body{
    font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
    overflow-x : hidden;
}
header{
    height: 50vh;
    max-width: 100vw;
    background-image: url(../images/johnny-briggs-n5woEfyDobk-unsplash.jpg);
    background-size: cover;
    background-repeat: no-repeat;
}
.navbar{
    position: absolute;
    padding: 50px;
    display: flex;
    align-items: center;
    align-items: center;
    justify-content: space-between;
    width: 100vw;
    box-sizing: border-box;
}
.navbar a{
    color: white;
    font-size: 1.2em;
}
.navbar .logo{
    font-size: 2em;
    font-weight: bold;
}
.navbar .nav-links ul{
    display: flex;
}
.navbar .nav-links ul li{
    margin: 20px 25px;
    

}
 .navbar .nav-links ul li a:hover{
    color: #ed3c57;
}  
.navbar .nav-links ul li.active a{
    color: #ed3c57;
    font-weight: 600;
}
.navbar .menu-hamberger{
    position: absolute;
    top: 50px;
    right: 50px;
    width: 35px;
}
.navbar .menu-hamberger{
    display: none;
}
@media screen and (max-width : 900px) {
    .navbar .menu-hamberger{
        display: block;
    }
    .navbar{
        padding: 0;
    }
    .navbar .logo{
        position: absolute;
        top: 40px;
        left: 30px;
    }
    .navbar .menu-hamberger{
        display: block;
    }
    .nav-links{
        top: 0;
        left: 0;
        position: absolute;
        background-color: rgba(255,255,255,0.20);
        backdrop-filter: blur(8px);
        width: 100%;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        margin-left: -100%;
        transition: all 0.5s ease;
    }
    .nav-links.mobile-menu{
        margin-left: 0;
    
    }
    .nav-links ul{
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    .navbar .nav-links ul li{
        margin: 25px 0;
        font-size: 1.2em;
    }
} 

.navbar .dessous-nav .sous-nav{
    list-style: none;
    display: none;
    position: absolute;
    left : 0;
    top : 20px;
    background-color: #fff;
    width : 200px;
    }
    .sous-nav li a:hover{
        display: flex;
        padding: 6px;
        text-decoration: underline;
        background-color: #fff;
        color: #ed3c57;
       
    }
    .sous-nav li {
        display: flex;
        flex-direction : column;
        justify-content: center;
        font-weight : bold;
        margin :10px;
        font-size : 0.8rem;
    }
    .sous-nav  li a{
        color : #000;
    }

    .dessous-nav{
        position: relative;
    }
    .dessous-nav:hover .sous-nav{
    display: block;
    }
    .navbar .inscription {
        color: black;
         background-color: #fff;
         padding: 5px 10px;
         border-radius: 5px;
     }
     
     .navbar .inscription:hover {
         padding: 12px;
         transition: all .2s ease-in-out;
     }
     
     .navbar input {
         min-height: 30px;
         padding: 5px 10px;
         outline: none;
         border: none;
         border-radius: 5px;
     }
.navbar .panier{
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
                <li><a href="connexion.php">Deconnexion</a></li>
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
</body>
</html>