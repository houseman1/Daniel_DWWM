--Créez une vue qui affiche le catalogue produits. 
--L'id, la référence et le nom des produits, ainsi que l'id et le nom de la catégorie doivent apparaître.

CREATE VIEW v_catalogue
AS 
SELECT child.cat_id AS cat_id, child.cat_name AS cat_name, parent.cat_name AS cat_parent
FROM categories child
JOIN categories parent 

