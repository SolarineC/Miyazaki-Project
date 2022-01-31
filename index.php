<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="initial-scale=1.0">
   <link rel="stylesheet" href="./style.css">
   <title>Miyazaki's World</title>
</head>

<?php 
require("./BDD/connectDB.php"); 

$sql = "SELECT * FROM film";
$query = $connexion->prepare($sql);
$query->execute();
$films = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<body id="index">
   <section id="first">
      <h2><span>Mi</span>yazaki's <span>Wo</span>rld</h2>         
      <div class="box1"></div>
      <div class="loader">
         <span style="--i:0;"></span>
         <span style="--i:1;"></span>
         <span style="--i:2;"></span>
         <span style="--i:3;"></span>
         <a href="heros.php?page=1"><img class="arrow" src="images/arrow-left.png" alt=""></a>
      </div>
   </section>
   <section id="second">
      <?php 
      foreach ($films as $film) { 
         $sql = "SELECT genre.nom FROM genre INNER JOIN genre_film ON genre_film.id_genre = genre.id INNER JOIN film ON genre_film.id_film = film.id WHERE film.id = :id_film";
         $query = $connexion->prepare($sql);
         $query->bindValue(":id_film", $film["id"]);
         $query->execute();
         $genres = $query->fetchAll(PDO::FETCH_ASSOC);        
         ?>
         <div class="card">
            <div class="box2" id="b1" style="background: url(<?php echo htmlspecialchars($film["image"]); ?>" >
               <div class="content">
                  <a href=<?php echo htmlspecialchars($film["image"]); ?>><h3><?php echo htmlspecialchars($film["nom"]); ?></h3></a>
                  <p>Genre:</br>
                  <?php 
                  foreach($genres as $genre) {
                     echo $genre["nom"]."<br>";
                  } 
                  ?>
                  </p>
                  <p>Année: <?php echo htmlspecialchars($film["annee"]); ?></p>
                  <p><?php echo htmlspecialchars($film["note"]); ?></p>
                  <a href=<?php echo htmlspecialchars($film["trailer"]); ?>>Bande-annonce</a>
                  <a href="heros.php?film=<?php echo $film["id"] ?>">Voir les Héros</a>
               </div>
            </div>
         </div>
      <?php } ?>
   </section>

</body>
</html>