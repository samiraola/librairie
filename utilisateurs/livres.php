<?php
require_once "config.php";

$requete1 = "SELECT * FROM livres ";
$query1 = mysqli_query($connexion,$requete1);

if(!$query1){
    echo "OOps! Une erreur est survenue, veuillez réessayer plus tard!";
} else{
    $articles = mysqli_fetch_all($query1,MYSQLI_ASSOC); 
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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

    background :#261c85;
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
    background-color: #007bff;
    color: #FFFF;
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

#posted {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    justify-content: center;
    gap: 2em;
}


#posted .livres {
    width: 200px;
    height: 200px;
    display: flex;
    flex-direction: column;
    box-shadow: rgba(15, 26, 46, 0.05) 0px 0px 0px 1px, rgb(92, 127, 181) 0px 0px 0px 1px inset;
    border-radius: 6px;
    overflow: hidden;
    transition: 0.5s;
    background-color: #fff;
}


#posted .livres:hover {
    transform: scale(1.1);
    box-shadow: 0px 0px 10px 2px #e1e1e1;
    transition: all .2s ease-in;
}
#posted .livres .title {
    margin: 0 auto;
    padding: 5px;
    color: #261c85;
    font-weight: 700;
    
}
#posted .livres .ajout{
    
    padding: 20px;
    gap: 1.2em; 
    text-align: center;
    
}
#posted .livres .ajout button{
    
    background-color: #007bff;

}
#posted .livres .ajout button a{
    width: 200px;
    height: 200px;
   text-decoration: none;
    color: #fff;
    border: none;
    outline: none; 
    
}
#posted .livres .ajout button:hover{
   
    background-color: #261c85;
    color : white;
    
}
#posted .livres{
            width : 250px;
            height : 400px;
        }
        #posted .livres img{
            width : 100%;
            height : 300px;
        }
        #posted .livres .ajout{
           padding : 30px;
        }
        
        #posted .livres .ajout button{
            width : 100%;
            height : 30px;
            border : none;
            color : #fff;
            background-color: #007bff;
        }
        #posted .livres .ajout button:hover{
            border : 1px solid white;

        }
        .livres .ajout button a{
            text-decoration: none;
            color : white;
           
        }
    </style>
</head>
<body>
<nav>
        <a class="logo"   href="">Item-librairie</a>
        <ul>
            <li><a href="./">Accueil</a></li>
            <li><a href="">Catégories</a></li>
            <li><a href="connexion.php">Connexion</a></li>
            <form action="" method="">
                <input type="search" name="search" id="search" placeholder="rechercher..." >
            </form>
            <li><a href="inscription.php" class="inscription" >Inscription</a></li>
            <li><a href="vendre.php" class="inscription" >Vendre</a></li>
            
        </ul>
    </nav>
    <section>
    <div id ="content">
       
       <div id = "posted">
           <?php
               foreach($articles as $article) : 
           ?>
           <div class="livres">
               <img src="<?php echo $article['image']; ?>" alt="">
               <p class="title"><?php echo $article["titre"];  ?></p>
               <div class="ajout">
                   <button type="submit"><a href="voir.php?id=<?php echo $article['id']; ?>">Voir+</a></button>
               </div>
           </div>
           <?php endforeach;?>
       </div>
      
</div>
    </section>

</body>
</html>