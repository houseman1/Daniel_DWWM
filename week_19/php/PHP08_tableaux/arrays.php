<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

        //array_reverse
        print("<br><h3>array_reverse()</h3>");
        $input  = array("php", 4.0, array("green", "red"));
        $reversed = array_reverse($input);
        $preserved = array_reverse($input, true);
        print_r($input);
        print("<br>");
        print_r($reversed);
        print("<br>");
        print_r($preserved);
        var_dump($input,$reversed,$preserved);

        //array_key_exists
        print("<br><h3>array_key_exists()</h3>");
        $search_array = array('premier' => 1, 'second' => 4);
        if (array_key_exists('premier', $search_array)) {
            echo "L'élément 'premier' existe dans le tableau";
        }
        var_dump($search_array);

        //array_merge
        print("<br><h3>array_merge()</h3>");
        $array1 = array("color" => "red", 2, 4);
        $array2 = array("a", "b", "color" => "green", "shape" => "trapezoid", 4);
        $result = array_merge($array1, $array2);
        print_r($result);
        var_dump($result, $array1, $array2);

        //array_diff
        print("<br><h3>array_diff()</h3>");
        $array1 = array("a" => "green", "red", "blue", "red");
        $array2 = array("b" => "green", "yellow", "red");
        $result = array_diff($array1, $array2);
        print_r($result);
        var_dump($result,$array1, $array2);

        //array_intersect
        print("<br><h3>array_intersect()</h3>");
        $array1 = array("a" => "green", "red", "blue");
        $array2 = array("b" => "green", "yellow", "red");
        $result = array_intersect($array1, $array2);
        print_r($result);
        var_dump($result,$array1, $array2);

        //array_column
        // Tableau représentant un jeu d'enregistrements issu d'une base de données
        print("<br><h3>array_column()</h3>");
        $records = array(
            array(
                'id' => 2135,
                'first_name' => 'John',
                'last_name' => 'Doe',
            ),
            array(
                'id' => 3245,
                'first_name' => 'Sally',
                'last_name' => 'Smith',
            ),
            array(
                'id' => 5342,
                'first_name' => 'Jane',
                'last_name' => 'Jones',
            ),
            array(
                'id' => 5623,
                'first_name' => 'Peter',
                'last_name' => 'Doe',
            )
        );
        
        $first_names = array_column($records, 'first_name');
        print_r ($first_names);
        var_dump($first_names,$records);

        // En utilisant le tableau de l'exemple #1
        $last_names = array_column($records, 'last_name', 'id');
        print("<br>");
        print_r($last_names);
        var_dump($last_names,$records);

        //array_splice
        print("<br><h3>array_splice()</h3>");
        $a1=array("a"=>"red","b"=>"green","c"=>"blue","d"=>"yellow");
        $a2=array("a"=>"purple","b"=>"orange");
        array_splice($a1,0,2,$a2);//array_splice(array, start, length, array)
        print_r($a1);
        var_dump($a1,$a2);

        //array_sum
        print("<br><h3>array_sum()</h3>");
        $a=array(5,15,25);
        echo array_sum($a);
        var_dump($a);

        //array_unique
        print("<br><h3>array_unique()</h3>");
        $a=array("a"=>"red","b"=>"green","c"=>"red");
        print_r(array_unique($a));
        var_dump($a);

        //in_array
        print("<br><h3>in_array()</h3>");
        $people = array("Peter", "Joe", "Glenn", "Cleveland");

        if (in_array("Glenn", $people))
        {
        echo "Match found";
        }
        else
        {
        echo "Match not found";
        }
        var_dump($people);

        //array_values
        print("<br><h3>array_values()</h3>");
        $a=array("Name"=>"Peter","Age"=>"41","Country"=>"USA");
        print_r(array_values($a));
        var_dump($a);

        //shuffle

        $my_array = array("red","green","blue","yellow","purple");
        print("<br><h3>array_values()</h3>");
        shuffle($my_array);
        print_r($my_array);
        print("<p>Refresh the page to see how shuffle() randomizes the order of the elements in the array.</p>");
        var_dump($my_array);

    ?>
</body>
</html>

