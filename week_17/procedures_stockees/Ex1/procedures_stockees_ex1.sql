--Exercice1 : création d'une procédure stockée sans paramètre
DELIMITER | --caractère de fin pour l'instruction SQL pour éviter les erreurs

CREATE PROCEDURE Lst_Suppliers ()

BEGIN
    SELECT sup_name
    FROM suppliers
    JOIN products ON sup_id = pro_sup_id
    JOIN orders_details ON pro_id = ode_pro_id
    WHERE ode_quantity > 1
    GROUP BY sup_name;
END | --instruction de fin d'exécution de la procédure

DELIMITER ; --on rétablit le délimiteur originel du langage SQL

CALL Lst_Suppliers


--obtenir des informations sur cette procédure stockée
SHOW CREATE PROCEDURE Lst_Suppliers