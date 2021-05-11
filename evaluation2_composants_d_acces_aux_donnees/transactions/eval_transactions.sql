--Amity HANAH, Manageuse au sein du magasin d'Arras, vient de prendre sa retraite. 
--Il a été décidé, après de nombreuses tractations, de confier son poste au pépiniériste le plus ancien en poste
--dans ce magasin. 
--Ce dernier voit alors son salaire augmenter de 5% et ses anciens collègues pépiniéristes passent sous sa direction.
--Ecrire la transaction permettant d'acter tous ces changements en base des données.
--La base de données ne contient actuellement que des employés en postes.
--Il a été choisi de garder en base une liste des anciens collaborateurs de l'entreprise parti en retraite.
--Il va donc vous falloir ajouter une ligne dans la table posts pour référencer les employés à la retraite.


--1.  J'utilise une procédure pour trouver le pépiniériste le plus ancien en poste.
--    Un paramètre en sortie est déclaré parce que j'ai besoin de l'identité du nouveau chef des pépiniéristes dans les UPDATES.
--2.  Je commence le TRANSACTION et appel le PROCEDURE.
--3.  J'utilise les SAVEPOINTs en cas où j'ai besoin de ROLLBACK un ou deux étapes (par exemple ROLLBACK SAVEPOINT 
--    hanah2 ne ROLLBACK pas le premier UPDATE)  !!! ne ROLLBACK pas !!! (Ce n'est peut-être pas le français correct)
--4.  Je n'inclus pas le valeur 'pos_id' dans l'INSERT parce que c'est un clé primaire auto-increment.
--5.  Un COMMIT signifie que les modifications apportées à la transaction en cours sont rendues permanentes et deviennent
--    visibles pour les autres sessions. 
DROP PROCEDURE IF EXISTS p_oldest_pep;
DELIMITER |
CREATE PROCEDURE p_oldest_pep(OUT p_oldest_id INT)
    BEGIN 
        SELECT emp_id INTO p_oldest_id
        FROM employees
        JOIN posts ON pos_id = emp_pos_id
        WHERE pos_id = 14
        ORDER BY emp_enter_date
        LIMIT 1;
    END |
DELIMITER ; 

START TRANSACTION;
CALL p_oldest_pep(@p_oldest_id);

SAVEPOINT hanah1;
UPDATE employees 
    SET emp_salary = emp_salary*1.05 
    WHERE emp_id = @p_oldest_id;

SAVEPOINT hanah2;
UPDATE employees
    JOIN posts ON pos_id = emp_pos_id
    SET emp_superior_id = 3
    WHERE pos_id = 14;

SAVEPOINT hanah3;
INSERT INTO posts (pos_libelle)
    VALUES ('En retraite');

COMMIT;



SELECT emp_id, emp_lastname, emp_salary
    FROM employees
    WHERE emp_id = @p_oldest_id;

SELECT emp_lastname, emp_superior_id, pos_id, pos_libelle
    FROM posts
    JOIN employees ON pos_id = emp_pos_id
    WHERE emp_superior_id = 3 AND pos_id = 14;

SELECT *
    FROM posts
    WHERE pos_libelle = 'En retraite';


