<?php
session_start();
ob_start();
require_once "../utilisateurs/config.php";
if(!$connexion){
    die('Erreur de connexion à la Base de Donnée');
}
echo $_SESSION['id_admin'];
if(!empty($_SESSION['id_admin'])){
$sessionUserId = $_SESSION['id_admin'];
$selection="SELECT * FROM admin WHERE id_admin='$sessionUserId' ";
 $query=mysqli_query ($connexion,$selection);
 $recuperation=mysqli_fetch_assoc($query);
 if($recuperation){
    unset($_SESSION['id_admin']);
    header('LOCATION: ../utilisateurs/connexion.php');
 }else{
    die("utilisateur inconnu");
 }
}else{
   header('LOCATION: ./utlisateurs/connexion.php');
}

?>