CREATE TABLE client (
    id_client int AUTO_INCREMENT NOT NULL,
    nom_client varchar(50),
    prenom_client varchar(50),
    adresse_client varchar(100),
    PRIMARY KEY (id_client),
);

CREATE TABLE vehicules (
    id_vehicule int AUTO_INCREMENT NOT NULL,
    id_client int,
    PRIMARY KEY (id_vehicule)
    FOREIGN KEY (id_client) REFERENCES client(id_client)
);

CREATE TABLE commerciaux (
    id_commerciaux int AUTO_INCREMENT NOT NULL,
    id_client int,
    PRIMARY KEY (id_commerciaux),
    FOREIGN KEY (id_client) REFERENCES client(id_client)
<<<<<<< HEAD
);
=======
);
>>>>>>> 9774b3d1a1c2e42ab9fb41e58992903d2108cc69
