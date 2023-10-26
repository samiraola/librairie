<?php
session_start();
ob_start();
$connexion = mysqli_connect ('localhost', 'root','', 'librairie' );
if(!$connexion){
    die('Erreur de connexion à la Base de Donnée');
    }
if($_GET['id']){
    $id= $_GET['id'];
    $rox = "DELETE  FROM utilisateurs WHERE id='$id' ";
    $execute = mysqli_query($connexion,$rox);
    if($execute){
        echo "suppression actualisé";
    }else{
        echo "erreur à la suppression ";
    }
}



?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supprimer</title>
</head>
<body>
    <h1>L'utilisateur a été supprimé</h1>
</body>
</html>