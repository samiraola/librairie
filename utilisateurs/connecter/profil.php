<?php
session_start();
$connexion = mysqli_connect ('localhost', 'root','', 'librairie' );
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
main {
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

        #info{
            display: flex;
            flex-direction: column;
            gap: 1.5em;
           
            max-width: 400px;
        }

        #info img{
            width: 50%;
            border-radius : 500px;
           
        }

        #info div p:first-child{
            font-weight: 700;
        }

        #content {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 2em;
            width: 100%;
            max-width: 1200px;
        }

        #content form {
            width: 100%;
            max-width: 500px;
            display: flex;
            flex-direction: column;
            gap: 1.5em;
        }

        #content form h4{
            text-align: center;
            text-decoration: underline;
        }

        #content form .group {
            display: flex;
            flex-direction: column;
        }
        #content form label {
            color: #261c85;
            width: fit-content;
        }
        #content form input{
            border: none;
            outline: none;
            border: 1px solid #d4d4d4;
            padding: 10px;
            resize: none;
        }
        #content form input[type='submit']{
            cursor: pointer;
        }
        #content form input[type='submit'] {
            width: 100%;
            max-width: fit-content;
            padding: 10px;
            border-radius: 5px;
            margin: 0 auto;
            background-color: #261c85;
            color: #fff;
            text-align: center;
        }
        #content form input[type='submit']:hover {
            background-color: #3f2fce;
            border: 1px solid #3f2fce;
        }

        @media screen and (max-width: 930px) {
            header {
                flex-direction: column;
            }
        }

        @media screen and (max-width: 730px) {
            ul {
                flex-direction: column;
            }

            header ul form,
            input {
                width: 100%;
            }
        }
    </style>

    </style>
</head>
<body>
<header>
        <a class="logo" href="./">Item librairie</a>
        <ul>
            <li><a href="./">Accueil</a></li>
            <li><a href="">Catégories</a></li>
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
        <div id="content">
            <h3>Profil</h3>
            <div id="info">
                <h4>Mes informations</h4>
                <div>
                    <img src="<?php echo $recuperation['image']    ?>" alt="">
                </div>
                <div>
                    <p>Nom</p>
                    <p><?php echo $recuperation['firstname'] ?></p>
                </div>
                <div>
                    <p>Prenoms</p>
                    <p><?php echo $recuperation['lastname'] ?></p>
                </div>
                <div>
                    <p>Email</p>
                    <p><?php echo $recuperation['email'] ?></p>
                </div>
            </div>
            <form action="" method="post">
                <h4>Modifier mes informations</h4>
                <div class="group">
                    <label for="email">Modifier l'email</label>
                    <input type="email" name="email" id="email" placeholder="johnDoe@ex.ci"  value="<?php echo $recuperation['email'] ; ?>">
                </div>
                <div class="group">
                    <label for="img_url">Modifier le lien de la photo</label>
                    <input type="url" name="img_url" id="img_url" placeholder="https://images.unsplash.com/photo-1696185082767-29f8095a22a9?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxlZGl0b3JpYWwtZmVlZHwyMHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=700&q=60" value="<?php echo $recuperation['image'] ; ?>"    >
                </div>
                <div class="group">
                    <label for="password">Nouveau mot de passe</label>
                    <input type="password" name="password" id="password" placeholder="nouveau mot de passe"   >
                </div>
                <div class="group">
                    <label for="cpassword">Confirmer mot de passe</label>
                    <input type="text" name="cpassword" id="cpassword" placeholder="confirmer le mot de passe"  >
                </div>
                <input type="submit" value="Modifier mes informations">
            </form>
        </div>
    </main>
</body>
</html>