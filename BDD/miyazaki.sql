-- Database
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