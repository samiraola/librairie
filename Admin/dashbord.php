<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Bord de l'Administrateur</title>
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
    section{
        background : url(./image/johnny-briggs-n5woEfyDobk-unsplash.jpg) ;
        background-position : center;
        background-size : cover;
        background-repeat : no-repeat;
        height :100vh;
        transition: all .5s;
    }
    .dashboard {
    display: flex;
    }

    .content {
    flex: 1;
    width : 50%;
    margin : 0 auto;
    padding: 20px;
    background-color: #fff;
    position : relative;
    top : 50px;
    }

h2 {
    font-size: 24px;
}

p {
    margin-top: 10px;
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
        <header>Tableau de bord</header>
        <ul>
            <li><a href=""><i class="fas fa-qrcode"></i>Dashbord</a></li>
            <li><a href="articles.php"><i class="fas fa-link"></i>Livres</a></li>
            <li><a href="ajout.php"><i class="fas fa-stream"></i>Ajouter Livre</a></li>
            <li><a href=""><i class="fas fa-calendar-week"></i>Catégories</a></li>
            <li><a href="membres.php"><i class="far fa-question-circle"></i>Membres</a></li>
            <li><a href="profil.php"><i class="fas fa-sliders-h"></i>Mon Profil</a></li>
            <li><a href="deconnexion.php"><i class="far fa-envelope"></i>Deconnexion</a></li>
        </ul>
    </div>
    <section>
        <div class="content">
            <h2>Bienvenue, Administrateur</h2>
            <p>Ceci est votre tableau de bord. Vous pouvez gérer les utilisateurs,articles , et autres ici.</p>
        </div>
    </section>

</body>
</html>