<?php
// Debug.
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//END Debug.
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cinema";

$sql ="SELECT * FROM tp_genre";
try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $stmt = $conn->query($sql);
  if($stmt === false){
    die("Erreur");
  }
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

?>

