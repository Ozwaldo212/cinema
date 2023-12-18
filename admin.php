<?php

//<!-- tester si l'utilisateur est connecté -->
include_once('connect.php');
$conn = null;
session_start();

$user = 'Moufid';
$username = 'Moufid';
// afficher un message
echo "<br>Bonjour $user, vous êtes connectés";

if(isset($_GET['erreur'])){
    $err = $_GET['erreur'];
    if($err==1 || $err==2)
    echo "<p style='color:red'>Utilisateur ou mot de passe incorrect</p>";
    }
    if (isset($user['username'])) {
      // Accédez à la clé "username" ici
      $valeurUsername = $user['username'];
      // Le reste de votre code ici
  } else {
      // Gérez le cas où "username" n'est pas défini, si nécessaire
      echo "La clé 'username' n'est pas définie.";
  }
  ?>

<DOCTYPE!html>
 <head>
 <meta charset="utf-8">
 <!-- importer le fichier de style -->
 </head>
 <body>


 <div class="navbar">
        <a href="#">CINEMA &copy;</a>
            <div class="align-right">
          <a href="./../index.html">Retour à l'acceuil</a>
      </div>
    </div>

 <div id="container">
 <!-- zone de connexion -->
 
 <form action="verification.php" method="POST">
 <h1>Connexion</h1>
 
 <label><b>Identifiant</b></label>
 <input type="text" placeholder="Entrer le nom d'utilisateur" name="username" required>

 <label><b>Mot de passe</b></label>
 <input type="password" placeholder="Entrer le mot de passe" name="password" required>

 <input type="submit" id='submit' value='LOGIN' >
 <div id="content">
 
 </div>
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
    border: 5px solid red;
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
  
body{
 background: black;
}
#container{
 width:400px;
 margin:0 auto;
 margin-top:10%;
}
/* Bordered form */
form {
 width:100%;
 padding: 30px;
 border: 1px solid #f1f1f1;
 background: #fff;
 box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
}
#container h1{
 width: 38%;
 margin: 0 auto;
 padding-bottom: 10px;
}

/* Full-width inputs */
input[type=text], input[type=password] {
 width: 100%;
 padding: 12px 20px;
 margin: 8px 0;
 display: inline-block;
 border: 1px solid #ccc; 
 border-color: red;
 box-sizing: border-box;
}

/* Set a style for all buttons */
input[type=submit] {
 background-color: red;
 color: white;
 padding: 14px 20px;
 margin: 8px 0;
 border: none;
 cursor: pointer;
 width: 100%;
}
input[type=submit]:hover {
 background-color: black;
 color: red;
 border: 1px solid red;
}
input[type=register]:hover {
 background-color: black;
 color: #53af57;
 border: 1px solid #53af57;
}

</style>

</body>
</html>
