<?php

# On se connecte à notre base de donnée
$connexion = mysqli_connect('localhost', 'root', '', 'librairie');

# Si la connexion n'a pas aboutie, on affiche une erreur
if (!$connexion) {
    die("Une erreur est survenue lors de la liason avec la base de donnée. Veuillez réessayer plus tard!");
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
    <title>La premiere page</title>
    <link rel="stylesheet" href="./css/categorie.css">
<style>

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
                        <?php foreach($catLivres as $value) : ?>
                    <li><a href="categorie.php?id=<?php echo $value['id_categorie']; ?>"><?php echo $value['titre'] ; ?></a></li>
                       
                        <?php endforeach; ?>
                    </ul>
            </li>
                <li><a href="connexion.php">Connexion</a></li>
                <form action="" method="post">
                <input type="search" name="search" id="search" placeholder="rechercher">
            </form>
                <li><a href="inscription.php" class="inscription">Inscrption</a></li>
                <li><a href="" class="inscription">Vendre</a></li>
                <li class="panier">
                <a href="panier.php" class="panier"><span class="number"><?php echo $nb_panier ?? 0; ?></span></a>
               
                
            </ul>
        </div>
        <img src="./images/images.png" alt="" class="menu-hamberger">
    </nav>
    <header>

    </header>
<?php foreach($catLivres as $datas):?>
<section id="section<?php echo $datas['id_categorie']; ?>">
    <div id ="content">
            <h3>
            <?php echo $datas['categorie'];  ?>
            </h3>
                <div id = "posted">
                    <?php foreach($datas['livres'] as $livre) : ?>
                    <div class="livres">
                        <div class="image">
                            <img src="<?php echo $livre['image']  ?>"  alt="">
                        </div>
                        <div class="livre">
                        <p><?php echo $livre['titre'];   ?></p>
                        <div class="ajout">
                            <button type="submit"><a  href="./voir.php?id=<?php echo $livre['id']; ?>" >Voir+</a></button>
                        </div>
                        <?php endforeach; ?>
                    </div>
                        </div>
                       
                </div>
                
    </div>    
</section>
<?php endforeach; ?>
</html>