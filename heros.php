<?php include('templates/api_database.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Miyazaki's People</title>
   <link rel="stylesheet" href="./style.css">
</head>
<body id="heros">>
   
   <section id="first-people">       
         <div class="box1-people"></div>        
         <h2><span>Mi</span>yazaki's <span>Pe</span>ople</h2>
         <a href="index.php"><img class="arrow arrow-back" src="images/arrow-right.png" alt=""></a>
   </section>
   
   <section class="section-card">
      <?php         
         for ($i=0; $i < count($array_heros); $i++){
            $nom_heros = $array_heros[$i]['nom'];
            $film = $array_heros[$i]['film'];
            $description = $array_heros[$i]['description'];
            $roles = $array_heros[$i]['role'];
            $image = $array_heros[$i]['trailer'];
      ?>
      <section id="second-people" class="slidershow">
         <div class="slides">
            <input type="radio" name="r" id="r1" checked>
            <input type="radio" name="r" id="r2" checked>
            <input type="radio" name="r" id="r3" checked>
            <div class="slide s1">   
               <div class="card-people">
                  <div class="content-people">
                     <h2><?php echo htmlspecialchars($nom_heros); ?></h2>
                     <p>"<?php echo htmlspecialchars($description); ?>"</p>
                     <p>Rôle: <?php echo htmlspecialchars($roles); ?></p>
                     <a href="https://fr.wikipedia.org/wiki/Le_Ch%C3%A2teau_ambulant#Calcifer">Read More</a>
                  </div>
                  <img class="image-people" src="<?php echo htmlspecialchars($image); ?>" alt="">
               </div>
            </div> 
            <div class="slide s2">
               <div class="card-people">
                  <div class="content-people">                            <h2>Jenkins Pendragon</h2>
                     <p>"Possède le chateau ambulant".</p>
                     <p>Rôle: Sorcier</p>
                     <a href="https://fr.wikipedia.org/wiki/Le_Ch%C3%A2teau_ambulant#Hauru">Read More</a>
                  </div>                
                  <img class="image-people" src="/images/Jenkins Pendragon.png" alt="">
               </div>
            </div>
            <div class="slide s3">
               <div class="card-people">
                  <div class="content-people">                            <h2>Sophie Hatter</h2>
                     <p>"Innocente jeune fille qui se fait transformer par la sorcière"</p>
                     <p>Rôle: Héroine</p>
                     <a href="https://fr.wikipedia.org/wiki/Le_Ch%C3%A2teau_ambulant#Sophie">Read More</a>
                  </div>
                  <img class="image-people" src="/images/Sophie Hatter.png" alt="">
               </div>
            </div>
         </div>
         <div class="navigation">
            <label for="r1" class="bar"></label>
            <label for="r2" class="bar"></label>
            <label for="r3" class="bar"></label>
         </div>
      <?php } ?>
      </section>
   </section>
</body>
</html>