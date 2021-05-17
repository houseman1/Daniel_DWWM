<?php
 /* Afin de ne pas trop mélanger le code PHP avec le HTML et améliorer la lisibilité, 
 * on peut mettre la connexion PDO en haut de la page 
 */ 
 try 
   {        
       $db = new PDO('mysql:host=localhost;charset=utf8;dbname=jarditou', 'root', '');
       $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   } catch (Exception $e) {
      echo "Erreur : " . $e->getMessage() . "<br>";
      echo "N° : " . $e->getCode();
      die("Fin du script");
}    

/* Ajoutons ici notre bloc d'exécution de la requête,
* Ainsi, elle est englobée dans le reste du code PHP
*/
$requete = "SELECT * FROM produits";
$result = $db->prepare($requete);
$result->execute();
$produit = $result->fetch(PDO::FETCH_OBJ); 

?>
<html>
<head>
   <meta charset="UTF-8">
   <title>testDb.php</title>      
</head>
<body> 
<?php
while ($produit = $result->fetch(PDO::FETCH_OBJ)) 
{
   echo $produit->pro_id." – ".$produit->pro_libelle. "<br>";
}
?>
</body>
</html>