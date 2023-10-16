<?php
# On se connecte à notre base de donnée
$connection = mysqli_connect('localhost', 'root', '', 'librairie');

# Si la connexion n'a pas aboutie, on affiche une erreur
if (!$connection) {
    die("Une erreur est survenue lors de la liason avec la base de donnée. Veuillez réessayer plus tard!");
}

# Selection de tous les articles dans la bd
$sql = "SELECT * FROM articles";
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
       

        .sous-nav{
        list-style: none;
        display: none;
        position: absolute;
        left : 0;
        top : 30px;
        background-color: #fff;
        width : max-content;
        padding : 10px;
        }
        .sous-nav li a:hover{
            padding: 6px;
            background-color : burlywood;
           
        }
        .sous-nav li{
            text-align : center;
            margin :5px;
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

       


        .helper {
            display: flex;
            align-items: center;
            position: relative;
            gap: 2em;
            width: 50%;
            text-align: center;
            justify-content: space-around;
        }

        .helper .number {
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

        main {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            gap: 2em;
        }

       

        .content {
            padding: 20px;
            display: flex;
            flex-direction: column;
            gap: 2em;
        }

        .content h2 {
            text-align: center;
        }

        .articles {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            gap: 3em;
            max-width: 1500px;
            margin: 0 auto;
        }

        .articleBox {
            width: 100%;
            max-width: 400px;
        }

        .imgBox {
            width: 100%;
            height: 400px;
            box-shadow: 0px 0px 5px 1px #5757575c;
        }

        .imgBox img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .infoBox {
            padding: 20px;
            background-color: #d1d1d13c;
            color: #444;
            text-align: center;
            display: flex;
            flex-direction: column;
            gap: 1em;
        }

        .price_qty {
            display: flex;
            justify-content: space-between;
            padding: 10px;
        }

        .price_qty h4 {
            color: #0000008e;
        }

        .price_qty * {
            border: 1px solid;
            padding: 5px;
            flex-grow: 1;
        }

        .price {
            font-size: 1.2em;
            font-weight: bold
        }

        .description {
            text-align: justify;
            height: 40px;
            overflow: hidden;
        }

        .more {
            text-decoration: none;
            border: 1px solid #444;
            color: #444;
            padding: 5px;
            border-radius: 5px;
            align-self: flex-start;
        }

        .more:hover {
            background-color: #44444438;
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
                        <li><a href="categorie.php">XVe siècles</a></li>
                        <li><a href="categorie.php">XVIe siècles</a></li>
                        <li><a href="categorie.php">XVIIe siècles</a></li>
                    </ul>
            </li>
            <li><a href="deconnexion.php">Deconnexion</a></li>
            <form action="" method="post">
                <input type="search" name="search" id="search" placeholder="rechercher">
            </form>
            <li><a href="profil.php" class="inscription">Profil</a></li>
            <li><a href="" class="inscription">Vendre</a></li>
           
        </ul>

        <ul class="nav">
            <li class="helper">
                <a href="./pannier.php"><span class="number"><?php echo $nb_panier ?? 0; ?></span>Pannier</a>
            </li>
        </ul>
    </header>
    <main>
        
        <div class="content">
            <h2>Articles disponibles</h2>
            <div class="articles">
                <?php if (!empty($articles)) : ?>
                    <?php foreach ($articles as $article) : ?>
                        <div class="articleBox">
                            <div class="imgBox">
                                <img src="<?php echo $article['image'] ?>" alt="<?php echo $article['nom'] ?>">
                            </div>
                            <div class="infoBox">

                                <div class="price_qty">
                                    <h4><?php echo ucwords($article['nom']) ?></h4>
                                    <p class="price"><?php echo number_format($article['prix'], 2, '.') ?> fcfa</p>
                                    <p><?php echo $article['stock'] ?></p>
                                </div>
                                <div class="description">
                                    <p><?php echo $article['description'] ?></p>
                                </div>
                                <a href="detail.php?article_id=<?php echo $article['id'] ?>" class="more">Detail</a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else : ?>
                    <p style="color:#444; padding:10px; background-color: #58585830;">Aucun article disponible pour l'instant</p>
                <?php endif; ?>
            </div>
        </div>
    </main>
</body>
<script>
    document.addEventListener('scroll', () => {
        if (window.scrollY >= 10) {
            document.querySelector('#header').classList.add('sticky')
        } else {
            document.querySelector('#header').classList.remove('sticky')
        }
    })
</script>

</html>