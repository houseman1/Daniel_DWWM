--Afficher la liste des hôtels avec leur station.
CREATE VIEW v_hot_name_hot_sta
AS
SELECT hot_nom, sta_nom
FROM hotel
JOIN station ON sta_id = hot_sta_id

--Afficher la liste des chambres et leur hôtel
CREATE VIEW v_hotel_chambres
AS
SELECT cha_numero, cha_capacite, hot_nom
FROM chambre
JOIN hotel ON cha_hot_id = hot_id

--Afficher la liste des réservations avec le nom des clients
CREATE VIEW v_res_client
AS
SELECT CONCAT(cli_nom, ' ', cli_prenom) AS 'cli_nom, cli_prenom', res_date 
FROM client
JOIN reservation ON cli_id = res_cli_id

--Afficher la liste des chambres avec le nom de l'hôtel et le nom de la station
CREATE VIEW v_cham_hot_sta
AS
SELECT cha_numero, hot_nom, sta_nom
FROM chambre
JOIN hotel ON hot_id = cha_hot_id
JOIN station ON sta_id = hot_sta_id

--Afficher les réservations avec le nom du client et le nom de l'hôtel
CREATE VIEW v_res_cli_nom_hot_nom
AS
SELECT res_date, cli_nom , hot_nom
FROM hotel
JOIN chambre ON hot_id = cha_hot_id
JOIN reservation ON cha_id = res_cha_id
JOIN client ON cli_id = res_cli_id