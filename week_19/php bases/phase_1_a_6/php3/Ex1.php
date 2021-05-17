
<?php
    //Exercice 1 //Ecrire un script PHP qui affiche tous les nombres impairs entre 0 et 150, par ordre croissant
    $i=0;
    while($i <= 150){
        if($i % 2 != 0){
            echo $i.", ";
        }
            $i++;
    }
?>
