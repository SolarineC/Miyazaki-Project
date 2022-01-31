<?php 
include("login.php");

function getConnection($host, $username, $password) {
    try {
        $connexion = new PDO("mysql:host=".$host.";",$username,$password);
        $connexion->exec("set names utf8");
        return $connexion;
    } catch(PDOException $e) {
        echo $e;
        return false;
    }
}

function getConnectionDB($host, $db_name, $username, $password) {
    try {
        $connexion = new PDO("mysql:host=".$host.";dbname=".$db_name,$username,$password);
        $connexion->exec("set names utf8");
        return $connexion;
    } catch(PDOException $e) {
        echo $e;
        return false;
    }
}

// On se connecte au server de la DB
$connexion = getConnection($host, $username, $password);

// On récupère les infos de l'API Miyasaki
$api_heros = file_get_contents("https://filrouge.uha4point0.fr/Miyasaki/heros");
$api_heros = json_decode($api_heros, true);

$api_films = file_get_contents("https://filrouge.uha4point0.fr/Miyasaki/films");
$api_films = json_decode($api_films, true);

// Création de la structure de la DB
$sql = "-- Database
DROP DATABASE IF EXISTS miyazaki;
CREATE DATABASE miyazaki;
USE miyazaki;

-- Table
CREATE TABLE film (
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nom VARCHAR(255) NOT NULL,
    annee INT(4),
    note VARCHAR(255),
    image TEXT,
    trailer TEXT
) ENGINE=InnoDB CHARACTER SET utf8;

CREATE TABLE hero (
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nom VARCHAR(255) NOT NULL,
    description TEXT,
    role VARCHAR(255),
    film INT
) ENGINE=InnoDB CHARACTER SET utf8;

CREATE TABLE genre (
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nom VARCHAR(255) UNIQUE
) ENGINE=InnoDB CHARACTER SET utf8;

CREATE TABLE genre_film (
    id_genre INT,
    id_film INT
) ENGINE=InnoDB CHARACTER SET utf8;

CREATE TABLE seiju (
    id INT PRIMARY KEY NOT NULL,
    nom VARCHAR(255) NOT NULL
) ENGINE=InnoDB CHARACTER SET utf8;

-- Primary key
ALTER TABLE genre_film 
ADD PRIMARY KEY (id_genre, id_film);

-- Foreign key
ALTER TABLE hero
ADD FOREIGN KEY (film) REFERENCES film(id);

ALTER TABLE genre_film
ADD FOREIGN KEY (id_genre) REFERENCES genre(id);

ALTER TABLE genre_film
ADD FOREIGN KEY (id_film) REFERENCES film(id);

ALTER TABLE seiju 
ADD FOREIGN KEY (id) REFERENCES hero(id);";
$query = $connexion->prepare($sql);
$query->execute();

// On se connecte à la DB
$connexion = getConnectionDB($host, $db_name, $username, $password);

// On insert les données de l'API dans les tables de la BDD

// Films
foreach ($api_films as $film) {
    $sql = "INSERT IGNORE INTO film (nom,annee,note,image,trailer) VALUES (:nom,:annee,:note,:image,:trailer)";
    $query = $connexion->prepare($sql);
    $query->bindValue(":nom", htmlspecialchars(strip_tags($film["nom"])), PDO::PARAM_STR);
    $query->bindValue(":annee", htmlspecialchars(strip_tags($film["annee"])), PDO::PARAM_INT);
    $query->bindValue(":note", htmlspecialchars(strip_tags($film["note"])), PDO::PARAM_STR);
    $query->bindValue(":image", htmlspecialchars(strip_tags($film["image"])), PDO::PARAM_STR);
    $query->bindValue(":trailer", htmlspecialchars(strip_tags($film["trailer"])), PDO::PARAM_STR);
    $query->execute();
}

// Heros
foreach ($api_heros as $hero) {
    $sql = "INSERT IGNORE INTO hero (nom,description,role,film) VALUES (:nom,:description,:role,:film)";
    $query = $connexion->prepare($sql);
    $query->bindValue(":nom", htmlspecialchars(strip_tags($hero["nom"])), PDO::PARAM_STR);
    $query->bindValue(":description", htmlspecialchars(strip_tags($hero["description"])), PDO::PARAM_STR);
    $query->bindValue(":role", htmlspecialchars(strip_tags($hero["role"])), PDO::PARAM_STR);
    $query->bindValue(":film", htmlspecialchars(strip_tags($hero["film"])), PDO::PARAM_INT);
    $query->execute();
}

// Genre
foreach ($api_films as $film) {
    foreach ($film["Genre"] as $genre) {
        $sql = "INSERT IGNORE INTO genre (nom) VALUES (:nom)";
        $query = $connexion->prepare($sql);
        $query->bindValue(":nom", htmlspecialchars(strip_tags($genre)), PDO::PARAM_STR);
        $query->execute();
    }
}

// Genre_film
foreach ($api_films as $film) {
    foreach ($film["Genre"] as $genre) {
        $sql = "SELECT id FROM genre WHERE nom = :nom";
        $query = $connexion->prepare($sql);
        $query->bindValue(":nom", htmlspecialchars(strip_tags($genre)), PDO::PARAM_STR);
        $query->execute();
        $id_genre = $query->fetch(PDO::FETCH_ASSOC);

        $sql = "INSERT IGNORE INTO genre_film (id_genre,id_film) VALUES (:id_genre,:id_film)";
        $query = $connexion->prepare($sql);
        $query->bindValue(":id_genre", $id_genre["id"], PDO::PARAM_INT);
        $query->bindValue(":id_film", htmlspecialchars(strip_tags($film["id"])), PDO::PARAM_INT);
        $query->execute();
    }
}

// Seiju
$sql = "INSERT IGNORE INTO seiju (id,nom) VALUES 
(1,'Enzo'),
(2,'Larbi'),
(3,'Hicham'),
(4,'Kojo'),
(5,'Florent'),
(6,'Ophélie'),
(7,'Florian'),
(8,'Célia'),
(9,'Loïc');";
$query = $connexion->prepare($sql);
$query->execute();