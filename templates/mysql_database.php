
   <?php
   //Comments concerning Mysql Database
   //$connect;$nom_films
      

      //$Genre = $array_Genre[$i]['Genre'];
      
      /*
      for ($g=0; $g < count($array_films['Genre']); $g++) { 
         $Genre=$array_films['Genre'][$g]['Genre'];
      }*/

      /*$sql = "INSERT INTO films(nom, annee, note, Genre, image, trailer) VALUE ('$nom','$annee','$note','$Genre','$image','$trailer')";
      */
      //return 5;
   

   /*for ($i=0; $i < count($array_Genre); $i++) {
      $aventure = $array_Genre[$i]['aventure'];
      $annee = $array_films[$i]['annee'];
      $note = $array_films[$i]['note'];
      $image = $array_films[$i]['image'];
      $trailer = $array_films[$i]['trailer'];

      /*$sql = "INSERT INTO films(nom, annee, note, Genre, image, trailer) VALUE ('$nom','$annee','$note','$Genre','$image','$trailer')";
   };*/
      
   for ($i=0; $i < count($array_heros); $i++) {
      $nom_heros = $array_heros[$i]['nom'];
      $film = $array_heros[$i]['film'];
      $description = $array_heros[$i]['description'];
      $role = $array_heros[$i]['role'];

      /*$sql = "INSERT INTO heros(nom, film, description, role) VALUE ('$nom','$film','$description','$role')";*/
   };
   
   ?>