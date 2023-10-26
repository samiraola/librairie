<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
require_once "../config.php";
if(!$connexion){
    die ("connexion échouée");
}
if (isset($_GET['id']) && isset($_GET['quantite'])) {
    $id = (int)$_GET['id'];
    $quantite = (int) $_GET['quantite'];
    if(!$id or !$quantite){
        header('Location: ./panier.php');
        
    }
    if($quantite<1){
        header('Location: ./panier.php');
        
    }else{
        $query = "SELECT * FROM panier WHERE id_article = ?";
        $stmt = mysqli_prepare($connexion, $query); # On prépare la requête (évite les injections SQL)
        $rise = mysqli_stmt_bind_param($stmt, "i", $id); 
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        
        if($result){
            $panier = mysqli_fetch_assoc($result);
            //var_dump($panier);
            if(!$panier)
            {
            exit (header('Location:./panier.php'));
            }
            $pannier_id = $panier['id'];
            $sql = "UPDATE panier SET quantite = '$quantite' WHERE id ='$pannier_id'";
         
            // $stmt = mysqli_prepare($connexion,$sql);
            // $query = mysqli_stmt_bind_param($stmt, "ii" , $quantite, $panier['id']);
            // mysqli_stmt_execute($stmt);
            // if(mysqli_affected_rows($connexion)>0){
            //     exit (header('Location: ./panier.php'));
                
            // }
            $query = mysqli_query($connexion,$sql);
            if($query){
                exit (header('Location: ./panier.php'));
            }
            else{
                exit (header('Location: ./panier.php'));
            }
        }else{
            header('Location: ./panier.php');
            
        }
    }
   
}else{
    header('Location: ./panier.php');
    
}
?>