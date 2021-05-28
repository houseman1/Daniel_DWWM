DROP DATABASE pocket_money;

CREATE DATABASE pocket_money;

USE pocket_money;

CREATE TABLE tasks(
   Id_tasks INT AUTO_INCREMENT NOT NULL,
   tas_name VARCHAR(50) NOT NULL,
   tas_description VARCHAR(255),
   tas_points INT NOT NULL,
   PRIMARY KEY(Id_tasks)
);

INSERT INTO tasks
        (tas_name, tas_description, tas_points)
    VALUES ('recycling bin', 'empty the kitchen recycling bin when full', 1),
           ('washing up', 'wash up or dry up', 1);

CREATE TABLE person(
   Id_person INT AUTO_INCREMENT NOT NULL,
   per_name VARCHAR(50) NOT NULL,
   per_age INT NOT NULL,
   PRIMARY KEY(Id_person)
);

INSERT INTO person
        (per_name, per_age)
    VALUES ('Peter', 12),
           ('Sam', 8);

CREATE TABLE ligne_task(
   Id_tasks INT,
   Id_person INT,
   pai_scale INT,
   date_done DATE,
   voluntary BOOLEAN,
   PRIMARY KEY(Id_tasks, Id_person),
   FOREIGN KEY(Id_tasks) REFERENCES tasks(Id_tasks),
   FOREIGN KEY(Id_person) REFERENCES person(Id_person)
);


