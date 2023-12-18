<?php
// Fonction pour rechercher un membre par nom et prénom
function searchMember($nom, $prenom) {
    $db = new PDO('mysql:host=localhost;dbname=cinema', 'root', '');
    //renvoi non spécifié si la valeur de prenom est null
    $query = "SELECT *, IFNULL(prenom, 'Non spécifié') As prenom FROM tp_fiche_personne WHERE nom = :nom OR prenom = :prenom";
    $stmt = $db->prepare($query);
    //Lie les paramètres et exécute la requêtes
    //https://www.php.net/manual/fr/pdostatement.bindparam.php
    $stmt->bindParam(':nom', $nom); 
    $stmt->bindParam(':prenom', $prenom);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Fonction pour afficher les résultats
function afficherResultats($resultats) {
    if (empty($resultats)) {
        echo "Aucun résultat trouvé.";
    } else {
        foreach ($resultats as $resultat) {
            // Vérifie si la clé "nom" existe avant de l'afficher
            if (isset($resultat["nom"])) {
                echo "Nom: " . $resultat["nom"] . "<br>";
            } else {
                echo "Nom: Non spécifié<br>";
            }

            // Vérifie si la clé "prenom" existe avant de l'afficher
            if (isset($resultat["prenom"])) {
                echo "Prénom: " . $resultat["prenom"] . "<br>";
            } else {
                echo "Prénom: Non spécifié<br>";
            }

            
            echo "<br>"; // Séparation entre les résultats
        }
    }
}

// Vérifie si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    
    

    // Appelle la fonction de recherche
    $resultats = searchMember($nom, $prenom);
    
    // Appelle la fonction pour afficher les résultats
    afficherResultats($resultats);
}

// Fonction pour afficher l'historique de connexion par ID membre
function getHistoriqueConnexionById($id_member) {
    
    $db = new PDO('mysql:host=localhost;dbname=cinema', 'root', '');

    // Prépare la requête SQL pour récupérer l'historique de connexion en fonction de l'ID du membre.
    $query = "SELECT * FROM tp_historique_membre WHERE id_member = :id_member";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':id_member', $id_member, PDO::PARAM_INT);
    $stmt->execute();

    // Récupére les résultats en tableau associatif.
    $resultats = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (!empty($resultats)) {
        // Affiche les résultats de l'historique de connexion.
        foreach ($resultats as $connexion) {
            echo "Date de connexion : " . $connexion["date_connexion"] . "<br>";
            echo "Adresse IP : " . $connexion["adresse_ip"] . "<br>";
            // Ajoute d'autres champs d'historique ici si nécessaire.
            echo "<hr>";
        }
    } else {
        echo "Aucun résultat trouvé pour cet ID de membre.";
    }
}

// Vérifie si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérez l'ID du membre à partir du formulaire
    $id_member = $_POST["id_member"];
    
    // Appel de la fonction pour afficher l'historique de connexion par ID
    getHistoriqueConnexionById($id_member);
}

// Fonction pour ajouter un avis sur un film par ID membre et ID film
function ajouterAvisSurFilm($id_member, $id_film, $avis) {
    // Assurez-vous de remplacer 'localhost', 'root', '', 'nom_de_votre_base' par vos propres informations de connexion.
    $db = new PDO('mysql:host=localhost;dbname=cinema', 'root', '');

    // Prépare la requête SQL pour insérer l'avis dans la table des avis
    $query = "INSERT INTO tp_historique_membre (id_member, id_film, avis) VALUES (:id_member, :id_film, :avis)";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':id_member', $id_member, PDO::PARAM_INT);
    $stmt->bindParam(':id_film', $id_film, PDO::PARAM_INT);
    $stmt->bindParam(':avis', $avis);
    
    // Exécutez la requête d'insertion
    $resultat = $stmt->execute();

    return $resultat;
}

?>


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
        <a href="">Historique des membres</a>

        <div class="align-right">
        <a href="menu.php">Retour au menu</a>
      </div>
    </div>


    <div class="container">
       
   
    <h2>Recherche de membre par nom et prénom</h2>
        <form method="post">
            <label for="nom">Nom :</label>
                <input type="text" name="nom" id="nom">
                    <br>
                       <label for="prenom">Prénom :</label>
                           <input type="text" name="prenom" id="prenom">
                                <br>
                                    <input type="submit" value="Rechercher">
                                 </form>
    
    
    <h2>Historique de connexion d'un membre</h2>
         <form method="post">
            <label for="id_member"></label>
                <input type="text" name="id_member" placeholder="id_member">
                   <br>
                     <input type="submit" value="Rechercher Historique">
                </form>


                <h2>Ajouter un avis sur un film</h2>
    <form method="post" action="traitement_ajout_avis.php">
        <label for="id_member"></label>
             <input type="text" name="id_member" placeholder="id_member">
               <br>
                 <label for="id_film"></label>
                    <input type="text" name="id_film" placeholder="id_film">
                       <br>
                         <label for="avis">Rédiger un avis</label><br>
                             <textarea name="avis" placeholder="avis" rows="4"></textarea>
                                <br>
                                  <input type="submit" value="Ajouter Avis">
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