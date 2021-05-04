--Exercice 3 : création d'une procédure stockée avec plusieurs paramètres
--Créer la procédure stockée CA_Supplier, qui pour un code fournisseur et une année entrée en paramètre, 
--calcule et restitue le CA potentiel de ce fournisseur pour l'année souhaitée.
--On exécutera la requête que si le code fournisseur est valide, c'est-à-dire dans la table suppliers.
--Testez cette procédure avec différentes valeurs des paramètres.

DROP PROCEDURE IF EXISTS CA_Supplier;

DELIMITER $$

CREATE PROCEDURE CA_Supplier(
    p_supplier_code INT(10),
    p_annee INT(4) 
)
BEGIN
    IF p_supplier_code IN (SELECT sup_id FROM suppliers)
        THEN    
            SELECT sup_id, sup_name, ROUND(SUM((ode_unit_price-(ode_unit_price*ode_discount/100))*ode_quantity),2) AS CA
            FROM suppliers
            JOIN products ON sup_id = pro_sup_id
            JOIN orders_details ON pro_id = ode_pro_id
            JOIN orders ON ord_id = ode_ord_id
            WHERE sup_id = p_supplier_code AND p_annee = YEAR(ord_order_date);
        ELSE
            SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = "Le code fournisseur n'est pas valide";
    END IF;
END $$
DELIMITER ;

--On exécutera la requête que si le code fournisseur est valide
CALL CA_Supplier (1,2020);

--On n'exécutera pas la requête que si le code fournisseur n'est pas valide
CALL CA_Supplier (6,2020);