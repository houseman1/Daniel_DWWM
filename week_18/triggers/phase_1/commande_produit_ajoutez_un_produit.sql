--Mettez en place ce trigger, puis ajoutez un produit dans une commande, vérifiez que le champ total est bien mis à jour.
DELIMITER |
DROP TRIGGER IF EXISTS maj_total
CREATE TRIGGER maj_total 
AFTER INSERT ON lignedecommande
FOR EACH ROW
BEGIN
    DECLARE id_c INT;
    DECLARE tot DOUBLE;
    SET id_c = NEW.id_commande; -- nous captons le numéro de commande concerné
    SET tot = (SELECT sum(prix*quantite) FROM lignedecommande WHERE id_commande=id_c); -- on recalcul le total
    UPDATE commande SET total=tot WHERE id=id_c; -- on stock le total dans la table commande
END |
DELIMITER ;


INSERT INTO lignedecommande (id_commande, id_produit, quantite, prix)
VALUES (1, 3, 10, 10.00),
VALUES (2, 3, 10, 10.00);


--Ce trigger ne fonctionne que lorsque l'on ajoute des produits,
--les modifications ou suppressions ne permettent pas de recalculer le total. Comment pourrait-on faire ?
--Il faut faire trois triggers (AFTER INSERT, AFTER UPDATE et AFTER DELETE)
--On peut utiliser NEW et OLD
----------------------------------------------------------------------------------
--          NEW                     OLD
--INSERT    inserted rows           empty
--DELETE    empty                   deleted rows
--UPDATE    rows after update       rows before update



--Delete
DELIMITER $$
CREATE TRIGGER maj_total_delete
AFTER DELETE ON lignedecommande
FOR EACH ROW
BEGIN   
        DECLARE id_c INT;
        DECLARE tot DOUBLE;
        SET id_c = OLD.id_commande;
        SET tot = (SELECT sum(prix*quantite) FROM lignedecommande WHERE id_commande=id_c);
        UPDATE commande SET total=total-tot WHERE id=id_c;
END $$
DELIMITER ;

DELETE FROM lignedecommande 
WHERE  id_commande = 1 AND id_produit = 3 AND quantite = 10;


--Update
DELIMITER $$
CREATE TRIGGER maj_total_update
AFTER UPDATE ON lignedecommande
FOR EACH ROW
BEGIN
        DECLARE id_c INT;
        DECLARE tot DOUBLE;
        SET id_c = NEW.id_commande;
        SET tot = (SELECT sum(prix*quantite) FROM lignedecommande WHERE id_commande=id_c);
        UPDATE commande SET total=tot WHERE id=id_c;
END $$
DELIMITER ;

UPDATE lignedecommande
SET prix = 50
WHERE id_commande = 1 AND id_produit = 3 AND quantite = 2;

--Un champ remise était prévu dans la table commande. Comment pourrait-on le prendre en compte ?
--Il faut ajouter total=tot-(tot*remise/100)
DELIMITER $$
CREATE TRIGGER maj_total_update
AFTER UPDATE ON lignedecommande
FOR EACH ROW
BEGIN
        DECLARE id_c INT;
        DECLARE tot DOUBLE;
        SET id_c = NEW.id_commande;
        SET tot = (SELECT sum(prix*quantite) FROM lignedecommande WHERE id_commande=id_c);
        UPDATE commande SET total=tot-(tot*remise/100) WHERE id=id_c;--la remise
END $$
DELIMITER ;

UPDATE lignedecommande
SET prix = 50
WHERE id_commande = 1 AND id_produit = 3 AND quantite = 2;
