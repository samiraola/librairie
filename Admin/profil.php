<?php
session_start();
$connexion = mysqli_connect('localhost', 'root','', 'librairie' );
if(!$connexion){
    die('Erreur de connexion à la Base de Donnée');
    }
if(!empty($_SESSION['id_admin'])){
$Id = $_SESSION['id_admin'];
$selection="SELECT * FROM admin WHERE id_admin='$Id' ";
$query=mysqli_query($connexion,$selection);
$recuperation=mysqli_fetch_assoc($query);
 
 if($recuperation){
    // var_dump($recuperation);
 }else{
    die("utilisateur inconnu");
 }
}else{
    header('LOCATION:../connexion.php');
}
if (isset($recuperation['id_admin'])) {
    if(!empty($_POST['email']) or !empty($_POST['image']) or !empty($_POST['mot_passe'])){
        $insertion = "UPDATE admin SET ";
        if(!empty($_POST['email'])){
            $email = $_POST['email'];
            $insertion .= "email='$email', ";
        }
        if(!empty($_POST['image'])){
            $image = $_POST['image'];
            $insertion .= "image='$image', ";
        }
        if(!empty($_POST['mot_passe'])){
            $password = $_POST['mot_passe'];
            $cpassword = $_POST['cpassword'];
            if($password != $cpassword){
                echo "erreur sur le mot de passe";
            }else{
                $insertion .= "password='$password', ";
            }
        }
        $insertion = substr($insertion, 0, -2);
        $insertion .= " WHERE id_admin = '$Id'";
        echo $insertion;
        $requette = mysqli_query($connexion, $insertion);
        if($requette){
            $select = " SELECT * FROM utilisateurs WHERE id_admin = '$Id' ";
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
    <title>Tableau de Bord de l'Administrateur</title>
    <script defer src="https://kit.fontawesome.com/1f88d87af5.js" crossorigin="anonymous"></script>
<style>
    *{
        margin: 0;
        padding : 0;
        list-style:none;
        text-decoration : none;
    }
    body{
        background : url(./image/johnny-briggs-n5woEfyDobk-unsplash.jpg) ;
        background-position : center;
        background-size : cover;
        background-repeat : no-repeat;
        height :100vh;
        transition: all .5s:
    }
    .sidebar{
        position: fixed;
        left : -250px;
        top : -1px;
        width : 250px;
        height : 100%;
        background : #042331;
        transition : all .5s ease;
    }
    .sidebar header{
        font-size : 22px;
        color :white;
        text-align : center;
        line-height : 70px;
        background : #063146;
        user-select : none;
    }
    .sidebar ul a{
        display : block;
        height :100%;
        width : 100%;
        line-height : 65px;
        font-size :20px;
        color: white;
        padding-left : 40px;
        box-sizing : border-box;
        border-top : 1px solid black;
        border-bottom : 1px solid black;
        transition : .4s;
    }
    ul li:hover a{
        padding-left:50px;
    }
    .sidebar ul a i{
        margin-right : 16px;
    }
    #check{
        display: none;
    }
    label #btn,label #cancel{
        position : absolute;
        cursor : pointer;
        background : #042331;
        border-radius: 3px;
    }
    label #btn{
        left:40px;
        top:25px;
        font-size:35px;
        color : white;
        padding : 6px 12px;
        transition : all .5s;
    }
    label #cancel{
        z-index : 1111;
        left: 195px;
        top :17px;
        font-size : 30px;
        color: #0a5275;
        padding : 4px 9px;
        transition : all .5s ease;
    }
    #check:checked ~  .sidebar{
        left : 0;
    } 
    #check:checked ~ label #btn{
        left : 250px;
        opacity : 0;
        pointer-events : none;
    } 
    #check:checked ~ label #cancel{
        left:195px;
    }
    #check:checked ~ section{
        margin-left :250px;
    }

.dashboard {
    display: flex;
}



.profil {
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
.profil img {
width: 150px;
height: 150px;
border-radius: 50%;
margin: 0 auto 10px;
display: block;
}
h2 {
font-size: 24px;
}

form {
text-align: left;
}

label {
display: block;
margin-bottom: 5px;
}

input[type="text"],
input[type="email"],
input[type="tel"],
textarea {
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
    <input type ="checkbox" id="check">
    <label for="check">
        <i class="fas fa-bars" id="btn"></i>
        <i class="fas fa-times" id="cancel"></i>
    </label>
    <div class="sidebar">
        <header>Tableau de bord</header>
        <ul>
            <li><a href="dashbord.php"><i class="fas fa-qrcode"></i>Dashbord</a></li>
            <li><a href="panier.php"><i class="fas fa-link"></i>Livres Postés</a></li>
            <li><a href="ajout.php"><i class="fas fa-stream"></i>Ajouter Livre</a></li>
            <li><a href=""><i class="fas fa-calendar-week"></i>Catégories</a></li>
            <li><a href="membres.php"><i class="far fa-question-circle"></i>Membres</a></li>
            <li><a href="profil.php"><i class="fas fa-sliders-h"></i>Mon Profil</a></li>
            <li><a href="deconnexion.php"><i class="far fa-envelope"></i>Deconnexion</a></li>
        </ul>
    </div>
    
   
    <div class="profil">
        
        <img src="https://images.unsplash.com/photo-1579783902614-a3fb3927b6a5?auto=format&fit=crop&q=80&w=1345&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="">
        <h2>Profil Administrateur</h2>
        <form method="POST" action="">
            <label for="nom">Nom :</label>
            <input type="text" name="nom" id="nom" value=""><br>

            <label for="email">Email :</label>
            <input type="email" name="email" id="email" value=""><br>

            <label for="mot_de_passe">Mot passe :</label>
            <input type="text" name="mot_de_passe" id="mot_de_passe" value=""><br>

            <label for="cpassword">confirmer votre mot de passe :</label>
            <textarea name="cpassword" id="cpassword"></textarea><br>

            <button type="submit">Enregistrer les Modifications</button>
        </form>
        
    </div>
   

</body>
</html>