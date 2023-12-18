<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="script.js"></script>
    <title>Abonnements</title>
</head>
<body>
    
    <div class="navbar">
        <a href="#">CINEMA&copy;</a>
              <a href="menu.php">Retour au menu</a>
      </div>
</div>
    <h1>Gestion des abonnements</h1>
        
    <p>Ajouter un abonnement</p>

    <div class="container">
    <form method="post" action="traitement_ajout_abonnement.php">
     <label for="nom_membre">Nom du membre :</label>
     <input type="text" name="nom_membre" id="nom_membre" required>
     <br>
     <label for="categorie">Catégorie de l'abonnement :</label>
     <input type="text" name="categorie" id="categorie" required>
      <br>
      <label for="duree">Durée de l'abonnement :</label>
      <input type="text" name="duree" id="duree" required>
      <br>
      <label for="montant">Montant de l'abonnement :</label>
      <input type="text" name="montant" id="montant" required>
       <br>
      <input type="submit" value="Ajouter Abonnement">
      </form>

        <p>Modifier un abonnement</p>
    <form method="post" action="traitement_modification_abonnement.php">
    <br>
    <label for="nom_membre">Nom du membre :</label>
    <input type="text" name="nom_membre" id="nom_membre" required>
    <br>
    <label for="categorie">Catégorie de l'abonnement :</label>
    <input type="text" name="categorie" id="categorie" required>
    <br>
    <label for="duree">Durée de l'abonnement :</label>
   <input type="text" name="duree" id="duree" required>
   <br>
   <label for="montant">Montant de l'abonnement :</label>
   <input type="text" name="montant" id="montant" required>
   <br>
   <input type="submit" value="Modifier Abonnement">
   </form>


    <p>Supprimer un abonnement</p>
    <form method="post" action="traitement_suppression_abonnement.php">
    <label for="nom">Nom du membre</label>
    <input type="text" name="nom" placeholder="nom">
    <br>
    <input type="submit" value="Supprimer Abonnement">
    </form>

      </div> 
      
      
    <?php
include_once('connect.php');

$nom = $_POST['nom'];
$resum = $_POST['resum'];
$prix = $_POST['prix'];
$durée = $_POST['durée'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Récupérez les données du formulaire
  $nom_membre = $_POST["nom_membre"];
  $categorie = $_POST["categorie"];
  $duree = $_POST["duree"];
  $montant = $_POST["montant"];
  
  $db = new PDO('mysql:host=localhost;dbname=cinema', 'root', '');

  // Prépare la requête SQL pour ajouter un abonnement dans la base de données
  $query = "INSERT INTO tp_abonnement (nom_membre, categorie, duree, montant) VALUES (:nom_membre, :categorie, :duree, :montant)";
  $stmt = $db->prepare($query);
  
  //Lie les paramètres et éxecute la requête
  //https://www.php.net/manual/fr/pdostatement.bindparam.php
  $stmt->bindParam(':nom_membre', $nom_membre);
  $stmt->bindParam(':categorie', $categorie);
  $stmt->bindParam(':duree', $duree);
  $stmt->bindParam(':montant', $montant);
  
  // Exécute la requête d'ajout
  $resultat = $stmt->execute();

  if ($resultat) {
      echo "Abonnement ajouté avec succès.";
  } else {
      echo "Une erreur s'est produite lors de l'ajout de l'abonnement.";
  }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Récupére l'ID de l'abonnement à modifier
  $id_abonnement = $_POST["nom"];
  
  // Récupére les données mises à jour du formulaire
  $nom_membre = $_POST["nom_membre"];
  $categorie = $_POST["categorie"];
  $duree = $_POST["duree"];
  $montant = $_POST["montant"];
  
   $db = new PDO('mysql:host=localhost;dbname=cinema', 'root', '');

  // Prépare la requête SQL pour mettre à jour un abonnement dans la base de données
  $query = "UPDATE tp_abonnement SET nom_membre = :nom_membre, categorie = :categorie, duree = :duree, montant = :montant WHERE id_abonnement = :id_abonnement";
  $stmt = $db->prepare($query);
  $stmt->bindParam(':nom', $nom, PDO::PARAM_INT);
  $stmt->bindParam(':nom_membre', $nom_membre);
  $stmt->bindParam(':categorie', $categorie);
  $stmt->bindParam(':duree', $duree);
  $stmt->bindParam(':montant', $montant);
  
  // Exécute la requête de modification
  $resultat = $stmt->execute();

  if ($resultat) {
      echo "Abonnement modifié avec succès.";
  } else {
      echo "Une erreur s'est produite lors de la modification de l'abonnement.";
  }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Récupére l'ID de l'abonnement à supprimer
  $id_abonnement = $_POST["id_abonnement"];
  
  $db = new PDO('mysql:host=localhost;dbname=cinema', 'root', '');

  // Prépare la requête SQL pour supprimer un abonnement de la base de données
  $query = "DELETE FROM tp_abonnement WHERE id_abonnement = :id_abonnement";
  $stmt = $db->prepare($query);
  $stmt->bindParam(':id_abonnement', $id_abonnement, PDO::PARAM_INT);
  
  // Exécute la requête de suppression
  $resultat = $stmt->execute();

  if ($resultat) {
      echo "Abonnement supprimé avec succès.";
  } else {
      echo "Une erreur s'est produite lors de la suppression de l'abonnement.";
  }
}
?>




 <style>
  body{
   
    font-family:arial, sans-serif;
    overflow:hidden;
  }
  p {
    text-align: center;
  }
  h1{
    text-align:center;
    font-size:15px;
    color: white;
  }
  form{
    text-align:center;
  }
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
  .search-icon,
  .dropdown-btn {
    cursor: pointer;
    margin-left: 10px;
  }
  input[type="texte"],
  input[type="nom"],
  input[type="prix"]
  input[type="durée"] {
  display: block;
  width: 100%;
  padding: 10px;
  margin-bottom: 5px;
  border: 1px solid #ccc;
  border-radius: 5px;
}
imput [type:"submit"]{
  display: block;
  width: 100%;
  padding: 10px;
  margin-bottom: 10px;
  border: 1px;
  color: rgb(217, 14, 14);
  border-radius: 5px;
}
</style> 

</body>
  </html>