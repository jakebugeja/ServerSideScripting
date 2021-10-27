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
    <h1>
    <form action="report.php" method="post">
        
        
        
    </form>
    <?php
    //1) Develop a php page and just display Hello World
        echo "<h1>Q1) Hello<h1>";
    /*
    2) Develop a php page and:
a. Store a Boolean value in variable $foo and print the value.
b. Store an integer value in variable $age and print the value.
c. Store a float value in variable $height and print value. 
*/
        $foo = True;
        echo "Q2a) {$foo}<br>";

        $age = 21;
        echo "Q2b) {$age}<br>";

        $height = 172.72;
        echo "Q2c) {$height}<br>";

        /*
        3) Develop a php page and include an image. Code must include the following:
a. <?php echo “<p>Hello from the php compiler!</p>”; ?>
        */
        echo "Q3) Hi!<br>Hello from the php compiler!";
        echo "<img src='https://is3-ssl.mzstatic.com/image/thumb/Purple127/v4/06/d2/e2/06d2e243-7415-be5e-ee13-ee5a59bb28f1/source/256x256bb.jpg' alt='d2 submarine img'>";

        /*
        4) Create a new php script which must output the following:
Declare the following variables in your script:
$expand = 77.33;
$either = 80;
        */
        $expand = 77.33;
        $either = 80;

        echo "<br><br><br>Q4) Arnold once said ".'"'."I'll be back".'"'."<br>";
        echo "You deleted C:\*.*?<br><br>";
        echo 'Variables do not $expand $either<br>';
        echo "However when using double quotes, variables expand! {$expand}";

        /*
        5) Define 2 constants and display values stored.
        */
        define("CONST1", 250);
        define("CONST2", 1000);
        echo "<br>Q5) A:".CONST1.", B: ".CONST2;

        /*
        6) Declare 2 variables, $name (string) and $age (integer) and use them to produce the following
output:
        */
        $name = "Joe Borg";$age = 22;
        echo "<br>Q6) My name is {$name} and I am {$age} years old";
        
        /*
        7) Write code to declare and initialize two numbers, num1 and num2.
a. Display the addition of these two numbers.
b. Display the subtraction of these two numbers.
c. Display the multiplication of these two numbers.
d. Display the division of these two numbers.
        */
        $num1 = 350; $num2 = 90;
        echo "<br>Q7) Addition: ".($num1 + $num2);
        echo "<br>Subtraction: ".($num1 - $num2);
        echo "<br>Multiplication: ".($num1 * $num2);
        echo "<br>Division: ".($num1 / $num2);

        /*
        8) Store the value of 20 in variable $a. Store the value of 10 in variable $b. Store the value of $b -
$a in variable $c. Show the value of variable $c. 
        */
        $a = 20; $b = 10; $a = $b; $c = $a;
        echo "<br>Q8) {$c}";

        /*
        9) Declare a variable $name and fill it with “joseph”.
Declare a variable $surname and fill it with “borg”.
Now declare a variable called $fullname that concatenates (joins) the $name and $surname
together.
Output the $fullname including a space between the name and surname. 
        */
        $name = "Joseph";$surname = "Borg"; 
        $fullname = $name." ".$surname;
        echo "<br>Q9){$fullname}";

        /*
        10) Declare the value of PI as constant (3.142).
Declare a variable called $radius and assign it to 5.
Now calculate the area of the circle using the formula PI * Radius2 and store it in variable
$answer. Output the value of $answer. (78.55)
        */
        define("PI", 3.142);
        $radius = 5; $answer = PI * ($radius*$radius); 
        echo "<br>Q10) {$answer}";
        
        /*
        11) Write an application to convert 50 centimeters to inches. 1 inch = 2.54cm.Output should display:
50 centimeters are equal to 19.685039370079 inches
        */
        define("inchToCM", 2.54);
        $lenInCM = 50;
        $convertToInch = $lenInCM / inchToCM;
        echo "<br>Q11) {$lenInCM} centimeters are equal to {$convertToInch} inches";
    ?>
    
</body>
</html>


