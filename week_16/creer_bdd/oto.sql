CREATE DATABASE oto;

USE oto;

CREATE TABLE customer (
    id_customer int AUTO_INCREMENT NOT NULL,
    cus_surname varchar(50),
    cus_first_name varchar(50),
    cus_address varchar(255),
    PRIMARY KEY (id_customer)
);

CREATE TABLE options_accessories (
    id_options_accessories int AUTO_INCREMENT NOT NULL,
    opt_name varchar(50),
    opt_price decimal,
    PRIMARY KEY (id_options_accessories),
);

CREATE TABLE sales_rep (
    id_sales_rep int AUTO_INCREMENT NOT NULL,
    rep_surname varchar(50),
    rep_first_name varchar(50),
    rep_tel int,
    PRIMARY KEY (id_sales_rep)
);

CREATE TABLE service_history (
    id_service_history int AUTO_INCREMENT NOT NULL,
    service_date date,
    garage_name varchar(50),
    last_mot_date date,
    mot_due_date date,
    number_of_owners int,
    PRIMARY KEY (id_service_history)
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
    PRIMARY KEY (id_vehicles),
    FOREIGN KEY (id_customer) REFERENCES customer(id_customer)
);

CREATE TABLE choose (
    id_customer int AUTO_INCREMENT NOT NULL,
    id_options_accessories int,
    PRIMARY KEY (id_customer, id_options_accessories),
    FOREIGN KEY (id_customer) REFERENCES customer(id_customer),
    FOREIGN KEY (id_options_accessories) REFERENCES options_accessories(id_options_accessories)
);

CREATE TABLE fitted (
    id_vehicles int AUTO_INCREMENT NOT NULL,
    id_options_accessories int,
    PRIMARY KEY (id_vehicles, id_options_accessories),
    FOREIGN KEY (id_vehicles) REFERENCES vehicles(id_vehicles),
    FOREIGN KEY (id_options_accessories) REFERENCES options_accessories(id_options_accessories)
);

CREATE TABLE associated (
    id_vehicles int AUTO_INCREMENT NOT NULL,
    id_service_history int,
    PRIMARY KEY (id_vehicles, id_service_history),
    FOREIGN KEY (id_vehicles) REFERENCES vehicles(id_vehicles),
    FOREIGN KEY (id_service_history) REFERENCES service_history(id_service_history)
);

CREATE TABLE assigned (
    id_customer int AUTO_INCREMENT NOT NULL,
    id_sales_rep int,
    PRIMARY KEY (id_customer, id_sales_rep),
    FOREIGN KEY (id_customer) REFERENCES customer(id_customer),
    FOREIGN KEY (id_sales_rep) REFERENCES sales_rep(id_sales_rep)
);