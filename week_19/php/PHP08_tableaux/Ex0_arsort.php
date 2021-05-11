<?php
$tableau = array("a" => "Lundi",
                    "b" => "Mardi",
                    "c" => "Mercredi",
                    "d" => "Jeudi");
    arsort($tableau);

    foreach($tableau as $cle => $valeur) 
    { 
        echo $cle ." : ".$valeur."<br>"; 
    } 
    var_dump($tableau,$cle,$valeur)
    ?>