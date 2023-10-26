<?php
session_start();
$connexion = mysqli_connect ('localhost', 'root','', 'librairie' );
if(!$connexion){
    die('Erreur de connexion à la Base de Donnée');
    }
if(!empty($_SESSION['id_admin'])){
$sessionadminId = $_SESSION['id_admin'];
$selection="SELECT * FROM admin WHERE id_admin='$sessionadminId' ";
$query=mysqli_query($connexion,$selection);
 $user = mysqli_fetch_assoc($query);
 if($user){
    $requete = "SELECT * FROM livres";
    $execute = mysqli_query($connexion,$requete);
    $articles = mysqli_fetch_all($execute,MYSQLI_ASSOC);
    $requte1 = "SELECT * FROM categorie";
    $query = mysqli_query($connexion,$requte1);
    if($query){
        $livres = mysqli_fetch_all($query,MYSQLI_ASSOC);
    }
    
 }else{
    die("utilisateur inconnu");
 }

}else{
    header('LOCATION:../../connexion.php');
}

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
                main {
            flex-grow: 1;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        #content {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 2em;
            width: 100%;
            max-width: 1200px;
        }

        #content .btn{
            text-decoration: none;
            padding: 10px;
            color: #fff;
            background-color: #3120cc;
            border-radius: 5px;
        }

        #content .btn:hover{
            background-color: #2718b6;
        }

        #content table{
            width: 100%;
            background-color: #fff;
        }

        #content table{
            text-align: center;
            border-collapse: collapse;
        }

        #content table th{
            border: 1px solid rgb(179, 179, 179);
        }

        #content table td{
            padding: 5px;
            width: 120px;
        }

        #content table tbody td .action{
            width: 100%;
            display: flex;
            justify-content: space-between;
        }

        #content table tbody tr:nth-child(odd){
            background-color: #cccccc;
        }

    </style>
</head>
<body>
<main>
        <div id="content">
            <h3>Mes Articles</h3>
            <a href="ajout.php" class="btn">Ajouter un article</a>
            <table>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Titre</th>
                        <th>Image</th>
                        <th>Description</th>
                        <th>Categorie</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    foreach($articles as $article): ?>  
                    <tr>
                        <td><?php echo $article['id'] ; ?></td>
                        <td><?php echo $article['titre'] ;?></td>
                        <td><img src="<?php echo $article['image']; ?>" alt="" width="100px" height="100px"></td>
                        <td><?php echo $article['description'] ;?></td>

                        <td>
                       <?php foreach($livres as $livre): ?>
                            <?php echo $livre['id']['titre'] ;?>
                        </td>
                        <?php endforeach;  ?>
                        <td><div class="action"><a href="modifier.php?id=<?php echo $article['id']; ?>">Editer</a><a href="supprimer.php?id=<?php echo $article['id']; ?> " onclick="Delete(event)">Supprimer</a></div></td>

                    </tr>
                    <?php endforeach;  ?>
                    
                </tbody>
            </table>
        </div>
    </main>
</body>
<script>
    function Delete(event){
        event.preventDefault();
        let url = event.target.href;
        
        if(confirm('Voulez vous vraiment supprimer l\'article? ')){
            window.location.href = url;
        }
    }
</script>
</body>
</html>