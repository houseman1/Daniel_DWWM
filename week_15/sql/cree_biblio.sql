CREATE DATABASE biblio;

USE biblio;

CREATE TABLE livre(
   isbn CHAR(13),
   titre VARCHAR(255) NOT NULL,
   PRIMARY KEY(isbn)
);

CREATE TABLE auteur(
   id_auteur INT,
   nom VARCHAR(255) NOT NULL,
   prenom VARCHAR(255),
   PRIMARY KEY(id_auteur)
);

CREATE TABLE ecrire(
   isbn CHAR(13),
   id_auteur INT,
   PRIMARY KEY(isbn, id_auteur),
   FOREIGN KEY(isbn) REFERENCES livre(isbn),
   FOREIGN KEY(id_auteur) REFERENCES auteur(id_auteur)
);
