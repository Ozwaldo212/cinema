<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="script.js"></script>
    <title>Menu</title>
</head>
<body>
    
      
    
    <div class="navbar">
        <a href="#">CINEMA &copy;</a>     
           <a href="historique.php">Historique des membres</a>
           <a href="formuadd.php">Gestions des membres</a>
           <a href="tpabo.php">Abonnement</a>
               <a href="tpfilm.php">Films</a>
           <a href="logout.php">Déconnexion</a>
         </div>
       </div>
      
      <div style="text-align:center;">
         <iframe width="1264" height="480" src="https://www.youtube.com/embed/CVr35bY8RWM" title="All Movie Studio Logo Intros" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
      </div>
   <style> 
    
    h1{
    text-align:center;
    position: absolute;
    top:50%;
    left:50%;
    transform: translate(-50%, -50%);
    white-space: nowrap;
    animation: marque 5s linear infinite;
    color:red;
    
  }
  @keyframes marquee {
    0%{
      transform: translateX(100%);
    }
    100%{
      transform: translateX(-100%);
    }
  }
    body{
      background-color: black;
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
    border: 5px solid rgb(217, 14, 14) ;
    margin-bottom: 20px;
  }
  #site-name {
    margin-right: auto;
  }
  .nav-right {
    display: flex;
    align-items: center;
  }
  img{
          margin-left: 250px;
        }
  

@keyframes slide {
  0%, 16% {
    opacity: 0;
  }
  20%, 80% {
    opacity: 1;
  }
  84%, 100% {
    opacity: 0;
  }
  
}
    <style>