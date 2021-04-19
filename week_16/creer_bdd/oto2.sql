DROP DATABASE oto;

CREATE DATABASE oto;

USE oto;

CREATE TABLE customer (
    id_customer int AUTO_INCREMENT NOT NULL,
    cus_surname varchar(50),
    cus_first_name varchar(50),
    cus_address varchar(255),
    id_options_accessories int,
    id_sales_rep int,
    PRIMARY KEY (id_customer),
    FOREIGN KEY (id_options_accessories) REFERENCES options_accessories(id_options_accessories),
    FOREIGN KEY (id_sales_rep) REFERENCES sales_rep(id_sales_rep)
);

CREATE TABLE options_accessories (
    id_options_accessories int AUTO_INCREMENT NOT NULL,
    opt_name varchar(50),
    opt_price decimal,
    id_customer int,
    id_vehicles int,
    PRIMARY KEY (id_options_accessories),
    FOREIGN KEY (id_customer) REFERENCES customer(id_customer),
    FOREIGN KEY (id_vehicles) REFERENCES vehicles(id_vehicles)
);

CREATE TABLE sales_rep (
    id_sales_rep int AUTO_INCREMENT NOT NULL,
    rep_surname varchar(50),
    rep_first_name varchar(50),
    rep_tel int,
    id_customer int,
    PRIMARY KEY (id_sales_rep),
    FOREIGN KEY (id_customer) REFERENCES customer(id_customer)
);

CREATE TABLE service_history (
    id_service_history int AUTO_INCREMENT NOT NULL,
    service_date date,
    garage_name varchar(50),
    last_mot_date date,
    mot_due_date date,
    number_of_owners int,
    id_vehicles int,
    PRIMARY KEY (id_service_history),
    FOREIGN KEY (id_vehicles) REFERENCES vehicles(id_vehicles)
);

CREATE TABLE pro_customer (
    id_pro_customer int AUTO_INCREMENT NOT NULL,
    company_name varchar(50),
    company_address varchar(255),
    company_tel int,
    id_customer int,
    PRIMARY KEY (id_pro_customer),
    FOREIGN KEY (id_customer) REFERENCES customer(id_customer)
);

CREATE TABLE vehicles (
    id_vehicles int AUTO_INCREMENT NOT NULL,
    veh_name varchar(50),
    veh_reg varchar(50),
    veh_make varchar(50),
    veh_col varchar(50),
    veh_pf int,
    veh_price varchar(50),
    veh_age int,
    id_customer int,
    id_service_history int,
    id_options_accessories int,
    PRIMARY KEY (id_vehicles),
    FOREIGN KEY (id_customer) REFERENCES customer(id_customer),
    FOREIGN KEY (id_service_history) REFERENCES service_history(id_service_history),
    FOREIGN KEY (id_options_accessories) REFERENCES options_accessories(id_options_accessories)
);

INSERT INTO customers
    (cus_surname, cus_first_name, cus_address, id_options_accessories, id_sales_rep)
VALUES 
    ('Houseman', 'Peter', '35 Naunton Lane',1 ,1),
    ('Cavel', 'Cathy', '2 rue du Moulin',2 ,2);

INSERT INTO options_accessories,
    (opt_name, opt_price, id_customer, id_vehicles)
VALUES 
    ('alloys', 200, 1, 1),
    ('sun-roof', 100, 2, 2);

INSERT INTO pro_customer,
    (company_name, company_address, company_tel, id_customer)
VALUES 
    ('Peter Industries', 'Uranus', 01242 256731, 1),
    ('Flowers R Us', 'Slack Pub, Cheltenham', 01242 793511, 2);

INSERT INTO sales_rep,
    (rep_surname, rep_first_name, rep_tel, id_customer)
VALUES 
    ('Diamond', 'Nick', 01242 456123, 1),
    ('Houseman', 'Sam', 01242 369852, 2);

INSERT INTO service_history,
    (service_date, garage_name, last_mot_date, mot_due_date, number_of_owners, id_vehicles)
VALUES 
    ('7th March', 'VBF','11th April 2018', 3, 1),
    ('8th March', 'Dodgy Garage', '12th April 2014', 9, 2);

INSERT INTO vehicles,
    (veh_name, veh_reg, veh_make, veh_col, veh_pf, veh_price, veh_age, id_customer, id_service_history, id_options_accessories)
VALUES 
    ('Mégane', 'qs-12345-fg', 'Renault', 'blue', 7, 23000, 3, 1, 1, 1),
    ('Octavia', 'ml-98741-mp', 'Skoda', 'black', 8, 30000, 4, 2, 2, 2);