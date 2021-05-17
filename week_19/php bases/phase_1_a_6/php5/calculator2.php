<?php
    $error = "";
    $x = "";
    $y = "";
    $result = "";
    if(isset($_GET['operation'])){
        $x = $_GET['num1'];
        $y = $_GET['num2'];
        $op = $_GET['operation'];

        if(is_numeric($x) && is_numeric($y)){
            switch($op){
                case 'add' : $result =  $x  + $y;
                    break;
                case 'sub' : $result =  $x  - $y;
                    break;
                case 'pro' : $result =  $x  * $y;
                    break;
                case 'div' : $result =  $x  / $y;
                    break;
            }
        }else{
            $error = "Enter Number first";
        }   
        
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Question 1</title>
</head>
<body>
    <h1>PHP - Simple Calculator Program</h1>
    <form action="<?php= $_REQUEST["self"]?>" method="GET">
        <div>
            <input type="number" name="num1" id="num1" value="<?php= $_GET["num1"] ?>">
            <label for="num1">Number 1</label>
        </div>
        <div>
            <input type="number" name="num2" id="num2" value="<?php= $_GET["num2"] ?>">
            <label for="num2">Number 2</label>
        </div>
        <div>
            <input type="text" id="result" value="<?= $result ?>" disabled>
            <label for="result">Result</label>
        </div>
        <div>
            <input type="submit" value="Add" name="add">
            <input type="submit" value="Subtract" name="subtract">
            <input type="submit" value="Product" name="product">
            <input type="submit" value="Division" name="division">
        </div>
    </form>
</body>
</html>
