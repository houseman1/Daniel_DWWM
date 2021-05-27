CREATE TABLE tasks(
   Id_tasks INT AUTO_INCREMENT NOT NULL,
   tas_name VARCHAR(50) NOT NULL,
   tas_date DATE NOT NULL,
   tas_description VARCHAR(255),
   tas_points INT NOT NULL,
   PRIMARY KEY(Id_tasks)
);

CREATE TABLE person(
   Id_person INT AUTO_INCREMENT NOT NULL,
   per_name VARCHAR(50) NOT NULL,
   per_age INT NOT NULL,
   PRIMARY KEY(Id_person)
);

CREATE TABLE paid(
   Id_tasks INT,
   Id_person INT,
   pai_scale INT,
   PRIMARY KEY(Id_tasks, Id_person),
   FOREIGN KEY(Id_tasks) REFERENCES tasks(Id_tasks),
   FOREIGN KEY(Id_person) REFERENCES person(Id_person)
);
