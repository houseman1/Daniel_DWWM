--Phase 2 - Mise en situation
--Exercice 1
--Sous PhpMyAdmin, après avoir sélectionné votre base Papyrus, codez le script suivant et exécutez-le :

START TRANSACTION;
SELECT nomfou FROM fournis WHERE numfou = 120;    
UPDATE fournis SET nomfou = 'GROSBRIGAND' WHERE numfou = 120;
SELECT nomfou FROM fournis WHERE numfou = 120; 

--Que concluez-vous ?
--Tous les instructions sont atomic parce que la transaction n'a pas echoue
--Toutes les requêtes présentes dans la transaction sont exécutées sans erreurs 

--Les données sont-elles modifiables par d'autres utilisateurs 
--(ouvrez une nouvelle fenêtre de requête pour interroger le fournisseur 120 par une instruction SELECT) ?
--Je n'ai pas compris.  Modifier avec SELECT ?

--La transaction est-elle terminée ?
--Oui, parce que toutes les requêtes présentes dans la transaction sont exécutées sans erreurs et le nom
--de fournisseur 120 a changé.

--Comment rendre la modification permanente ?
--Il faut utiliser COMMIT
START TRANSACTION;
SELECT nomfou FROM fournis WHERE numfou = 120;    
UPDATE fournis SET nomfou = 'GROSBRIGAND' WHERE numfou = 120;
SELECT nomfou FROM fournis WHERE numfou = 120; 
COMMIT;

--Comment annuler la transaction
ROLLBACK;

--C'est aussi possible d'utiliser SAVEPOINT s'il y a plusieurs UPDATES ou DELETES
--la première UPDATE est effectée et la deuxième est annulée
START TRANSACTION
SELECT nomfou FROM fournis WHERE numfou = 120;
SAVEPOINT sp1;    
UPDATE fournis SET nomfou = 'GROSBRIGAND' WHERE numfou = 120;
SAVEPOINT sp2;
UPDATE fournis SET ruefou = '21 rue du papier' WHERE numfou = 120;
COMMIT;
ROLLBACK TO sp2;





