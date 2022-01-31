<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Miyazaki's People</title>
   <link rel="stylesheet" href="./style.css">
   <script src="./script.js"></script>
</head>

<?php 
require("./BDD/connectDB.php");

if (isset($_GET["film"]) && !empty($_GET["film"])){
   // On récupère les héros du film
   $sql = "SELECT * FROM hero WHERE film = ".$_GET["film"];
} else if (isset($_GET["page"]) && !empty($_GET["page"])) {
   // On récupère les héros paginés
   $limit = 5;
   $page = ($_GET["page"] * $limit) - $limit;
   $currentPage = $_GET["page"];
   $sql = "SELECT COUNT(*) as nb_hero FROM hero";
   $query = $connexion->prepare($sql);
   $query->execute();
   $nb_heros = $query->fetch(PDO::FETCH_ASSOC);
   $nb_heros = $nb_heros["nb_hero"];
   $nb_page = ceil($nb_heros / $limit);
   $sql = "SELECT * FROM hero LIMIT ".$page.",".$limit;
} else {
   // On récupère tous les héros
   $sql = "SELECT * FROM hero";
}
$query = $connexion->prepare($sql);
$query->execute();
$heros = $query->fetchAll(PDO::FETCH_ASSOC);

?>

<body id="heros">
   <section id="first-people" style="height: auto;">       
      <div class="box1-people"></div>        
      <h2><span>Mi</span>yazaki's <span>Pe</span>ople</h2>
      <a href="index.php"><img class="arrow arrow-back" src="images/arrow-right.png" alt=""></a>
   </section>

   <section>
      <?php 
      if (count($heros) == 0){
         echo "<h2>Aucun Héro pour ce film !</h2>";
      }
      foreach ($heros as $hero) { 
         echo "<script>getSeiju(".$hero["id"].")</script>";
      ?>
         <div>
            <ul>
               <li>Nom : <?= $hero["nom"] ?></li>
               <li>Description : <?= $hero["description"] ?></li>
               <li>Rôle : <?= $hero["role"] ?></li>
               <li id="seiju<?= $hero["id"] ?>">Seiju : </li>
            </ul>
         </div>
      <?php } ?>
   </section>  

   <?php if (isset($_GET["page"]) && !empty($_GET["page"])){ ?>
   <section>
      <?php 
      for ($i=1; $i <= $nb_page; $i++){ ?>
         <a href="./heros.php?page=<?= $i ?>"><?= $i ?></a>
      <?php } ?>
   </section>
   <?php } ?>
</body>
</html>