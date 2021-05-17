<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <?php
        function calculator($n1,$op,$n2){

            switch($op){
                case "/" :
                    $res = $n1 / $n2;
                    echo $res;
                    break;
                
                case "+" :
                    $res = $n1 + $n2;
                    echo $res;
                    break;

                case "-" :
                    $res = $n1 - $n2;
                    echo $res;
                    break;

                case "*" :
                    $res = $n1 * $n2;
                    echo $res;
                    break;

                default :
                    echo "Opérateur incorrect";
            }
        }

        
        if(isset($_POST['button1'])){
            $calc1 = $_POST['select1'];
            $calc2 = $_POST['select2'];
            $calc3 = $_POST['select3'];
            calculator($calc1,$calc2,$calc3);
            echo $res;
        }

    ?>



<div class="container align-center col-4">
    <div class="form-group">
        <label for="exampleFormControlSelect2">choose a number</label>
        <select class="form-control" id="exampleFormControlSelect2" name="select1">
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
            <option>6</option>
            <option>7</option>
            <option>8</option>
            <option>9</option>
            <option>0</option>
        </select>
    </div>
    <div class="form-group">
        <label for="exampleFormControlSelect2">choose an operator</label>
        <select class="form-control" id="exampleFormControlSelect2" name="select2">
            <option>+</option>
            <option>-</option>
            <option>*</option>
            <option>/</option>
        </select>
    </div>
    <div class="form-group">
        <label for="exampleFormControlSelect2">choose a number</label>
        <select class="form-control" id="exampleFormControlSelect2" name="select3">
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
            <option>6</option>
            <option>7</option>
            <option>8</option>
            <option>9</option>
            <option>0</option>
        </select>
    </div>
    
    

    
        <form action="calculator.php" name="form1" method="POST"></form>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">number1</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="1"></textarea>
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">operator</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="1"></textarea>
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">number2</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="1"></textarea>
        </div>
        <div>
            <input type="submit" class="btn btn-primary" name="button1"></button>
        </div>
        </form>
    



    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>
</html>