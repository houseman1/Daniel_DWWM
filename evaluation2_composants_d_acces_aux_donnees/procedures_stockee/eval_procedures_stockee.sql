--Créez la procédure stockée facture qui permet d'afficher les informations nécessaires à une facture en fonction 
--d'un numéro de commande. Cette procédure doit sortir le montant total de la commande.
--Pensez à vous renseigner sur les informations légales que doit comporter une facture.

--Le premier SELECT lit les informations qui sont unique
--Le deuxième SELECT lit les lignes de commande qui sont différent à chaque ligne
DROP PROCEDURE IF EXISTS p_facture;

DELIMITER |

CREATE PROCEDURE p_facture(IN p_ord_id INT(6))
BEGIN
    SELECT p_ord_id AS 'Order ID', 
        ord_order_date AS 'Order Date', 
        CONCAT(cus_lastname, ' ', cus_firstname) AS 'Customer', 
        cus_address AS 'Address',
        ode_ord_id AS 'order ID', 
        ROUND(SUM((((ode_unit_price-(ode_unit_price*ode_discount/100))*ode_quantity)*1.1)),2) AS 'Total Due'
    FROM orders
    JOIN customers ON cus_id = ord_cus_id
    JOIN orders_details ON ord_id = ode_ord_id
    WHERE p_ord_id = ord_id
    GROUP BY p_ord_id;
  
    SELECT pro_id AS 'Product ID', 
        pro_ref AS 'Reference', 
        pro_name AS 'Designation', 
        pro_price AS 'P U HT', 
        ode_discount AS 'Discount',
        ode_quantity AS 'Quantity',
        ROUND(((ode_unit_price-(ode_unit_price*ode_discount/100))*ode_quantity),2) AS 'Total HT',
        ROUND((((ode_unit_price-(ode_unit_price*ode_discount/100))*ode_quantity)*0.1),2) AS 'TVA',
        ROUND((((ode_unit_price-(ode_unit_price*ode_discount/100))*ode_quantity)*1.1),2) AS 'Total TTC'
    FROM products
    JOIN orders_details ON pro_id = ode_pro_id
    JOIN orders ON ord_id = ode_ord_id
    JOIN customers ON cus_id = ord_cus_id
    WHERE p_ord_id = ord_id;

END |

DELIMITER ;

CALL p_facture(8);





/*incorrect workings
experiments with variables

DROP PROCEDURE IF EXISTS p_facture;

DELIMITER |

CREATE PROCEDURE p_facture(IN p_ord_id INT(6))

BEGIN
    DECLARE v_tot_ht DECIMAL(6,2);
    SELECT ode_unit_price-(ode_unit_price*ode_discount/100)*ode_quantity INTO v_tot_ht
    FROM orders_details
    JOIN orders ON ord_id = ode_ord_id 
    WHERE p_ord_id = ord_id;

    SELECT p_ord_id AS 'Order ID', 
        ord_order_date AS 'Order Date', 
        CONCAT(cus_lastname, ' ', cus_firstname) AS 'Customer', 
        cus_address AS 'Address',
        ode_ord_id AS 'order ID', 
        SUM(v_tot_ht*1.1) AS 'Total Due'
    FROM orders
    JOIN customers ON cus_id = ord_cus_id
    JOIN orders_details ON ord_id = ode_ord_id
    WHERE p_ord_id = ord_id
    GROUP BY p_ord_id;
  
    SELECT pro_id AS 'Product ID', 
        pro_ref AS 'Reference', 
        pro_name AS 'Designation', 
        pro_price AS 'P U HT', 
        ode_discount AS 'Discount',
        ode_quantity AS 'Quantity',
        v_tot_ht AS 'Total HT',
        v_tot_ht*0.1 AS 'TVA',
        v_tot_ht*1.1 AS 'Total TTC'
    FROM products
    JOIN orders_details ON pro_id = ode_pro_id
    JOIN orders ON ord_id = ode_ord_id
    JOIN customers ON cus_id = ord_cus_id
    WHERE p_ord_id = ord_id;

END |

DELIMITER ;

CALL p_facture(8);*/