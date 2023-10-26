<?php
session_start();
ob_start();
require_once "../config.php";
if(!$connexion){
    die('Erreur de connexion à la Base de Donnée');
}
echo $_SESSION['id'];
if(!empty($_SESSION['id'])){
$sessionUserId = $_SESSION['id'];
$selection="SELECT * FROM utilisateurs WHERE id='$sessionUserId' ";
 $query=mysqli_query ($connexion,$selection);
 $recuperation=mysqli_fetch_assoc($query);
 if($recuperation){
    unset($_SESSION['id']);
    header('LOCATION: ../connexion.php');
 }else{
    die("utilisateur inconnu");
 }
}else{
   header('LOCATION: ./connexion.php');
}

?>