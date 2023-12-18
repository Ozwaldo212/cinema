<?php
require('config/connect.php');
  while($terme_trouve = $select_terme->fetch())
  {
   echo "<div><h2>".$terme_trouve['titre']."</h2><p> ".$terme_trouve['contenu']."</p>";
  }
  $select_terme->closeCursor();
 
try
{
 $bdd = new PDO("mysql:host=localhost;dbname=bdr", "root", "");
   $bdd ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(Exception $e)
{
  die("Une érreur a été trouvé : " . $e->getMessage());
}
$bdd->query("SET NAMES UTF8");

if (isset($_GET["s"]) AND $_GET["s"] == "Rechercher")
{
 $_GET["terme"] = htmlspecialchars($_GET["terme"]); //pour sécuriser le formulaire contre les intrusions html
   $terme = $_GET["terme"];
     $terme = trim($terme); //pour supprimer les espaces dans la requête de l'internaute
       $terme = strip_tags($terme); //pour supprimer les balises html dans la requête


 if (isset($terme))
 {
  $terme = strtolower($terme);
    $select_terme = $bdd->prepare("SELECT titre, contenu FROM articles WHERE titre LIKE ? OR contenu LIKE ?");
      $select_terme->execute(array("%".$terme."%", "%".$terme."%"));
 }
 else
 {
  $message = "Vous devez entrer votre requete dans la barre de recherche";
 }
}

// Vérification si le formulaire a été soumis (film)
if(isset($_POST['rechercher'])) {
    // Récupération des valeurs du formulaire
    $distributeur = $_POST['distributeur'];
    $nom = $_POST['nom'];

    // Connexion à votre base de données MySQL
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "cinema";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Échec de la connexion à la base de données : " . $conn->connect_error);
    }

    // Construction de la requête SQL
    $sql = "SELECT * FROM films WHERE distributeur LIKE '%$distributeur%' AND nom LIKE '%$nom%'";

    // Exécution de la requête SQL
    $result = $conn->query($sql);

    // Affichage des résultats
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "Film : " . $row['nom'] . "<br>";
        }
    } else {
      echo "Aucun film trouvé.";
    }

    // Fermeture de la connexion à la base de données
    $conn->close();
}

?>