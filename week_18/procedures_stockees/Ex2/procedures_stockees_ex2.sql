--Exercice 2: création d'une procédure stockée avec un paramètre en entrée
--Créer la procédure stockée Lst_Rush_Orders, qui liste les commandes ayant le libelle "commande urgente"
DROP PROCEDURE IF EXISTS Lst_Rush_Orders;

DELIMITER ||

CREATE PROCEDURE Lst_Rush_Orders (IN p_status VARCHAR(50))

BEGIN
    SELECT ord_id, ord_status
    FROM orders
    WHERE ord_status = p_status;
END ||

DELIMITER ;

CALL Lst_Rush_Orders("Commande urgente");