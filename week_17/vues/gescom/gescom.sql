--v_Details correspondant à la requête : _A partir de la table orders_details, afficher par code produit, 
--la somme des quantités commandées et le prix total correspondant : 
--on nommera la colonne correspondant à la somme des quantités commandées, QteTot et le prix total, PrixTot.
CREATE VIEW v_Details
AS
SELECT pro_ref, SUM(ode_quantity) AS 'QteTot',ROUND(SUM((ode_unit_price-(ode_unit_price*ode_discount/100))*ode_quantity),2) AS 'PrixTot'
FROM orders_details
JOIN products ON pro_id = ode_pro_id
GROUP BY ode_pro_id


--v_Ventes_Zoom correspondant à la requête : 
--Afficher les ventes dont le code produit est ZOOM (affichage de toutes les colonnes de la table orders_details).
CREATE VIEW v_Ventes
AS 
SELECT pro_name, ode_id, ode_unit_price, ode_discount, ode_quantity, ode_ord_id, ode_pro_id
FROM products
LEFT JOIN orders_details ON pro_id = ode_pro_id
WHERE pro_name = 'Zoom'