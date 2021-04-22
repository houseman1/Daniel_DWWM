--Q1. Afficher dans l'ordre alphabétique et sur une seule colonne les noms et prénoms des employés qui ont des enfants,
--présenter d'abord ceux qui en ont le plus.
SELECT CONCAT(emp_lastname, ' ', emp_firstname), emp_children
FROM employees
WHERE emp_children > 0
ORDER BY emp_children DESC

--Q2. Y-a-t-il des clients étrangers ? Afficher leur nom, prénom et pays de résidence.
SELECT cus_lastname, cus_firstname, cus_countries_id
FROM customers
WHERE cus_countries_id != 'FR';

--Q3. Afficher par ordre alphabétique les villes de résidence des clients ainsi que le code (ou le nom) du pays.
SELECT cus_city, cus_countries_id, cou_name
FROM customers c
JOIN countries ON cus_countries_id = cou_id
ORDER BY cus_city

--Q4. Afficher le nom des clients dont les fiches ont été modifiées
SELECT cus_lastname, cus_update_date
FROM customers
WHERE cus_update_date IS NOT NULL;

--Q5. La commerciale Coco Merce veut consulter la fiche d'un client, 
--mais la seule chose dont elle se souvienne est qu'il habite une ville genre 'divos'. Pouvez-vous l'aider ?
SELECT cus_lastname, cus_firstname, cus_address, cus_city, cus_zipcode, cus_mail, cus_phone
FROM customers
WHERE cus_city LIKE '%divos%';

--Q6. Quel est le produit vendu le moins cher ? Afficher le prix, l'id et le nom du produit.
SELECT pro_id, pro_name, MIN(pro_price) AS 'pro_price'
FROM products
GROUP BY pro_id, pro_name
HAVING MIN(pro_price)
ORDER BY MIN(pro_price)
LIMIT 1;

--Q7. Lister les produits qui n'ont jamais été vendus
SELECT pro_id, pro_ref, pro_name
FROM products
LEFT JOIN orders_details ON pro_id = ode_pro_id
WHERE ode_pro_id IS NULL;

--Q8. Afficher les produits commandés par Madame Pikatchien.
SELECT pro_id, pro_ref, pro_name, cus_id, ord_id, ode_pro_id
FROM products
JOIN orders_details ON pro_id = ode_pro_id
JOIN orders ON ode_ord_id = ord_id
JOIN customers ON ord_cus_id = cus_id
WHERE cus_lastname = 'Pikatchien';

--Q9. Afficher le catalogue des produits par catégorie, le nom des produits et de la catégorie doivent être affichés.
SELECT cat_id, cat_name, pro_name
FROM products
LEFT JOIN categories ON pro_cat_id = cat_id
GROUP BY pro_name
ORDER BY cat_name;




