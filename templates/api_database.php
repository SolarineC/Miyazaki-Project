<?php
// URL TO FILE TYPE
   //Fetch data from Api
   $data_films = file_get_contents("https://filrouge.uha4point0.fr/Miyasaki/films");
   
   //Modify json to array
   $array_films = json_decode($data_films, TRUE);
   array_pop($array_films);
   
   /*echo '<pre>';
   print_r($array_Genre);
   echo '</pre>';*/
?>

<?php
   $data_heros = file_get_contents("https://filrouge.uha4point0.fr/Miyasaki/heros");
   $array_heros = json_decode($data_heros, TRUE);
   /*echo '<pre>';
   print_r($array_heros);
   echo '</pre>';*/
?>

<?php
// URL TO PhpMyadmin TYPE
   try{
	   $bdd = new PDO('mysql:host=localhost;dbname=Miyazaki;charset=utf8', 'root', '');
   }
   catch (Exception $e){
      die('Erreur : ' . $e->getMessage());
   }


?>




<?php /*

A VOIR

SELECT 
   JSON_VALUE(@JSON,'$.agentID') AS agentID,
   JSON_VALUE(@JSON,'$.recordType') AS recordType,
   JSON_VALUE(@JSON,'$.recordReference.stationCode') AS stationCode,
   JSON_VALUE(@JSON,'$.recordReference.airlineCode') AS airlineCode,
   JSON_VALUE(@JSON,'$.recordReference.recordId') AS recordId,
   j.*
FROM OPENJSON(@JSON, '$.entries') WITH (
   bagType VARCHAR(10) '$.bag.bagType',
   bagSize VARCHAR(10) '$.bag.bagSize',
   category VARCHAR(10) '$.bag.category',
   seqNo VARCHAR(10) '$.seqNo',
   noOfBagsGiven VARCHAR(10) '$.noOfBagsGiven',
   dateBagsGiven VARCHAR(10) '$.dateBagsGiven'
) AS j
*/ ?>