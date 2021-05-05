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
AFTER UPDATE ON products
FOR EACH ROW
BEGIN
    DECLARE stk_p INT;
    DECLARE stk_a INT;
    SET stk_p = NEW.pro_stock;
    SET stk_a = OLD.pro_stock_alert;
    IF (stk_p < stk_a)
    THEN
        INSERT INTO commander_articles (ca_codart, ca_qte, ca_date)
        VALUES (pro_id, stk_p, DATE(NOW));
    END IF;
END $$
DELIMITER ;

UPDATE products
SET pro_stock = 4
WHERE pro_id = 8;
