<!DOCTYPE html>
<!--Comments are on moodle-->
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>Server Side Scripting -- PHP</title>
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>
    <?php
        function sum ($x,$y){
            $ans = $x + $y;
            return $ans;
        }

        //function: outputDivision
        //param1:num1
        //param2:num2
        //--divide num1 by num 2 and return remainder
        function outputDivision($x,$y){
            $remainder = $x%$y;
            $front = intval($x/$y);//casting to int
            return "{$x}/{$y} = {$front} r {$remainder}";
        }
        //method 2:
        //return more than one value
        function outputDivision2($x,$y){
            $remainder = $x%$y;
            $front = intval($x/$y);//casting to int
            return array($front, $remainder, "$x/$y");
        }

        //super 5 function
        function super5(){
            $randArray = array();
            
            while(count($randNum) < 5){
                $randNum = rand(1,45);

                if(!in_array($randNum,$randArray)){
                    print("Adding: $randomNumber<br>");
                }else{
                    print("$randNum alreaDY GENERATED...<br>");
                }
            }
            
            return $randArray;
        }


        echo "Result: ".sum(10,2);
        echo "<br>".outputDivision(20,6);
        $method2Ans = outputDivision2(10,3);
        echo "<br>$method2Ans[2] = $method2Ans[0] r $method2Ans[1]";
        foreach($array()=super5()) as $num){
            print($num." ");
        }
    ?>
    
</body>
</html>


