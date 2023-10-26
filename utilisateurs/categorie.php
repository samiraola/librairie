<?php

# On se connecte à notre base de donnée
require_once "config.php";

# Si la connexion n'a pas aboutie, on affiche une erreur
if (!$connexion) {
    die("Une erreur est survenue lors de la liason avec la base de donnée. Veuillez réessayer plus tard!");
}

$requete = "SELECT * FROM categorie";
$query = mysqli_query($connexion,$requete);

if($query){
    $result = mysqli_fetch_all($query,MYSQLI_ASSOC);
    
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

.category {
    background-color: #f9f9f9;
    border: 1px solid #ccc;
    border-radius: 5px;
    padding: 20px;
    margin: 20px 0;
    text-align : center;
}


.category-title {
    font-size: 24px;
    color: #333;
    margin: 0;
    margin-bottom: 10px;
}


.book-list {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
}


.book {
    width: calc(33.33% - 20px);
    border: 1px solid #ddd;
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    transition: transform 0.2s ease-in-out;
    margin-bottom: 20px;
    padding: 10px;
}

.book:hover {
    transform: translateY(-5px);
}


.book-image img {
    max-width: 100%;
    height: auto;
    display: block;
    border-radius: 5px 5px 0 0;
}

/
.book-title {
    font-size: 18px;
    color: #333;
    margin: 10px 0;
    text-align: center;
}


.view-more {
    text-align: center;
    margin: 15px;
}

.view-button {
    background-color: #007bff;
    color: #fff;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
    text-transform: uppercase;
    text-decoration: none;
    display: inline-block;
}

.view-button:hover {
    background-color: #0056b3;
}

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
                        <?php foreach($result as $value) : ?>
                    <li><a href="categorie.php?id=<?php echo $value['id']; ?>"><?php echo $value['titre'] ; ?></a></li>
                       
                        <?php endforeach; ?>
                    </ul>
            </li>
                <li><a href="connexion.php">Connexion</a></li>
                <form action="" method="post">
                <input type="search" name="search" id="search" placeholder="rechercher">
            </form>
                <li><a href="inscription.php" class="inscription">Inscription</a></li>
                <li><a href="" class="inscription">Vendre</a></li>
                 <a href="connexion.php" class="panier"><span class="number"><?php echo $nb_panier ?? 0; ?></span></a>
                
                
            </ul>
        </div>
        <img src="./images/images.png" alt="" class="menu-hamberger">
    </nav>
    <header>

    </header>
<?php foreach($catLivres as $datas):?>

<section class="category" id="category-<?php echo $datas['id_categorie']; ?>">
    <h2 class="category-title"><?php echo $datas['categorie']; ?></h2>
    <div class="book-list">
        <?php foreach ($datas['livres'] as $livre) : ?>
            <div class="book">
                <div class="book-image">
                    <img src="<?php echo $livre['image']; ?>" alt="<?php echo $livre['titre']; ?>">
                </div>
                <div class="book-details">
                    <p class="book-title"><?php echo $livre['titre']; ?></p>
                    <div class="view-more">
                        <a class="view-button" href="./voir.php?id=<?php echo $livre['id']; ?>">Voir +</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<?php endforeach; ?>
</html>