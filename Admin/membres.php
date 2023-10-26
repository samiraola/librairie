<?php
$connexion = mysqli_connect('localhost', 'root', '', 'librairie');
if (!$connexion) {
    die('Erreur à la connexion');
}

$users = "SELECT * FROM utilisateurs ORDER BY id DESC";
$requette = mysqli_query($connexion, $users);
if ($requette) {
    if (mysqli_num_rows($requette) > 0) {
        // Il y a des résultats à parcourir
        foreach ($requette as $row) {
            // Traitez les données ici
        }
    } else {
        echo "Aucun résultat trouvé.";
    }
} else {
    echo "Erreur dans la requête.";
}


if (isset($_GET['s']) && !empty($_GET['s'])) {
    $recherche = htmlspecialchars($_GET['s']);
    $users = "SELECT firstname FROM utilisateurs WHERE firstname LIKE '%" . $recherche . "%' ORDER BY id DESC";
    $execute = mysqli_query($connexion, $users);

    
       
        if (mysqli_num_rows($execute) > 0) {
                    while ($row = mysqli_fetch_assoc($execute)) {
                        // Utilisez $row pour accéder aux résultats de la recherche
                        echo "Résultat de la recherche : " . $row['firstname'] . "<br>";
                    }
                } else {
                    echo "Aucun utilisateur trouvé.";
                }
            
           
       echo "erreur";
    }else {
        echo "Erreur dans la requête de recherche.";
}
$select = "SELECT * FROM utilisateurs";
$query = mysqli_query($connexion,$select);
if($query){
    $resultat = mysqli_fetch_all($query,MYSQLI_ASSOC);   
}
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Utilisateurs</title>
    <script defer src="https://kit.fontawesome.com/1f88d87af5.js" crossorigin="anonymous"></script>
    <style>
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
        padding-left:50px;
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


    body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f2f2f2;
    text-align: center;
}

h2 {
    background-color: #333;
    color: #fff;
    padding: 10px;
}
form input{
    padding : 10px;
}
form input[type ='submit']{
    cursor : pointer;
    background-color : #ccc;
}
table {
    width: 80%;
    margin: 20px auto;
    border-collapse: collapse;
    background-color: #fff;
}

table th, table td {
    border: 1px solid #ccc;
    padding: 10px;
}

table th {
    background-color: #333;
    color: #fff;
}
table td button a{
    color : white;
}
table td button[type='button']{
    padding : 10px;
    background: red;
    border : none;
    cursor : pointer;
    border-radius : 5px 10px;
    text-align : center;
}
table tr:nth-child(even) {
    background-color: #f2f2f2;
}

table tr:nth-child(odd) {
    background-color: #fff;
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
        <li><a href="panier.php"><i class="fas fa-link"></i>Livres Postés</a></li>
        <li><a href="ajout.php"><i class="fas fa-stream"></i>Ajouter Livre</a></li>
        <li><a href=""><i class="fas fa-calendar-week"></i>Catégories</a></li>
        <li><a href="membres.php"><i class="far fa-question-circle"></i>Membres</a></li>
        <li><a href="profil.php"><i class="fas fa-sliders-h"></i>Mon Profil</a></li>
        <li><a href="deconnexion.php"><i class="far fa-envelope"></i>Deconnexion</a></li>
    </ul>
    </div>
<section>
<h2>Liste des Utilisateurs</h2>
<form action="" method="get">
    <p>rechercher un utilisateur</p>
    <input type="search" name="s" id="search" placeholder = "rechercher...">
    <input type="submit" value="rechercher">
</form>
<section>
      
</section>
<table>
    <?php foreach($resultat as $value): ?>
    <tr>
        <th>ID</th>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Email</th>
        <th>Mot de passe</th>
        <th>Date d'Inscription</th>
        <th>Action</th>
    </tr>
    <tr>
        <td><?php echo $value['id']; ?></td>
        <td><?php echo $value['lastname']; ?></td>
        <td><?php echo $value['firstname']; ?></td>
        <td><?php echo $value['email']; ?></td>
        <td><?php echo $value['password']; ?></td>
        <td><?php echo $value['date']; ?></td>
        <td><button type="button"><a href="supprimer.php?id=<?php echo $value['id']; ?>">supprimer</a></button></td>
        
    </tr>
    <?php endforeach;  ?>
</table>
</section>
</body>
</html>