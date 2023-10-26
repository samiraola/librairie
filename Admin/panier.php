<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Panier</title>
    <style>
        
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f2f2f2;
    text-align: center;
}

.panier {
    max-width: 600px;
    margin: 0 auto;
    background-color: #fff;
    padding: 20px;
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
    margin-left: 10px;
    text-align: left;
}

h3 {
    font-size: 18px;
}

.prix {
    font-weight: bold;
}
.bouton {
    display : flex;
    justify-content : center;
    flex-direction : column;
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

.total {
    text-align: right;
    font-weight: bold;
}
    </style>
</head>
<body>

<div class="panier">
    <h2>Mon Panier</h2>
    <ul class="liste-articles">
        
        <li class="article">
            <img src="https://images.unsplash.com/photo-1495446815901-a7297e633e8d?auto=format&fit=crop&q=60&w=500&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8bGl2cmVzfGVufDB8fDB8fHww" alt="Article 1">
            <div class="info-article">
                <h3>Titre de l'article 1</h3>
                <p><input type="number" name="number" id="number"></p>
                <span class="prix">Prix : $19.99</span>
            </div>
            <div class="bouton">
            <button class="supprimer">Modifier</button><br>
            <button class="supprimer">Supprimer</button><br>
            </div>
        </li>
        <li class="article">
            <img src="https://images.unsplash.com/photo-1550399105-c4db5fb85c18?auto=format&fit=crop&q=60&w=500&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTF8fGxpdnJlc3xlbnwwfHwwfHx8MA%3D%3D" alt="Article 2">
            <div class="info-article">
                <h3>Titre de l'article 2</h3>
                <p>Description de l'article 2.</p>
                <span class="prix">Prix : $24.99</span>
            </div>
            <button class="supprimer">Supprimer</button>
        </li>
        <!-- Ajoutez d'autres articles au panier -->
    </ul>
    <div class="total">
        <span>Total : $44.98</span>
    </div>
</div>

</body>
</html>