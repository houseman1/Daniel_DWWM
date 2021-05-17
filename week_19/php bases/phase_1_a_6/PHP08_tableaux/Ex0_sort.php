<?php
$nom = array("franck","laurent","caroline","magali","veronique");   
    sort($nom);

    for ($nb1=0;$nb1<=count($nom)-1; $nb1++) 
    {
       echo "$nom[$nb1]<br>";
    }
    var_dump($nom, $nb1)
?>