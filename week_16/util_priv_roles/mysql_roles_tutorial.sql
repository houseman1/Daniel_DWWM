CREATE DATABASE crm;

USE crm;

CREATE TABLE customers (
    id INT PRIMARY KEY AUTO_INCREMENT,
    first_name VARCHAR(255) NOT NULL,
    last_name VARCHAR(255) NOT NULL,
    phone VARCHAR (15) NOT NULL,
    email VARCHAR(255)
);

INSERT INTO customers(first_name,last_name,phone,email)
VALUES ('John', 'Doe', '(408)-987-7654', 'john.doe@mysqltutorial.org'),
       ('Lily', 'Bush', '(408)-987-7985', 'lily.bush@mysqltutorial.org');

SELECT * FROM customers;



CREATE ROLE
    'crm_dev'@'localhost',
    'crm_read'@'localhost',
    'crm_write'@'localhost';

--GRANTING PRIVILEGES TO ROLES
--grants all privileges to crm_dev role
GRANT ALL 
ON crm.*
TO crm_dev;
--grants the SELECT privilege to crm_read role
GRANT SELECT 
ON crm.*
TO crm_read;
--grants INSERT, UPDATE, and DELETE privileges to crm_write role
GRANT INSERT, UPDATE, DELETE
ON crm.*
to crm_write;

--ASSIGNING ROLES TO USER ACCOUNTS
--create users
--developer user
CREATE USER crm_dev1@localhost IDENTIFIED BY 'Secure$1782';
--read access user
CREATE USER crm_read1@localhost IDENTIFIED BY 'Secure$5432';
--read/write users
CREATE USER crm_write1@localhost IDENTIFIED BY 'Secure$9075';
CREATE USER crm_write2@localhost IDENTIFIED BY 'Secure$3452';
--grants the crm_rev role to the user account crm_dev1@localhost
GRANT crm_dev
TO crm_dev1@localhost;
--grants the crm_read role to the user account crm_read1@localhost
GRANT crm_read
TO crm_read1@localhost;
--grants the crm_read and crm_write roles to the user accounts crm_write1@localhost and crm_write2@localhost
GRANT crm_read,
    crm_write
TO crm_write1@localhost,
    crm_write2@localhost;
--To verify the role assignments, you use the SHOW GRANTS statement
SHOW GRANTS FOR crm_dev1@localhost;
--To show the privileges that roles represent, you use the USING clause with the name of the granted roles
SHOW GRANTS 
FOR crm_write1@localhost 
USING crm_write;

--SETTING DEFAULT ROLES
--If you connect to the MySQL using the crm_read1 user account and try to access the CRM database:
>mysql -u crm_read1 -p
Enter password: ***********
mysql>USE crm;
--the statement issued the following error message:
--ERROR 1044 (42000): Access denied for user 'crm_read1'@'localhost' to database 'crm
--If you invoke the CURRENT_ROLE() function, it will return NONE, meaning no active roles.
SELECT current_role();
--+----------------+
--| current_role() |
--+----------------+
--| NONE           |
--+----------------+
--1 row in set (0.00 sec)
--The following statement sets the default for the crm_read1@localhost account all its assigned roles.
SET DEFAULT ROLE ALL TO crm_read1@localhost;
--Now, if you connect to the MySQL database server using the crm_read1 user account and invoke the CURRENT_ROLE() function:

>mysql -u crm_read1 -p
Enter password: ***********
mysql> select current_role();
Code language: SQL (Structured Query Language) (sql)
--You will see the default roles for crm_read1 user account.
--+----------------+
--| current_role() |
--+----------------+
--| `crm_read`@`%` |
--+----------------+
--1 row in set (0.00 sec)
--You can test the privileges of crm_read account by switching the current database to CRM,
--executing a SELECT statement and a DELETE statement as follows:
mysql> use crm;
Database changed
mysql> SELECT COUNT(*) FROM customers;
--+----------+
--| COUNT(*) |
--+----------+
--|        2 |
--+----------+
--1 row in set (0.00 sec)
mysql> DELETE FROM customers;
--ERROR 1142 (42000): DELETE command denied to user 'crm_read1'@'localhost' for table 'customers'
--It worked as expected. When we issued the DELETE statement, 
--MySQL issued an error because crm_read1 user account has only read access.