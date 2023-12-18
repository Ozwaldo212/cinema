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
        <div class="align-right">
        <a href="menu.php">Retour au menu</a>
      </div>
    </div>


    <div class="container">
        <h1>Gestion des membres</h1>
        
        <p>Ajouter un membre</p>
         <form method="POST">
            <labe for="nom"> Nom </label>
            <input type="text"name="nom" id="nom" required><br>
                  
            <label for="nom"> Prenom </label>
            <input type="text"name="prenom" id="prenom" required><br>
                     
            <label for="nom"> Date de naissance </label><br>
            <input type="nom"name="date_naissance" id="date_naissance" required><br>
                         
            <label for="nom"> Email </label><br>
            <input type="nom"name="email" id="email" required><br>
                             
            <label for="nom">Code postal</label><br>
            <input type="nom"name="" id="cpostal" required><br>
                                 
            <label for="nom">Ville</label><br>
            <input type="nom"name="" id="ville" required><br>
                                     
            <label for="nom">Pays</label><br>
            <input type="nom"name="" id="pays" required><br>
                          
            <input type="submit"value="Ajouter">
        </form>
        
                  <p>Supprimer un membre</p>
                       <form action="" method="POST">
                            <input type="number" name="id" placeholder="ID du membre" required>
                          <input type="submit" value="Supprimer">
                        </form>
        
        <p>Rechercher un membre</p>
               <form method="POST">
                     <input type="text" name="recherche" placeholder="Nom ou prénom" required>
                   <input type="submit" value="Rechercher">
               </form>
        
        <p>Historique de connexion d'un membre</p>
             <form method="POST">
                   <input type="number" name="id" placeholder="ID du membre" required>
            <input type="submit" value="Consulter">
        </form>
        
        <p>Films consultés par un membre</p>
                <form method="POST">
                       <input type="number" name="id" placeholder="ID du membre" required>
                   <input type="submit" value="Consulter">
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
    background-color: black;
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

h1 {
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
input[type="number"] {
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