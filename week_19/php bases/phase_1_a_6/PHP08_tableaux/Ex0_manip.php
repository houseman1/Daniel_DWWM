<?php
$facture = array("Janvier"=>500, "Février"=>620, "Mars"=>300, "Avril"=>130, "Mai"=>560, "Juin"=>350); 
    $facture_sixmois=0; 

    foreach ($facture as $mois => $valeur) 
    { 
       echo "Facture du mois de $mois : $valeur Euros<br />"; 
       $facture_sixmois +=$valeur; 
    } 

    echo "Facture total de six mois : <b>$facture_sixmois Euros</b>"; 
    var_dump($facture,$valeur, $facture_sixmois);
    ?> 