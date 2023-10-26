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
    <title>categorie</title>
    <link rel="stylesheet" href="../css/categorie2.css">
<style>
        body{
            background: rgba(250, 153, 22, 0.49);
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
            <li><a href="deconnexion.php">Deconnexion</a></li>
            <form action="" method="post">
                <input type="search" name="search" id="search" placeholder="rechercher">
            </form>
            <li><a href="profil.php" class="inscription">Profil</a></li>
            <li><a href="" class="inscription">Vendre</a></li>
            <div class="panier"></div>
        </ul>
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
                        <img src="<?php echo $livre['image']  ?>"  alt="">
                        <p class="title"   ><?php echo $livre['titre'];   ?></p>
                        <div class="ajout">
                            <button type="submit"><a  href="detail.php?article_id=<?php echo $livre['id']; ?>" >Voir+</a></button>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                
    </div>    
</section>
<?php endforeach; ?>n>


