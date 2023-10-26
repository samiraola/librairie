<?php
session_start();
require_once "../config.php";
if(!$connexion){
    die('Erreur de connexion à la Base de Donnée');
     }
if(!empty($_SESSION['id'])){
$Id = $_SESSION['id'];
$selection="SELECT * FROM utilisateurs WHERE id='$Id' ";

 $query=mysqli_query ($connexion,$selection);

 $recuperation=mysqli_fetch_assoc($query);
 
 if($recuperation){
 }else{
    die("utilisateur inconnu");
 }
}else{
    header('LOCATION:../../connexion.php');
}
if (isset($recuperation['id'])) {
    if(!empty($_POST['email']) or !empty($_POST['img_url']) or !empty($_POST['password'])){
        $insertion = "UPDATE utilisateurs SET ";
        if(!empty($_POST['email'])){
            $email = $_POST['email'];
            $insertion .= "email='$email', ";
        }
        if(!empty($_POST['img_url'])){
            $image = $_POST['img_url'];
            $insertion .= "image='$image', ";
        }
        if(!empty($_POST['password'])){
            $password = $_POST['password'];
            $cpassword = $_POST['cpassword'];
            if($password != $cpassword){
                echo "erreur sur le mot de passe";
            }else{
                $insertion .= "password='$password', ";
            }
        }
        $insertion = substr($insertion, 0, -2);
        $insertion .= " WHERE id = '$Id'";
        echo $insertion;
        $requette = mysqli_query($connexion, $insertion);
        if($requette){
            $select = " SELECT * FROM utilisateurs WHERE id = '$Id' ";
            $requete = mysqli_query($connexion, $select);
            $livre = mysqli_fetch_assoc($requete);
            echo "Modification validée";
        }
        else{
            die("Échec de la mise à jour");
        }
    }
    
} else {
    echo "ID non défini.";
}
$requete2 = "SELECT * FROM categorie";
$query2 = mysqli_query($connexion,$requete2);

if($query2){
    $categories = mysqli_fetch_all($query2,MYSQLI_ASSOC);
    $catLivres = [];

    if($categories){
        foreach($categories as $cat){
            $id_categorie = $cat['id'];
            $requete = "SELECT * FROM livres WHERE id_categorie = '$id_categorie' ";
            $query = mysqli_query($connexion,$requete);
            if($query) {
                $livres = mysqli_fetch_all($query,MYSQLI_ASSOC);
                $catLivres[]=['livres' => $livres, "categorie" => $cat['titre'], "id_categorie" => $cat['id']];
            }
        }
    }
}

?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>profil</title>
    
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
.sous-nav{
        list-style: none;
        display: none;
        position: absolute;
        left : 0;
        top : 30px;
        background-color: #fff;
        width : 200px;
        
       
        }
        .sous-nav li a:hover{
            padding: 6px;
            background-color : burlywood;
           
        }
        .sous-nav li{
            display: flex;
            flex-direction : column;
            justify-content: center;
            font-weight : bold;
            margin :5px;
            font-size : 0.8rem;
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
        
header {
    width: 100%;
    height: 50vh;
    display: flex;
    padding: 20px 30px;
    background-image: url(../images/photo_2023-10-04_16-46-34.jpg) ;
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

main h4{
    text-align:center
    font-size : 35px;
}
#profil {
max-width: 400px;
margin: 0 auto;
background-color: #fff;
justify-content : center; 
padding: 20px ;
border: 1px solid #ccc;
border-radius: 5px;
text-align: center;
margin-top : 80px;
margin-left : 300px;
}
#profil img {
width: 150px;
height: 150px;
border-radius: 50%;
margin: 0 auto 10px;
display: block;
}

form {
text-align: center;
}

label {
display: block;
margin-bottom: 15px;
}

input[type="text"],
input[type="email"],
input[type="tel"],
{
width: 100%;
padding: 10px;
margin-bottom: 10px;
border: 1px solid #ccc;
border-radius: 3px;
outline: none;
}

button {
background-color: #333;
color: #fff;
border: none;
padding: 10px 20px;
border-radius: 3px;
cursor: pointer;
}

button:hover {
background-color: #555;
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
                    <?php foreach($categories as $valeur) : ?>
                <li><a href="categorie.php#section<?php echo $valeur['id']; ?>"><?php echo $valeur['titre'] ; ?></a></li>
                    
                    <?php endforeach; ?>
                </ul>
            </li>
            <li><a href="connexion.php">Deconnexion</a></li>
            <form action="" method="post">
                <input type="search" name="search" id="search" placeholder="rechercher">
            </form>
            <li><a href="profil.php" class="inscription">Profil</a></li>
            <li><a href="" class="inscription">Vendre</a></li>
            <div class="panier"></div>
        </ul>
</header>
<main>
<h3>Profil</h3>
            
    <h4>Mes informations</h4>
        <div id="profil">
           
                
                    <img src="<?php echo $recuperation['image']    ?>" alt="">
                
                
                    <label>Nom</label>
                    <input type="text"><?php echo $recuperation['firstname'] ?>
                
                
                    <label>Prenoms</label>
                    <input type="text"><?php echo $recuperation['lastname'] ?>
                
                
                    <label>Email</label>
                    <input type="text"><?php echo $recuperation['email'] ?>
                
            
            <form action="" method="post">
                <h4>Modifier mes informations</h4>
                
                    <label for="email">Modifier l'email</label>
                    <input type="email" name="email" id="email" placeholder="johnDoe@ex.ci"  value="<?php echo $recuperation['email'] ; ?>">
                
                
                    <label for="img_url">Modifier le lien de la photo</label>
                    <input type="url" name="img_url" id="img_url" placeholder="https://images.unsplash.com/photo-1696185082767-29f8095a22a9?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxlZGl0b3JpYWwtZmVlZHwyMHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=700&q=60" value="<?php echo $recuperation['image'] ; ?>"    >
                
                
                    <label for="password">Nouveau mot de passe</label>
                    <input type="password" name="password" id="password" placeholder="nouveau mot de passe"   >
                
                
                    <label for="cpassword">Confirmer mot de passe</label>
                    <input type="text" name="cpassword" id="cpassword" placeholder="confirmer le mot de passe"  >
                
                <input type="submit" value="Modifier mes informations">
            </form>
        </div>
    </main>
</body>
</html>