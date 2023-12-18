<?php
include_once('connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérez les données du formulaire
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $date_naissance = $_POST["date_naissance"];
    $email = $_POST["email"];
    $adresse = $_POST["adresse"];
    $cpostal = $_POST["cpostal"];
    $ville = $_POST["ville"];
    $pays = $_POST["pays"];
}
    // informations de connexion.
    $db = new PDO('mysql:host=localhost;dbname=cinema', 'root', '');
    
    function addMember($nom, $prenom, $date_naissance, $email, $adresse, $cpostal, $ville, $pays) {
        // Assurez-vous de remplacer 'localhost', 'root', '', 'nom_de_votre_base' par vos propres informations de connexion.
        $db = new PDO('mysql:host=localhost;dbname=cinema', 'root', '');
    
        try {
            // Démarrage de la transaction
            $db->beginTransaction();
    
            // Requête SQL pour ajouter un membre dans la base de données
            $query = "INSERT IGNORE INTO `tp_fiche_personne` (`nom`, `prenom`, `date_naissance`, `email`, `adresse`, `cpostal`, `ville`, `pays`) VALUES (:nom, :prenom, :date_naissance, :email, :adresse, :cpostal, :ville, :pays)";
            $stmt = $db->prepare($query);
            // Liez les paramètres
            $stmt->bindParam(':nom', $nom);
            $stmt->bindParam(':prenom', $prenom);
            $stmt->bindParam(':date_naissance', $date_naissance);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':adresse', $adresse);
            $stmt->bindParam(':cpostal', $cpostal);
            $stmt->bindParam(':ville', $ville);
            $stmt->bindParam(':pays', $pays);
    
            // Exécution de la requête d'ajout
            $resultat = $stmt->execute();
    
            if ($resultat) {
                // Valide les modifications de la transaction
                $db->commit();
                echo "Membre ajouté avec succès.";
            } else {
                // En cas d'erreur, annulez la transaction
                $db->rollBack();
                echo "Une erreur s'est produite lors de l'ajout du membre.<br> <a href='formuadd.php'>Retour au formulaire</a>";
            }
        } catch (PDOException $e) {
            // En cas d'erreur, annulez la transaction
            $db->rollBack();
            echo "Erreur : " . $e->getMessage();
        }
    }
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Récupérez les données du formulaire
            $nom = $_POST["nom"];
            $prenom = $_POST["prenom"];
            $date_naissance = $_POST["date_naissance"];
            $email = $_POST["email"];
            $adresse = $_POST["adresse"];
            $cpostal = $_POST["cpostal"];
            $ville = $_POST["ville"];
            $pays = $_POST["pays"];
            
            // Appel de la fonction pour ajouter un membre
            addMember($nom, $prenom, $date_naissance, $email, $adresse, $cpostal, $ville, $pays);
        }
        ?>

