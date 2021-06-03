<?php
    //Create a new instance of the class SplFileObject as the object $obj_ll_sfo
    $obj_ll_sfo = new SplFileObject("liste_liens.txt");

    //Use a while loop to loop to the end of the file.
    //The property 'eof' stands for 'end of file'.  It returns true if file is at EOF, false otherwise.
    while (!$obj_ll_sfo->eof()) {
        //Assign one line from the file 'liste_liens.txt' to the string variable $str_link using the property 'fgets' of the object '$obj_ll_sfo'
        $str_link = $obj_ll_sfo->fgets();
?>
        //Display the link on the page
        <a href="<?=$str_link?>"><?=$str_link?></a>

<?php
    echo "<br>";
    }
?>
