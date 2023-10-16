<?php
  //on verifie si les champs ne sont pas vides
  function escape($valeur){
    return    trim(strip_tags($valeur));
}

if((!empty($_POST['firstname'])) &&  !empty($_POST['lastname']) &&  !empty($_POST['email'])  &&  !empty($_POST['password'])  && !empty($_POST['cpassword'])){

//recuperation des données
$firstname =escape($_POST['firstname']);
$lastname =escape($_POST['lastname']);
$email = escape($_POST['email']);
$img_url =escape($_POST['img_url']);
$password = escape($_POST['password']);
$cpassword =escape($_POST['cpassword']);
if(empty($firstname) or strlen($firstname) < 2  ){
  $err_firstname = "Erreur sur le firstname";
}
if(empty($lastname) or strlen($lastname) < 2  ){
    $err_lastname = "Erreur sur le lastname";
}
if(empty($email) or strlen($email) < 2  ){
    $err_email = "Erreur sur le email";
}
if(empty($password) or strlen($password) < 2  ){
    $err_password = "Erreur sur le password";
}
if(empty($cpassword)){
    $err_cpassword = "Erreur sur le cpassword";
}else {
    if($cpassword != $password){
        $err_cpassword = "Le mot de passe de confirmation est différent";
    }
}

//connexion à la base de donnée
if(!isset($err_firstname) && !isset($err_lastname) && !isset($err_email) && !isset($err_password) && !isset($err_cpassword)){
    $connexion = mysqli_connect('localhost', 'root','', 'librairie');
    if(!$connexion){ die('Erreur de connexion à la Base de Donnée');
    }
    //insertion des données dans la base de données

    $result = "INSERT INTO utilisateurs(firstname,lastname,email,image,password)";
    $result .= "VALUES ('$firstname','$lastname','$email','$img_url','$password')";
    $rexcute = mysqli_query($connexion,$result);
    if($rexcute){
        echo "insertion valide ! ";
    }

    header('LOCATION: connexion.php');
}




}



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <style>
       

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;;
        }

body {
    width: 100%;
    min-height: 100vh;
    background: url(./utilisateurs/images/gir.jpeg);
    background-repeat: no-repeat;
    background-size: cover;
    display: flex;
    justify-content: center;
    align-items: center;
}
section {
    width: 350px;
    height: 500px;
    display: flex;
    
    flex-direction: column;
    backdrop-filter: blur(5px);
    border: 1px solid #72582c;
    border-radius: 5px;
    align-items: center;
}
section h3{
    font-size: 20px;
    font-weight: 300;
    color: #fff;
    padding: 20px;
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
    background-image: url(./utilisateurs/images/icons8-utilisateur-48.png) ;
    background-repeat: no-repeat;
    background-size: 20px;
    background-position: 15px;
}
#content input:nth-child(5){
    background-image: url(./utilisateurs/images/icons8-débloquer-privé-50.png);
}
#content input:nth-child(6){
    background-image: url(./utilisateurs/images/icons8-débloquer-privé-50.png);
}
#content input:nth-child(3){
    background-image: url(./utilisateurs/images/icons8-email-80.png);
}
#content input:nth-child(4){
    background-image: url(./utilisateurs/images/icons8-image-50.png);
}
#content input::placeholder{
    font-size: 14px;
    color: #c0b4b4;
}
#content button{
    background-color: #FF9504;
    font-size: 17px;
    text-transform: uppercase;
    cursor: pointer;
    border: none;
}

</style>
 
</head>
<body>
<section>

     <h3>Inscription</h3>
     <form action="" method="post">
         <div id="content">
            <input type="text" name="firstname" id="nom" placeholder="Nom">                    
            <input type="text" name="lastname" id="prenom"  placeholder="Prénoms">
            <input type="text" name="email" id="email" placeholder="Email" >
            <input type="url" name="img_url" id="img_url" placeholder="https://images.unsplash.com/photo-1696185082767-29f8095a22a9?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxlZGl0b3JpYWwtZmVlZHwyMHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=700&q=60">
            <input type="text" name="password" id="password" placeholder="Mot passe">
            <input type="text" name="cpassword" id="cpassword" placeholder="Confirmer votre mot de passe" >
            <button>S'inscrire</button>
                
            
        </div>
     </form>
</section>






</body>
</html>