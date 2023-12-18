<?php
include_once('connect.php');
//$conn = null;
session_start();
header("location:menu.php");

if(isset($_GET['deconnexion']))
{ 
if($_GET['deconnexion']==true)
{ 
session_unset();
header("location:../index.html");
}
}
else if($_SESSION['username'] !== ""){
$user = $_SESSION['username'];
// afficher un message
echo "<br>Bonjour $user, vous êtes connectés";
}
if(isset($_GET['erreur'])){
    $err = $_GET['erreur'];
    if($err==1 || $err==2)
    echo "<p style='color:red'>Utilisateur ou mot de passe incorrect</p>";
    }
?>

?>