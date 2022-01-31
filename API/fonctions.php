<?php

function getAll($connexion) {
    $sql = "SELECT * FROM seiju";
    $query = $connexion->prepare($sql);
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

function getById($connexion, $id) {
    $sql = "SELECT * FROM seiju WHERE id = :id";
    $query = $connexion->prepare($sql);
    $query->bindValue(":id", $id, PDO::PARAM_INT);
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

function insert($connexion, $id, $nom) {
    $sql = "INSERT INTO seiju (id,nom) VALUES (:id,:nom)";
    $query = $connexion->prepare($sql);
    $query->bindValue(":id", $id, PDO::PARAM_INT);
    $query->bindValue(":nom", $nom, PDO::PARAM_STR);
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

function update($connexion, $id, $nom) {
    $sql = "UPDATE seiju SET nom = :nom WHERE id = :id";
    $query = $connexion->prepare($sql);
    $query->bindValue(":nom", $nom, PDO::PARAM_STR);
    $query->bindValue(":id", $id, PDO::PARAM_INT);
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

function delete($connexion, $id) {
    $sql = "DELETE FROM seiju WHERE id = :id";
    $query = $connexion->prepare($sql);
    $query->bindValue(":id", $id, PDO::PARAM_INT);
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
}