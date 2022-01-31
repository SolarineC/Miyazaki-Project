<?php
require("../BDD/connectDB.php");
require("./fonctions.php");

header("Acess-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Acess-Control-Allow-Methods: GET");
header("Acess-Control-Max-Age: 3600");
header("Acess-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET["id"]) && !empty($_GET["id"])) {
        $id = $_GET["id"];
        $seiju = getById($connexion, $id);
        $seiju = json_encode($seiju);
        echo $seiju;
    } else {
        $seijus = getAll($connexion);
        $seijus = json_encode($seijus);
        echo $seijus;
    }
} else if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $body = json_decode(file_get_contents("php://input"));
    if (!empty($body->nom) && isset($_GET["id"]) && !empty($_GET["id"])) {
        $id = htmlspecialchars(strip_tags($_GET["id"]));
        $nom = htmlspecialchars(strip_tags($body->nom));
        insert($connexion, $id, $nom);
        echo json_encode(["Message" => "Insertion effectuée"]);
    } else {
        echo json_encode(["Error" => "Manque une donnée"]);
    }
} else if ($_SERVER["REQUEST_METHOD"] == "PUT") {
    $body = json_decode(file_get_contents("php://input"));
    if (!empty($body->nom) && isset($_GET["id"]) && !empty($_GET["id"])) {
        $id = htmlspecialchars(strip_tags($_GET["id"]));
        $nom = htmlspecialchars(strip_tags($body->nom));
        update($connexion, $id, $nom);
        echo json_encode(["Message" => "Modification effectuée"]);
    } else {
        echo json_encode(["Error" => "Manque une donnée"]);
    }
} else if ($_SERVER["REQUEST_METHOD"] == "DELETE") {
    if (isset($_GET["id"]) && !empty($_GET["id"])) {
        $id = htmlspecialchars(strip_tags($_GET["id"]));
        delete($connexion, $id);
        echo json_encode(["Message" => "Suppression effectuée"]);
    } else {
        echo json_encode(["Error" => "Manque une donnée"]);
    }
} else {
    echo json_encode(["Error" => "Methode non-authorisée"]);
}