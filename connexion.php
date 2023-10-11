<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
   
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



section {
    flex-grow: 1;
    padding: 20px;
    display: flex;
    align-items : center;
    flex-direction: column;
    width: 25%;
    height: 50%;
    background: url(images/photo_2023-10-04_16-46-45.jpg);
    background-repeat: no-repeat;
    background-size: cover;
    margin : 0 auto;
   margin-top : 100px;
}

#content {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 2em;
    width: 100%;
    
    max-width: 1200px;
}
 #content h3{
    color: #ffff;
}
#content form {
    width: 100%;
    max-width: 500px;
    display: flex;
    flex-direction: column;
   
    gap: 1.5em;
}

#content form .group {
    display: flex;
    flex-direction: column;
}
#content form label {
    color: #ffff;
    width: fit-content;
}
#content form input{
    border: none;
    outline: none;
    background-color: transparent;
    border-top: none;
    border-left: none;
    border-right: none;
    border-bottom: 2px solid #fff;
    padding: 10px;
    resize: none;
    color:#fff;
}
#content form input[type='submit']{
    cursor: pointer;
}
#content form input[type='submit'] {
    width: 100%;
    max-width: fit-content;
    padding: 10px;
    border-radius: 5px;
    margin: 0 auto;
    background-color: burlywood;
    color: #fff;
    text-align: center;
}
#content form input[type='submit']:hover {
    
    border: 1px solid #fff;
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
<section> 
    <div id="content">
            <h3>Connexion</h3>
            <form action="" method="">
                <div class="group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" >
                </div>
                <div class="group">
                    <label for="password">Mot passe</label>
                    <input type="password" name="password" id="password" >
                </div>
                <input type="submit" value="Se connecter">

            </form>    
</section>

   
</body>
</html>