USE afpa_gescom;

--Creating roles
CREATE ROLE IF NOT EXISTS
    'r_afpa_gescom_all'@'%',
    'r_afpa_gescom_read'@'%',
    'r_afpa_gescom_suppliers'@'%';


--Granting privileges to roles
GRANT ALL PRIVILEGES
ON afpa_gescom.*
TO 'r_afpa_gescom_all'@'%';

GRANT SELECT 
ON afpa_gescom.*
TO 'r_afpa_gescom_read'@'%';

GRANT SELECT
ON TABLE afpa_gescom.suppliers 
TO 'r_afpa_gescom_suppliers'@'%';


--Creating user accounts with passwords
CREATE USER 'util1'@'%' IDENTIFIED BY 'pass1';

CREATE USER 'util2'@'%' IDENTIFIED BY 'pass2';

CREATE USER 'util3'@'%' IDENTIFIED BY 'pass3';


--Assigning roles to user accounts
GRANT 'r_afpa_gescom_all'@'%'
TO 'util1'@'%';

GRANT 'r_afpa_gescom_read'@'%'
TO 'util2'@'%';

GRANT 'r_afpa_gescom_suppliers'@'%'
TO 'util3'@'%';


--Setting default roles to make them active when the user connects to the server
SET DEFAULT ROLE 'r_afpa_gescom_all'@'%'
TO 'util1'@'%';

SET DEFAULT ROLE 'r_afpa_gescom_read'@'%'
TO 'util2'@'%'; 

SET DEFAULT ROLE 'r_afpa_gescom_suppliers'@'%'
TO 'util3'@'%';


--Displaying privileges that roles represent
SHOW GRANTS FOR 'util1'@'%'
USING 'r_afpa_gescom_all'@'%';

SHOW GRANTS FOR 'util2'@'%'
USING 'r_afpa_gescom_read'@'%';

SHOW GRANTS FOR 'util3'@'%'
USING 'r_afpa_gescom_suppliers'@'%';