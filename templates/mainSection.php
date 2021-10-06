   <?php include('api_database.php'); ?>

   <section id="second">
      <?php
         
         for ($i=0; $i < count($array_films); $i++){
            $nom_films = $array_films[$i]['nom'];
            $annee = $array_films[$i]['annee'];
            $note = $array_films[$i]['note'];
            $image = $array_films[$i]['image'];
            $trailer = $array_films[$i]['trailer'];
            $array_Genre = $array_films[$i]['Genre'];
            $Genre = implode(', ', $array_Genre);
      ?>
      
      
         <div class="card">
            <div class="box2" id="b1" style="background: url(<?php echo htmlspecialchars($image); ?>" >
               <div class="content">
                  <a href=<?php echo htmlspecialchars($trailer); ?>><h3><?php echo htmlspecialchars($nom_films); ?></h3></a>
                  <p>Genre:</br><?php echo htmlspecialchars($Genre); ?></p>
                  <p>Année: <?php echo htmlspecialchars($annee); ?></p>
                  <p><?php echo htmlspecialchars($note); ?></p>
                  <a href=<?php echo htmlspecialchars($trailer); ?>>Bande-annonce</a>
               </div>
            </div>
         </div>
         
      <?php } ?>
   </section>

</body>
</html>