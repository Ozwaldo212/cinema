<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Membres</title>
</head>
<body>

<div class="navbar">
        <a href="#">CINEMA &copy;</a>
        <a href="">Gestion des membres</a>

        <div class="align-right">
        <a href="menu.php">Retour au menu</a>
      </div>
    </div>


    <div class="container">
    <p>Ajouter un membre</p>
    <form action="ajout_membre.php" method="post">
        <label for="nom">Nom :</label>
        <input type="text" name="nom" placeholder="nom">
        <br>
        <label for="prenom">Prénom :</label>
        <input type="text" name="prenom" placeholder="prenom">
        <br>
        <label for="date_naissance">Date de naissance :</label>
        <input type="text" name="date_naissance" placeholder="date de naissance">
        <br>
        <label for="email">E-mail:</label>
        <input type="text" name="email" placeholder="email">
        <br>
        <label for="adresse">Adresse:</label>
        <input type="text" name="adresse" placeholder="adresse">
        <br>
        <label for="cpostal">Code postal :</label>
        <input type="text" name="cpostal" placeholder="code postal">
        <br>
        <label for="ville">Ville :</label>
        <input type="text" name="ville" placeholder="ville">
        <br>
        <label for="pays">Pays :</label>
        <input type="text" name="pays" placeholder="pays">
        <br>
        <input type="submit" value="Ajouter">
    </form>
    


    <h2>Supprimer un membre</h2>

    <form method="post" action="traitement_suppression_membre.php">
        <label for="id_member">ID du membre à supprimer :</label>
        <input type="text" name="id_member" placeholder="id_member">
        <br>
        <input type="submit" value="Supprimer">
    </form>

        </div>

    <style>
     a{
    text-decoration: none;
    color: white;
    }
    .navbar {
    background: rgb(8, 8, 8);
    color: white;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 25px;
    border: 5px solid rgb(217, 14, 14);
    margin-bottom: 20px;
  }
  #site-name {
    margin-right: auto;
  }
  .nav-right {
    display: flex;
    align-items: center;
  }
  
body {
    font-family: Arial, sans-serif;
    padding: 20px;
}

.container {
    max-width: 600px;
    margin: 0 auto;
    background-color: white;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
}

h1, h2 {
    text-align: center;
    margin-bottom: 30px;
}

h2 {
    margin-bottom: 15px;
}

form {
    margin-bottom: 20px;
    
}

input[type="text"],
input[type="nom"],
input[type="number"]
input[type="email"] {
    display: block;
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

input[type="submit"] {
    background: red;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}
</style>
</body>
</html>