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


INSERT INTO 