<?php

    //Connect to database
    $connect = mysqli_connect("localhost", "larbi", "Sol", "API Film");
    
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

    echo "<pre>";
    print_r($films);
    echo "</pre>";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="templates/style.css">
</head>
<body>

    <?php include('templates/header.php') ?>


    <?php include('templates/mainSection.php') ?>

</body>
</html>