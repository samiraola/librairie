<?php
ob_start();
session_start();
//verification des champs
   if(!empty($_POST['email']) &&!empty($_POST['password']) ){

  $email = $_POST['email'];
  $password = $_POST['password'];

  //connexion à la base de données

  require_once "config.php";
  if(!$connexion){
   die('Erreur de connexion à la Base de Donnée');
  }

  //selection de la table dans la bbase de donnée
   $selection = " SELECT * FROM utilisateurs WHERE email='$email' && password='$password' ";
   $result = mysqli_query($connexion,$selection);
    if(!$result){
        echo "oups une erreur c'est produit";
    }
    else{
        echo "ok";
    }
    $recupe = mysqli_fetch_assoc($result);
    if($recupe){
        $_SESSION['id']=$recupe['id'];
        Header('LOCATION: ../utilisateurs/connecter/index.php');
    }else{
        echo "l'utilisateur n'existe pas";
    }
    $select2="SELECT * FROM admin WHERE email='$email' && mot_passe='$password'";
    $requet2=mysqli_query($connexion,$select2);
    if($requet2){
       
      $affiche2=mysqli_fetch_assoc($requet2);
   
      if($affiche2){
        $_SESSION['id_admin']=$affiche2['id_admin'];
        header('LOCATION:../admin/dashbord.php');
    }else{
        $message="mot de passe où email incorrecte";
}}else{
    echo "l'utilisateur n'existe pas";
}
}

   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
   
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
    background: url(../utilisateurs/images/gir.jpeg); 
    background-repeat: no-repeat;
    background-size: cover;
    display: flex;
    justify-content: center;
    align-items: center;
}
section {
    width: 350px;
    height: 450px;
    display: flex;
    flex-direction: column;
    backdrop-filter: blur(5px);
    border: 1px solid #007bff;
    border-radius: 5px;
    align-items: center;
}
section h2{
    font-size: 25px;
    font-weight: 300;
    color: #fff;
    padding: 50px;
}
section #content{
    display: flex;
    flex-direction: column;
    width: 100%;
}
#content input,button{
    margin: 10px;
    padding: 10px 15px;
    outline: none;
    border-radius: 60px;
    font-size: 16px;
}
#content input{
    background-color: #ffffff2e;
    color: #fff;
    letter-spacing: 1px;
    text-indent: 35px;
    border: none;
    background-image: url(./utilisateurs/images/icons8-utilisateur-48.png);
    background-repeat: no-repeat;
    background-size: 20px;
    background-position: 15px;
}
#content input:nth-child(2){
    background-image: url(./utilisateurs/images/icons8-débloquer-privé-50.png);
}
#content input::placeholder{
    font-size: 14px;
    color: #fff;
}
#content button{
    background-color: #007bff;
    color: #fff;
    font-size: 17px;
    text-transform: uppercase;
    cursor: pointer;
    border: none;
}

</style>
    
</head>
<body>
<section> 
    <h2>Connexion</h2>
    <form action="" method="post">
        <div id="content">
            <input type="email" name="email" id="email" placeholder="Email" >
            <input type="password" name="password" id="password"  placeholder="password">
            <button>Se connecter</button>
        </div>
    </form>    
</section>  
</body>
</html>