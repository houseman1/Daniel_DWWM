DROP DATABASE oto;

CREATE DATABASE oto;

USE oto;

CREATE TABLE vehicles (
    id_vehicles int AUTO_INCREMENT NOT NULL,
    veh_name varchar(50),
    veh_registration varchar(50),
    veh_make varchar(50),
    veh_colour varchar(50),
    veh_pf int,
    veh_age int,
    veh_num_owners int,
    veh_last_mot_date date,
    veh_mot_due_date date,
    veh_price decimal,
    PRIMARY KEY (id_vehicles)
);

CREATE TABLE customer (
    id_customer int AUTO_INCREMENT NOT NULL,
    cus_surname varchar(50),
    cus_first_name varchar(50),
    cus_address varchar(255),
    cus_tel int,
    cus_company_name varchar(50),
    cus_company_address varchar(255),
    cus_company_tel int,
    PRIMARY KEY (id_customer)
);

CREATE TABLE options_accessories (
    id_opt_acc int AUTO_INCREMENT NOT NULL,
    opt_name varchar(50),
    opt_price decimal,
    PRIMARY KEY (id_opt_acc)
);

CREATE TABLE sales_rep (
    id_sales_rep int AUTO_INCREMENT NOT NULL,
    rep_surname varchar(50),
    rep_first_name varchar(50),
    rep_tel int,
    PRIMARY KEY (id_sales_rep)
);

CREATE TABLE orders (
    id_orders int AUTO_INCREMENT NOT NULL,
    order_date date,
    order_payment_date date,
    order_ship_date date,
    id_customer int,
    PRIMARY KEY (id_orders),
    FOREIGN KEY (id_customer) REFERENCES customer(id_customer)
);

CREATE TABLE order_details (
    id_orders int AUTO_INCREMENT NOT NULL,
    id_vehicles int,
    ord_vehicle_quantity int,
    ord_option_quantity int,
    ord_service_quantity int,
    ord_discount decimal,
    ord_total_payable decimal,
    PRIMARY KEY (id_orders, id_vehicles),
    FOREIGN KEY (id_orders) REFERENCES orders(id_orders),
    FOREIGN KEY (id_vehicles) REFERENCES vehicles(id_vehicles)
);

CREATE TABLE services (
    id_service_history int AUTO_INCREMENT NOT NULL,
    ser_service_date date,
    ser_price decimal,
    id_orders int,
    id_vehicles int,
    PRIMARY KEY (id_service_history),
    FOREIGN KEY (id_orders, id_vehicles) REFERENCES order_details(id_orders, id_vehicles)
);

CREATE TABLE added (
    id_opt_acc int,
    id_orders int,
    id_vehicles int,
    PRIMARY KEY (id_opt_acc),
    FOREIGN KEY (id_opt_acc) REFERENCES options_accessories(id_opt_acc),
    FOREIGN KEY (id_orders, id_vehicles) REFERENCES order_details(id_orders, id_vehicles)
);

CREATE TABLE assigned (
    id_customer int,
    id_sales_rep int,
    PRIMARY KEY (id_customer, id_sales_rep),
    FOREIGN KEY (id_customer) REFERENCES customer(id_customer),
    FOREIGN KEY (id_sales_rep) REFERENCES sales_rep(id_sales_rep)
);


INSERT INTO customer
    (cus_surname, cus_first_name, cus_address, cus_tel, cus_company_name, cus_company_address, cus_company_tel)
VALUES 
    ('Houseman', 'Peter', '35 Naunton Lane', '0678912345' , 'Planet Co', '12 Uranus End', '0678912346'),
    ('Cavel', 'Cathy', '2 rue du Moulin', '0678912347', 'Flowers Ltd', '3 rue du Moulin', '0678912348');



INSERT INTO options_accessories
    (opt_name, opt_price)
VALUES 
    ('alloys', 300),
    ('sun-roof', 100);




INSERT INTO sales_rep
    (rep_surname, rep_first_name, rep_tel)
VALUES 
    ('Diamond', 'Nick', '0678912350'),
    ('Houseman', 'Sam', '0678912349');



INSERT INTO services
    (ser_service_date, ser_price, id_orders, id_vehicles)
VALUES 
    ('7th March', 250, 1, 1),
    ('8th March', 300, 2, 2);

    



INSERT INTO vehicles
    (veh_name, veh_registration, veh_make, veh_colour, veh_pf, veh_age, veh_num_owners, veh_last_mot_date, veh_mot_due_date, veh_price)
VALUES 
    ('Mégane', 'qs-12345-fg', 'Renault', 'blue', 7, 1, 3, '2020-01-11', '2021-01-11', 30000),
    ('Octavia', 'ml-98741-mp', 'Skoda', 'black', 8, 2, 4, '2020-02-12', '2021-02-12', 25000);