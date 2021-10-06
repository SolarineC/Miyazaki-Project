<?php
   
   //Connect to database
   $connect = mysqli_connect("localhost", "root", "", "Miyazaki");
   
    //check connection
   if (!$connect) {
      echo "Connection error: " . mysqli_connect_error();
   }

   //write query
   $sql = "SELECT * FROM films";

   //make querySol
   $result = mysqli_query($connect, $sql);

   //fetch result as an array
   $films = mysqli_fetch_all($result, MYSQLI_ASSOC);

   //free result from memory
   mysqli_free_result($result);

   //close connection
   mysqli_close($connect);

?>