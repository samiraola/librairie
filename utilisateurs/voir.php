<?php
# On se connecte à notre base de donnée
$connection = mysqli_connect('localhost', 'root', '', 'librairie');

# Si la connexion n'a pas aboutie, on affiche une erreur
if (!$connection) {
    die("Une erreur est survenue lors de la liason avec la base de donnée. Veuillez réessayer plus tard!");
}

# Vérifie si le paramètre article_id existe
if (!empty($_GET['article_id'])) {
    $article_id = (int) $_GET['article_id']; # Conversion en int

    # Si la conversion ne retourne pas de valeur on le ramène à l'accueil
    if (!$article_id) {
        header('Location: ./');
    }

    # On récupère l'article en fonction de l'id
    $sql = "SELECT * FROM articles WHERE id = ?";
    $stmt = mysqli_prepare($connection, $sql); # On prépare la requête (évite les injections SQL)
    $query = mysqli_stmt_bind_param($stmt, "i", $article_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if ($result) {
        # On récupère les données de la requête
        $article = mysqli_fetch_assoc($result);

        if (!$article) {
            header('Location: ./');
        }
    } else {
        echo "Oops! Une erreur s'est produite lors de l'insertion des données... Veuillez réessayer plus tard";
        die();
    }
} else {
    # Sinon on le ramène à l'accueil
    header('Location: ./');
}

# Selection du nombre de paniers dans la bd
$nb_sql = "SELECT COUNT(*) AS total FROM panier";
$nb_query = mysqli_query($connection, $nb_sql);
if ($nb_query) {
    $nb_panier = mysqli_fetch_assoc($nb_query);
    $nb_panier = $nb_panier['total'];
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="">
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
    
   
}

nav {
    display: flex;
    padding: 10px 30px;
    background-color: burlywood;
    justify-content: space-evenly;
    gap: 2em;
    align-items: center;
    color: #fff
}

nav a {
    text-decoration: none;
    color: #fff
}

nav .logo {
    padding: 10px;
    border: 1px solid #fff;
    font-size: 1.8em;
}

nav .logo:hover {
    background-color: #fff;
    color: burlywood;
    transition: all .2s ease-in-out;
}

nav ul {
    display: flex;
    justify-content: space-evenly;
    gap: 1em;
    list-style: none;
    align-items: center;
    flex-grow: 1;
}

nav ul li {
    min-width: 100px;
    padding: 5px;
}

nav ul li a {
    font-size: 1.1em;
}

nav ul .inscription {
    color: black;
    background-color: #fff;
    padding: 10px;
    border-radius: 5px;
}

nav ul .inscription:hover {
    padding: 12px;
    transition: all .2s ease-in-out;
}

nav ul input {
    min-height: 30px;
    padding: 5px 10px;
    outline: none;
    border: none;
    border-radius: 5px;
   
}

@media screen and (max-width: 930px) {
   nav {
        flex-direction: column;
    }
}

@media screen and (max-width: 730px) {
    ul {
        flex-direction: column;
    }

   nav ul form,
    input {
        width: 100%;
    }
}
        section{
            width: 100%;
            height: 400px;
            border: 1px solid #FF9504;
            display:flex;
            align-items: center;
            justify-content : center;
            margin : 0 auto;

        }
        #content{
            padding: 20px;
            display: flex;
            flex-direction: column;
            gap: 2em;
            border: 1px solid #FF9504;
        }
        .livre{
            display: flex;
            justify-content: space-around;
            gap: 2em;
            flex-wrap: wrap;
            width: 100%;
            max-width: 1100px;
            margin: 0 auto;
        }
        .livre p{
            display: flex;
            flex-direction: column;
            text-decoration: underline;
            
        }
        .livre img{
            width: 250px;
           
        }
        .info{
            padding: 20px;
            background-color: #d1d1d13c;
            color: #444;
            text-align: center;
            display: flex;
            flex-direction: column;
            gap: 1em;
        }
        .info *{
            border: 1px solid;
            padding: 5px;
            flex-grow: 1;
        }
        .info h4{
            color: #0000008e;
        }
        .info p{
            font-size: 1.2em;
            font-weight: bold
        }
        .desc{
            display: flex;
            justify-content: space-between;
            padding: 10px;
        }
        .description {
            text-align: justify;
        }
        a{
            display :flex;
            justify-content: center;
            align-items : center;
            text-align : center;
        }
        .ajout{
            text-decoration: none;
            color: #ffffff;
            padding: 5px;
            border-radius: 5px;
            background-color: burlywood;
            width: 25%;
            margin: 0 auto;
        }
        .ajout:hover{
            background-color: rgb(176, 110, 22);
        }

</style>
    
</head>
<body>
    <nav>
        <a class="logo"   href="">Livres</a>
        <ul>
            <li><a href="./">Accueil</a></li>
            <li><a href="">Catégories</a></li>
            <li><a href="connexion.php">Connexion</a></li>
            <form action="" method="">
                <input type="search" name="search" id="search" placeholder="rechercher..." >
            </form>
            <li><a href="inscription.php" class="inscription" >Inscription</a></li>
            
        </ul>
    </nav>
    <section class="form">
        <div id="content">
            <h2>Détail de l'article : <?php echo ucwords($article['nom']) ?>  </h2>
                    <div class="livre">
                    <img src="<?php echo $article['image'] ?>" alt="<?php echo $article['nom'] ?>">
                        <div class="desc">
                            <div class="info">
                                <h4><?php echo ucwords($article['nom']) ?></h4></h4>
                                
                                <p class="prix"><?php echo number_format($article['prix'], 2, '.') ?> fcfa</p>
                                <p>Stock : <?php echo $article['stock'] ?></p>
                            </div>
                        </div>
                    </div>              
                            <div class="description">
                                            
                            <p><?php echo $article['description'] ?></p>
                               <a href="Ajout.php" class="ajout"  >Ajoutez au panier</a>
                            </div>
                </div>
        </div>        
               
    </section>            