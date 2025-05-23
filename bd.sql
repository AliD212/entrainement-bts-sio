CREATE DATABASE bd;
USE bd;



CREATE TABLE user
(
    id INT PRIMARY KEY NOT NULL,
    nom VARCHAR(100),
    email VARCHAR(100)
);

INSERT INTO user (id, nom, email) VALUES (1, 'ali', 'ali@ali');