<?php
include_once('connect.php');


    // Fonction de recherche de films
    
    function rechercherFilms($genre = null, $distributeur = null, $nom = null)
    {
        //var_dump ($genre, $distributeur, $nom);die();
        global $conn;
        // Construit la requête SQL en fonction des critères de recherche
        $sql = "SELECT * FROM tp_film WHERE 1";
    
        if (!empty($genre)) {
            $sql .= " AND id_genre = $genre";
        }
    
        if (!empty($distributeur)) {
            $sql .= " AND id_distrib = '$distributeur'";
        }
    
        if (!empty($nom)) {
            $sql .= " AND titre LIKE '%$nom%'";
        }
        // Exécuter la requête
        $statement = $conn->prepare($sql);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
     // Fermeture de la connexion à la base de données
     //$conn->close();

     // Fonction ajouter un avis sur un film dans la table tp_historique_membre
function addViewMouvie($conn, $idMembre, $idFilm, $avis) {
    
    // requête SQL pour ajouter un avis sur un film
    $sql = "INSERT INTO tp_historique_membre (id_membre, id_film, avis, date ) VALUES (?, ?, ?, NOW())";
    
    
    if ($stmt = $conn->prepare($sql)) {

        // Lie les paramètres et exécutez la requête
        //https://www.php.net/manual/fr/pdostatement.bindparam.php
        $stmt->bindParam(2, $idFilm, PDO::PARAM_INT);
        $stmt->bindParam(1, $idMembre, PDO::PARAM_INT);//https://www.php.net/manual/fr/pdostatement.bindparam.php
        $stmt->bindParam(2, $idFilm, PDO::PARAM_INT);
        $stmt->bindParam(3, $avis, PDO::PARAM_STR);

        if ($stmt->execute()) {
            echo "Avis ajouté avec succès.";
        } else {
            echo "Erreur lors de l'ajout de l'avis : " . $stmt->errorInfo()[2];
        }
    
        
        // Fermeture de la déclaration préparée et la connexion à la base de données
        //$stmt->close();
    
    } else {
        die("Erreur de préparation de la requête : " . $conn->error);
    }
}

$idMembre = 1; // Remplacez par l'ID du membre qui ajoute l'avis
$idFilm = 123; // Remplacez par l'ID du film sur lequel l'avis est ajouté
$avis = "Très bon film !"; // Remplacez par l'avis

addViewMouvie($conn, $idMembre, $idFilm, $avis);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="script.js"></script>
    <title>Films</title>
</head>
<body>
    
    <div class="navbar">
        <a href="#">CINEMA&copy;</a>
              <a href="menu.php">Retour au menu</a>
      </div>
</div>
    <form method="get">
         <label for="genre">Rechercher par genre :</label>
            <input type="text" name="genre" placeholder="id_genre">
                <input type="submit" id='nom_film'value="Rechercher">
       
             <form method="get">
                 <label for="distributeur">Rechercher par distributeur :</label>
                    <input type="text" name="distributeur" placeholder="id_distributeur">
                        <input type="submit" id='nom_film'value="Rechercher">
                 
                 <form method="get">     
                    <label for="nom">Rechercher par nom :</label>
                       <input type="text" name="nom" placeholder="id_nom du film">
                          <input type="submit" id='nom_film'value="Rechercher">
             
                   
     </form>
     <ul>
        <?php
        
            // fonctions de recherche de films
            $filmsTrouves = rechercherFilms(
                $_GET['genre'] ?? null,
                $_GET['distributeur'] ?? null,
                $_GET['nom'] ?? null,
            );
            
            // Afficher les résultats
            if (count($filmsTrouves) > 0) {
                foreach ($filmsTrouves as $film) {
                    echo "<li style='color: #fff;'>ID : " . $film["id_film"] . ", Nom : " . $film["titre"] . ", Genre : " . $film["id_genre"] . ", Distributeur : " . $film["id_distrib"] . '</li>';
                }
            } else {
                echo "Aucun film trouvé.";
            }
        ?>
     </ul>

</body>
</html>
<style>
    
    a{
    text-decoration: none;
   color: white;
    }
    .navbar {
    background: black;
    
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
   
   
}
h1 {
    text-align: center;
}
form {
    width: 300px;
    margin: 0 auto;
    padding: 100px;
    
}
label {
    display: block;
    margin-top: 10px;
    color: white
   
}

input[type="text"] {
    width: 100%;
    padding: 5px;  
     
}

input[type="submit"] {
    margin-top: 10px;
    padding: 5px 10px;
    background-color: rgb(217, 14, 14);
    color: white;
    border: none;
    cursor: pointer;
}
p{
text-align: center;

}

input[type="submit"]:hover {
    background-color: #0069d9;
}
</style>
</body>
</html>


