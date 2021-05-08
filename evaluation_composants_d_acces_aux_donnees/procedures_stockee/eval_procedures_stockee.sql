--Créez la procédure stockée facture qui permet d'afficher les informations nécessaires à une facture en fonction 
--d'un numéro de commande. Cette procédure doit sortir le montant total de la commande.
--Pensez à vous renseigner sur les informations légales que doit comporter une facture.
DROP PROCEDURE IF EXISTS p_facture;

DELIMITER |

CREATE PROCEDURE p_facture(IN p_ord_id INT(6))
BEGIN
    SELECT p_ord_id AS 'Order ID', 
        ord_order_date AS 'Order Date', 
        CONCAT(cus_lastname, ' ', cus_firstname) AS 'Customer', 
        cus_address AS 'Address'
    FROM orders
    JOIN customers ON cus_id = ord_cus_id
    WHERE p_ord_id = ord_id
    GROUP BY p_ord_id;
  
    SELECT pro_id AS 'Product ID', 
        pro_ref AS 'Reference', 
        pro_name AS 'Designation', 
        pro_price AS 'P U HT', 
        ode_discount AS 'Discount',
        ode_quantity AS 'Quantity',
        ROUND(((ode_unit_price-(ode_unit_price*ode_discount/100))*ode_quantity),2) AS 'Total HT',
        10 AS 'TVA',
        ROUND((((ode_unit_price-(ode_unit_price*ode_discount/100))*ode_quantity)*1.1),2) AS 'Total TTC'
    FROM products
    JOIN orders_details ON pro_id = ode_pro_id
    JOIN orders ON ord_id = ode_ord_id
    JOIN customers ON cus_id = ord_cus_id
    WHERE p_ord_id = ord_id;

    SELECT ode_ord_id AS 'order ID', ROUND(SUM((((ode_unit_price-(ode_unit_price*ode_discount/100))*ode_quantity)*1.1)),2) AS 'Total Due'
    FROM orders_details
    JOIN orders ON ord_id = ode_ord_id
    WHERE p_ord_id = ord_id;
END |

DELIMITER ;

CALL p_facture(8);

