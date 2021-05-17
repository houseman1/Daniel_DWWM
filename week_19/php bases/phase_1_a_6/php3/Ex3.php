<html>
    <body>
        <table border = '2'>
            <?php
                //Exercice 3 - Ecrire un script qui affiche la table de multiplication totale de {1,...,12} par {1,...,12}
                
                //table headings
                echo "<tr>";
                echo "<th>"." "."</th>";//first cell empty
                for ($h=0; $h<=12; $h++) {
                    echo "<th>".$h."</th>";
                }
                echo "</tr>";

                //fill table
                $r = 0;
                $c = array(0,1,2,3,4,5,6,7,8,9,10,11,12);
                echo "<tr>";
                for ($j=0; $j<=12; $j++) {
                    echo "<td><b>".$r."</b></td>";//first column bold
                    for ($i=0; $i <= 12; $i++) {
                        echo "<td>".$r * $c[$i]." "."</td>";
                    } echo "</tr>";
                    $r++;
                }   
                ?>
        </table>
    </body>
</html>