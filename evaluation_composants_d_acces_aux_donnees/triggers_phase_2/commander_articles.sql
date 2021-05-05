--Créer une table commander_articles constituées de colonnes :
--codart : id du produit
--qte : quantité à commander
--date : date du jour
USE gescom_afpa;

CREATE TABLE IF NOT EXISTS commander_articles(
   ca_id INT AUTO_INCREMENT NOT NULL,
   ca_qte INT,
   ca_date DATE,
   ca_codart INT,
   PRIMARY KEY  (ca_id),
   FOREIGN KEY (ca_codart) REFERENCES products(pro_id)
);

--Créer un déclencheur after_products_update sur la table products : lorsque le stock physique devient inférieur
--au stock d'alerte, une nouvelle ligne est insérée dans la table commander_articles.
DROP TRIGGER IF EXISTS after_products_update;

DELIMITER $$
CREATE TRIGGER after_products_update
BEFORE UPDATE ON products
FOR EACH ROW
BEGIN
    DECLARE stk_p INT;
    DECLARE stk_a INT;
    DECLARE stk_id INT;
    DECLARE stk_id_check INT;
    DECLARE stk_date DATE;
    SET stk_p = NEW.pro_stock;
    SET stk_a = OLD.pro_stock_alert;
    SET stk_id = NEW.pro_id;
    SET stk_id_check = OLD.pro_id;
    SET stk_date = CURDATE();
    IF (stk_p < stk_a)
    THEN
        IF stk_id NOT IN (SELECT ca_codart FROM commander_articles)
        THEN
            INSERT INTO commander_articles (ca_codart, ca_qte, ca_date)
            VALUES (stk_id, (stk_a-stk_p), stk_date);
        ELSE
            UPDATE commander_articles
            SET ca_qte = (stk_a-stk_p),
            ca_date = stk_date
            WHERE stk_id = ca_codart;
        END IF;
    END IF;
END $$
DELIMITER ;

--On passe le stock physique à 6
UPDATE products
SET pro_stock = 6
WHERE pro_id = 8;

--On passe le stock physique à 4.
UPDATE products
SET pro_stock = 4
WHERE pro_id = 8;

--On passe le stock physique à 3.
UPDATE products
SET pro_stock = 3
WHERE pro_id = 8;