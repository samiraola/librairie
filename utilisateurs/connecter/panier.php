<?php
require_once "header.php";
# On se connecte à notre base de donnée
$connection = mysqli_connect('localhost', 'root', '', 'librairie');

# Si la connexion n'a pas aboutie, on affiche une erreur
if (!$connection) {
    die("Une erreur est survenue lors de la liason avec la base de donnée. Veuillez réessayer plus tard!");
}

# Selection de tous les paniers dans la bd
$sql = "SELECT * FROM panier INNER JOIN livres WHERE livres.id = panier.id_article";
$query = mysqli_query($connection, $sql);
if ($query) {
    $articles = mysqli_fetch_all($query, MYSQLI_ASSOC);
    
} else {
    echo "<script>Une erreur est survenue lors de la récupération des données</script>";
}

# Selection du nombre de paniers dans la bd
$nb_sql = "SELECT COUNT(*) AS total FROM panier";
$nb_query = mysqli_query($connection, $nb_sql);
if ($nb_query) {
    $nb_panier = mysqli_fetch_assoc($nb_query);
    $nb_panier = $nb_panier['total'];
}

$requete2 = "SELECT * FROM categorie";
$query2 = mysqli_query($connection,$requete2);

if($query2){
    $categories = mysqli_fetch_all($query2,MYSQLI_ASSOC);
    $catLivres = [];

    if($categories){
        foreach($categories as $cat){
            $id_categorie = $cat['id'];
            $requete = "SELECT * FROM livres WHERE id_categorie = '$id_categorie' ";
            $query = mysqli_query($connection,$requete);
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
    <script defer src="https://kit.fontawesome.com/1f88d87af5.js" crossorigin="anonymous"></script>
    <title>panier</title>
    <link rel="stylesheet" href="../css/pannier.css">
    <style>
        *{

        }
       body {
        font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
        overflow-x : hidden;
        margin: 0;
        padding: 0;
        background-color: #f2f2f2;
        text-align: center;
    
}
/* 
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
        

        .panier {
            display: flex;
            align-items: center;
            justify-content: right;           
        }

        .panier .number {
            background-color: red;
            border-radius: 100%;
            font-weight: bold;
            padding: 5px;
        }

        .sticky {
            position: sticky;
            backdrop-filter: blur(5px);
            box-shadow: 0px 0px 10px 2px #58585830;
        }
 */



.pannier {
    display: flex;
    flex-direction : column;
    justify-content:space-evenly;
    max-width: 600px;
    margin: 0 auto;
    background-color: #fff;
    padding: 0 100px;
    margin-top : 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

h2 {
   
    font-size: 24px;
}

.liste-articles {
    list-style: none;
    padding: 0;
}

.article {
    display: flex;
    align-items: center;
    margin-bottom: 20px;
}

img {
    width: 100px;
    height: 100px;
    border: 1px solid #ccc;
    border-radius: 5px;
    
}

.info-article {
    flex: 1;
    margin : 5px;
    text-align: center;
}

h3 {
    font-size: 18px;
}

input[type="number"] {
    width: 70px;
    text-align: center;
}
.prix {
    font-weight: bold;
}
.bouton {
    display : flex;
    justify-content : center;
    flex-direction : column;
    justify-content : right;
    margin-top : 30px;
}
button.supprimer {
    
    background-color: #f00;
    color: #fff;
    border: none;
    padding: 5px 10px;
    border-radius: 3px;
    cursor: pointer;
}

button.supprimer:hover {
    background-color: #a00;
}
button a{
    text-decoration: none;
    color : white;
}
.total {
    text-align: right;
    font-weight: bold;
}

    </style>
</head>

<body>

        
    <div class="pannier">
    <h2>Mon Panier</h2>
    <ul class="liste-articles">
    <?php if(!empty($articles)): ?>
                <?php $total = 0; ?>
            <?php foreach ($articles as $article): ?>
                <?php $total += $article['prix'] * $article['quantite']; ?>
                
        <li class="article">
            <img src="<?php echo $article['image']; ?> " alt="" >
            <div class="info-article">
                <h3><?php echo $article['titre']; ?></h3>
                <p><input type="number" value="<?php echo $article['quantite']; ?>" id="article<?php echo $article['id']; ?>" min="1"></p>
                <span class="prix">Prix :  <?php echo number_format ($article['prix'],2,'.'); ?></span>
            </div>
            <div class="bouton">
            <!-- <button class="supprimer"><a href="./modifier.php?id=<?php echo $article['id']?>&quantite=<?php echo $article['quantite'] ;?>" >Modifier</a></button><br> -->
            <button class="supprimer"><a href="#" onclick="updateCart(event, <?php echo $article['id']; ?>)" >Modifier</a></button><br>
            <button class="supprimer"><a href="./supprimer.php?article_id=<?php echo $article['id']; ?>">Supprimer</a></button><br>
            </div>
        </li>
       
        <?php endforeach; ?>
    </ul>
    
    <div class="total">
        <span>TOTAL: <?php echo number_format($total, 2, '.'); ?> FCFA</span>
    </div>
    <?php endif; ?>
</div>

</body>
<script>

    function updateCart(event, articleId) {
        event.preventDefault(); // Empêche le comportement par défaut du lien

        // Récupère la valeur de l'élément <input> en utilisant l'identifiant unique
        var inputElement = document.getElementById("article" + articleId);
        var quantite = inputElement.value;

        let url = "./modifier.php?id=" + articleId + "&quantite=" + quantite;
        window.location.href = url;
    }

    function deleteCart(event, articleId) {
        event.preventDefault(); // Empêche le comportement par défaut du lien

        // Récupère la valeur de l'élément <input> en utilisant l'identifiant unique
        var inputElement = document.getElementById("article" + articleId);

        if (confirm('Voulez vous réellement supprimer cet article du panier?')) {
            let url = "./delete.php?article_id=" + articleId;
            window.location.href = url;
        }

    }
</script>
</html>