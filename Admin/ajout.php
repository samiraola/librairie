<?php
session_start();
$connexion = mysqli_connect ('localhost', 'root','', 'librairie' );
if(!$connexion){
    die('Erreur de connexion à la Base de Donnée');
}
$requte1 = "SELECT * FROM categorie";
$query = mysqli_query($connexion,$requte1);

if($query){
    $livres = mysqli_fetch_all($query,MYSQLI_ASSOC);
}
if(!empty($_SESSION['id_admin'])){
    $sessionadminId = $_SESSION['id_admin'];
    $selection="SELECT * FROM admin WHERE id_admin='$sessionadminId' ";
    $select=mysqli_query($connexion,$selection);
    if($select){
        $articles = mysqli_fetch_assoc($select);
    }
        if(!empty($_POST['titre']) && !empty($_POST['image'])&&!empty($_POST['description']) && !empty($_POST['categorie']) && !empty($_POST['prix']) && !empty($_POST['stock'])){
            $title =$_POST['titre'];
            $image =  $_POST['image'];
            $decription = $_POST['description'];
            $category = $_POST['categorie'];
            $prix = $_POST['prix'];
            $stock = $_POST['stock'];
            $requete = "INSERT INTO livres(titre,image,description,id_categorie,prix,stock) ";
            $requete .= "VALUES(?,?,?,?,?,?)";
            $stmt = mysqli_prepare($connexion,$requete);
            $query = mysqli_stmt_bind_param($stmt, "sssidi", $title, $image, $decription, $category, $prix, $stock);
            mysqli_stmt_execute($stmt);
            if ($connexion) {
                $affected_rows = mysqli_affected_rows($connexion);
                if ($affected_rows > 0) {
                    echo "validé";
                } else {
                    echo "Oops! Une erreur s'est produite lors de l'insertion des données... Veuillez réessayer plus tard";
                }
            } else {
                echo "La connexion à la base de données a échoué.";
            }
            
            }else{
                # Sinon affiche une erreur
                echo "Oops! Une erreur s'est produite lors de l'insertion des données... Veuillez réessayer plus tard";;
                
            }
        }
    else{
        die("utilisateur inconnu");
    }
    
       
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script defer src="https://kit.fontawesome.com/1f88d87af5.js" crossorigin="anonymous"></script>

    <style>
        body{
        background : url(./image/johnny-briggs-n5woEfyDobk-unsplash.jpg) ;
        background-position : center;
        background-size : cover;
        background-repeat : no-repeat;
        height :100vh;
        transition: all .5s:
        }
            *{
        margin: 0;
        padding : 0;
        list-style:none;
        text-decoration : none;
    }
    .sidebar{
        position: fixed;
        left : -250px;
        width : 250px;
        height : 100%;
        background : #042331;
        transition : all .5s ease;
    }
    .sidebar header{
        font-size : 22px;
        color :white;
        text-align : center;
        line-height : 70px;
        background : #063146;
        user-select : none;
    }
    .sidebar ul a{
        display : block;
        height :100%;
        width : 100%;
        line-height : 65px;
        font-size :20px;
        color: white;
        padding-left : 40px;
        box-sizing : border-box;
        border-top : 1px solid black;
        border-bottom : 1px solid black;
        transition : .4s;
    }
    ul li:hover a{
        padding-left:60px;
    }
    .sidebar ul a i{
        margin-right : 16px;
    }
    #check{
        display: none;
    }
    label #btn,label #cancel{
        position : absolute;
        cursor : pointer;
        background : #042331;
        border-radius: 3px;
    }
    label #btn{
        left:40px;
        top:25px;
        font-size:35px;
        color : white;
        padding : 6px 12px;
        transition : all .5s;
    }
    label #cancel{
        z-index : 1111;
        left: 195px;
        top :17px;
        font-size : 30px;
        color: #0a5275;
        padding : 4px 9px;
        transition : all .5s ease;
    }
    #check:checked ~  .sidebar{
        left : 0;
    } 
    #check:checked ~ label #btn{
        left : 250px;
        opacity : 0;
        pointer-events : none;
    } 
    #check:checked ~ label #cancel{
        left:195px;
    }
    #check:checked ~ section{
        margin-left :250px;
    }

.section{
    margin-top : -10px;    
}
h2 {
    background-color: #333;
    color: #fff;
    padding: 10px;
    text-align : center;

}

form {
    max-width: 400px;
    margin: 0 auto;
    background-color: #fff;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    width: 100%;
    display: flex;
    flex-direction: column;
}

label {
    display: block;
    margin-bottom: 5px;
}

input[type="text"],
input[type="number"],
textarea {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 3px;
    outline: none;
}
form #category
        {
            border: 1px solid #d4d4d4;
            padding: 10px;
            background-color: #fff;
        }


button {
    background-color: #333;
    color: #fff;
    border: none;
    padding: 10px 20px;
    border-radius: 3px;
    cursor: pointer;
}

button:hover {
    background-color: #555;
}     

    
    </style>
</head>
<body>
<input type ="checkbox" id="check">
    <label for="check">
        <i class="fas fa-bars" id="btn"></i>
        <i class="fas fa-times" id="cancel"></i>
    </label>
    <div class="sidebar">
        <header>Mon espace</header>
    
    <ul>
        <li><a href="dashbord.php"><i class="fas fa-qrcode"></i>Dashbord</a></li>
        <li><a href="articles.php"><i class="fas fa-link"></i>Livres</a></li>
        <li><a href="ajout.php"><i class="fas fa-stream"></i>Ajouter Livre</a></li>
        <li><a href=""><i class="fas fa-calendar-week"></i>Catégories</a></li>
        <li><a href="membres.php"><i class="far fa-question-circle"></i>Membres</a></li>
        <li><a href="profil.php"><i class="fas fa-sliders-h"></i>Mon Profil</a></li>
        <li><a href=""><i class="far fa-envelope"></i>Deconnexion</a></li>
    </ul>
    </div>
   
<main class="section">
<h2>Ajouter un Nouvel Article</h2>

<form method="post" enctype="multipart/form-data">
    <label for="titre">Titre :</label>
    <input type="text" name="titre" id="titre" required><br>

   

    <label for="description">Description :</label>
    <textarea name="description" id="description" required></textarea><br>

    <label for="category">Categorie</label>
    <select name="categorie" id="categorie">
        <?php foreach($livres as $livre):  ?>
        <option value="<?php echo $livre['id']; ?>"><?php echo $livre['titre']; ?></option>
       
        <?php endforeach;  ?>
    </select> <br>

    <label for="prix">Prix :</label>
    <input type="number" name="prix" id="prix" required><br>
    <label for="prix">Stock :</label>
    <input type="number" name="stock" id="stock" required><br>

    <label for="image">Image :</label>
    <input type="text" name="image" id="image" accept="image/*" required><br>

    <button type="submit">Ajouter l'Article</button>
</form>
</main>

</body>
</html>