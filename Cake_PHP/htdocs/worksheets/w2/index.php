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
            echo "<br>Q15)You WON the slot machine!<br>";
        }else{
            echo "<br>Q15)You LOST the slot machine!<br>";

        }
        

    ?>
    
</body>
</html>


