--Créez une vue qui affiche le catalogue produits. 
--L'id, la référence et le nom des produits, ainsi que l'id et le nom de la catégorie doivent apparaître.

CREATE VIEW v_catalogue
AS 
SELECT pro_id, pro_ref, pro_name, cat_id, cat_name
FROM products
JOIN categories ON cat_id = pro_cat_id

SELECT * 
FROM v_catalogue

--Pour ajouter l'id de la catégorie parent je peux utitliser un SELF JOIN (auto-jointure) sur la table categories.
--J'utilise LEFT JOIN à la place de JOIN pour incluer les catégoiries parents NULL.
--Le LEFT JOIN mot-clé renvoie tous les enregistrements de la table de gauche (categoiries child),
--même s'il n'y a aucune correspondance dans la table de droite (categories parent).
DROP VIEW IF EXISTS v_catalogue;
CREATE VIEW v_catalogue
AS
SELECT pro_id, pro_ref, pro_name, child.cat_id, child.cat_name, parent.cat_name AS cat_parent_name
FROM categories child
LEFT JOIN categories parent ON parent.cat_id = child.cat_parent_id
JOIN products ON child.cat_id = pro_cat_id

SELECT * 
FROM v_catalogue