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
        /*
        12. Create an array of marks named $arrayMarks. Fill 5 elements of the array with values 40,
50,45,60,50. Calculate the mean (average) of these 5 marks and save the answer in
variable $mean. Output the value of:
- Number of elements in array (use PHP function count())
- sum of all the values present in the array (use PHP function array_sum())
- $mean (average).
- Repeat the above exercise by using a function to calculate and output the mean –
calc($array).
        */
        function getMean($sum,$arrCount){
            return $sum/$arrCount;
        }

        $arrayMarks = array(40,50,45,60,50);
        $sumOfMarks=0;
        foreach ($arrayMarks as $value){
            $sumOfMarks+=$value;
        }
        echo "Q12) Number of elements inside Array: ".count($arrayMarks);
        echo "<br>--Sum of all the values inside Array: {$sumOfMarks}";
        echo "<br>--Mean of Array: ".getMean($sumOfMarks,count($arrayMarks));

        /*
        13. Define a variable called $age, and initialize it to any value you want.
Write a program to check whether a person may enter a club or not by checking this $age
variable. The person is allowed in only if he or she is 18 or older. Display an appropriate
message if the person is allowed, and a different message if the person is not allowed into
the club. Use an if..else statement.
Define a variable called $password, and initialize it to “ginger”.
Write a program to check whether the password is equal to “ginger”. If it is equal to
“ginger” display an appropriate and a different message if the password is not equal. 
        */
        function clubBowser($a){
            if($a <18){
                return FALSE;
            }else{
                return TRUE;
            }
        }
        $age=21;
        if(clubBowser($age)==TRUE){
            echo "<br> Q13) You are allowed inside the CLUB";
        }else{
            echo "<br> Q13) You are not allowed inside the CLUB";
        }

        function checkPassword($pass){
            if(strcmp($pass,"ginger")==0){
                return TRUE;
            }else{
                return FALSE;
            }
        }
        $password="ginger";
        if(checkPassword($password)==TRUE){
            echo "<br> Q13 b) Password is correct";
        }else{
            echo "<br> Q13 b) Password Incorrect";
        }

        /*
        14. Write a program to develop a guessing game. The program should generate a random
number between 1 and 10. If the number guessed is the number 7, the program should
display “you won!”. Else the program should display, “you lose try again”. 
        */
        function guessGame($ui){
            if($ui != 7){
                return FALSE;
            }else{
                return TRUE;
            }
        }
        $randNum = rand(1,15);
        if(guessGame($randNum)==TRUE){
            echo "<br>Q14)You WON!";
        }else if(guessGame($randNum)==FALSE){
            echo "<br>Q14)You LOST!";
        }

        /*
        15. Write a program that generates 3 random numbers. The random numbers should be in the
range of 1 to 3. The program is to simulate a slot machine. The program should display the
generated numbers. If the numbers generated are all the same, the program should
display a message indicating that the user won.
        */

        function slotMachine(){
            $slots = array();
            for($i=0;$i<3;$i++){
                array_push($slots,rand(1,3));
            }
            if($slots[0]==$slots[1] && $slots[1]==$slots[2]){
                echo "<br>";
                print_r($slots);
                return TRUE;
            }//could not include else if in this case, reason: it was going in noth if and else if
        }
        if(slotMachine()==TRUE){
            echo "<br>Q15)You WON the slot machine!";
        }else{
            echo "<br>Q15)You LOST the slot machine!";

        }
        
        /*
        16. Write a program to display the numbers from 1 to 10 using a for loop. Write another for()
loop to display the numbers from 10 down to 1.
        */
        function loopFoward(){
            $numbers = array();
            for($i=1;$i<11;$i++){
                array_push($numbers,$i);
            }
            return $numbers;
        }
        function loopBackwards(){
            $numbers = array();
            for($i=10;$i>0;$i--){
                array_push($numbers,$i);
            }
            return $numbers;
        }
        echo "<br>Q16) Displaying 1-10: ";
        $getFowardLoop=loopFoward();
        foreach($getFowardLoop as $value){
            echo "{$value}, ";
        }
        echo "<br>Q16) Displaying 10-1: ";
        $getBackwardLoop=loopBackwards();
        foreach($getBackwardLoop as $value){
            echo "{$value}, ";
        }

        /*
        17. Write a program to display all the even numbers from 1 to 50 using a for() loop. 
        */
        function displayEven($from,$end){
            $counter=$from;
            $numbers = array();
            while($counter<=$end){
                if($counter%2==0){
                    array_push($numbers,$counter);
                }
                $counter++;
            }
            return $numbers;
        }
        echo "<br>Q17) Dispalying even numbers 1 - 50: ";
        $getEvens = displayEven(1,50);
        foreach($getEvens as $value){
            echo "{$value}, ";
        }

        /*
        18. Write a php program that should create the following output. The numbers should be
incremented by the use of loops. (Use for loop,while loop and do while loop)
        */
        function whileCounter(){
            $numbers = array();
            $counter = 1;
            while($counter<=10){
                array_push($numbers,$counter);
                $counter++;
            }
            return $numbers;
        }
        function doWhileCounter(){
            $numbers = array();
            $counter = 1;
            do{
                array_push($numbers,$counter);
                $counter++;
            }while($counter <=10);
            return $numbers;
        }

        echo "<br>Q18) for loop: ";
        foreach($getFowardLoop as $value){
            echo "{$value}...";
        }
        $getWhileLoop = whileCounter();
        echo "<br>Q18) while loop: ";
        foreach($getWhileLoop as $value){
            echo "{$value}...";
        }
        $getDoWhileLoop = doWhileCounter();
        echo "<br>Q18) do while loop: ";
        foreach($getDoWhileLoop as $value){
            echo "{$value}...";
        }

        /*
        19. Write a program to display the multiplication table of 8, for the numbers 1-10. Again use a
for loop, a while loop and a do while loop.
        */
        function forLoopMultTable(){
            $getArray = loopFoward();
            $numbers = array();
            $c = count($getArray);
            for($i=0;$i<$c;$i++){
                array_push($numbers,$getArray[$i]*8);
            }
            return $numbers;
        }
        function whileLoopMultTable(){
            $getArray = loopFoward();
            $numbers = array();
            $counter = 0;
            $c = count($getArray);
            while($counter < $c){
                array_push($numbers,$getArray[$counter]*8);
                $counter++;
            }
            return $numbers;
        }
        function doWhileLoopMultTable(){
            $getArray = loopFoward();
            $numbers = array();
            $counter = 0;
            $c = count($getArray);
            do{
                array_push($numbers,$getArray[$counter]*8);
                $counter++;
            }while($counter < $c);
            return $numbers;
        }

        echo "<br>Q19) for loop (x8): ";
        $getForLoopMultTable = forLoopMultTable();
        foreach($getForLoopMultTable as $value){
            echo "{$value}, ";
        }
        echo "<br>Q19) while loop (x8): ";
        $getWhileLoopMultTable = whileLoopMultTable();
        foreach($getWhileLoopMultTable as $value){
            echo "{$value}, ";
        }
        echo "<br>Q19) do while loop (x8): ";
        $getDoWhileLoopMultTable = doWhileLoopMultTable();
        foreach($getDoWhileLoopMultTable as $value){
            echo "{$value}, ";
        }

        /*
        20. Initialize an array containing 10 elements. Place a random value in each of the 10
elements (from 1 to 10) using a for loop. By means of a for loop, display all the array
elements in the following fashion:
        */
        function generateRand($count){
            $numbers = array();
            for($i=0;$i<$count;$i++){
                $genNum = rand(1,100);
                array_push($numbers,$genNum);
            }
            return $numbers;
        }
        echo "<br>Q20) Generating 10 random numbers: ";
        $getRandNumbers = generateRand(10);
        for($i=0;$i<count($getRandNumbers);$i++){
            echo "<br>Array element {$i}. Value contained is ".$getRandNumbers[$i];
        }

        /*
        21. Write a while loop that outputs the even numbers from 6 to 20
        */
        echo "<br>Q21) Dispalying even numbers 6 - 20: ";
        $getEvens2 = displayEven(6,20);
        foreach($getEvens2 as $value){
            echo "{$value}, ";
        }
        
        /*
        22. Write a while loop that outputs the numbers from 100 to 0 by 10's
        */
        function loopBackwardsBy($from, $end, $by){
            $numbers = array();
            $c = $from;
            while($c >= $end){
                
                array_push($numbers, $c);
                $c= $c - $by;
            }
            return $numbers;
        }
        echo "<br>Q22) Displaying 100 - 0 by -10: ";
        $getloopBackwardsBy10 = loopBackwardsBy(100,0,10);
        foreach($getloopBackwardsBy10 as $value){
            echo "{$value}, ";
        }

        //Skipping 22 -24

        /*
        25. Use a for loop to develop the following output:
        */
        for($i=0;$i<6;$i++){
            echo '<p style="background-color:tomato;">'.$i.'</p>';
            $i++;
            echo '<p style="background-color:green;">'.$i.'</p>';
        }
        /*
        26. Create an infinite loop using while (true) and then use the break when (counter == 10) to
stop the loop.
        */
        $isTrue = FALSE;
        echo "<br>Q26) Dispaly 0 - counter";
        $counter = 0;
        while($isTrue == FALSE){
            if($counter <=10){
                echo "{$counter}, ";
                $counter++;
            }else{
                $isTrue=TRUE;
            }
        }

        /*
        27. Create a for loop that prints from 0 to 4 using variable $i. When $i is equal to 2 use the
command continue not to print the value (2). Hence the following output should be produced:
        */
        echo "<br>Q27) Dispalying 0-4 (!2): ";
        for($i=0;$i<=4;$i++){
            if($i!=2){
                echo "{$i}, ";
            }else{
                continue;
            }
        }

        /*
        28. Switch exercise – Create a variable $destination and assign to it a random generated number
between 1 to 10. If the number generated is 1 “Going to Las Vegas” should be displayed, if 2 is
generated “Going to Amsterdam” should be displayed, 3 – “Going to Egypt”, 4 - “Going to
Tokyo”. If a number between 5 and 10 is generated “Going nowhere” should be displayed.
        */
        function travelDestination($from,$end){
            $status = array();
            $randNum = rand($from,$end);
            switch($randNum){
                case 1:
                    array_push($status,"Going to Las Vegas");
                    break;
                case 2:
                    array_push($status,"Going to Amsterdam");
                    break;
                case 3:
                    array_push($status,"Going to Egypt");
                    break;
                case 4:
                    array_push($status,"Going to Tokyo");
                    break;
                default:
                    array_push($status, "Going nowhere");
                    break;
            }
            return $status;
        }
        echo "<br>Q28) ";
        $getDestination = travelDestination(1,10);
        foreach($getDestination as $value){
            echo "{$value}";
        }
    ?>
    
</body>
</html>


