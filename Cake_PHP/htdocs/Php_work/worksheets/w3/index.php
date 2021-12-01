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
    
    <form action="index.php" method="post">
    <div class="container">
        <div class="row">
            
            <div class="col bg-secondary text-white">
                <h5>Item</h5>
                <div class="col bg-light text-white">
                    <p>Tires</p>
                    <p>Oil</p>
                    <p>Sprark Plugs</p>
                    <p>How did you find Bob's?</p>
                </div>
            </div>
            <div class="col bg-secondary text-white">
                <h5>Quantity</h5>
                <div class="col bg-light text-white">
                    <input type="number" class="form-control" name="tire">
                    <input type="number" class="form-control" name="oil">
                    <input type="number" class="form-control" name="sp">
                    <select name="sel" class="form-select form-select-sm" aria-label=".form-select-sm example">
                        <option selected value="null">Open this select menu</option>
                        <option value="1">I'm a regular customer</option>
                        <option value="2">TV advertising</option>
                        <option value="3">Phone directory</option>
                        <option value="4">Word of mouth</option>
                    </select>
                </div>
            </div>
        </div>
        <button type="submit" name = "submit" class="btn btn-primary">Submit</button>
    </div>
        
        
    </form>
    <?php
        require_once('connection.php');

        //retrieve data from form
        if(isset($_POST['submit'])){
            $tire=$_POST['tire'];
            $oil=$_POST['oil'];
            $sp=$_POST['sp'];
            $selection=$_POST['sel'];
        
        $dateProcessed;
        $totalParts=0;
        define("tirePrice", 100);
        define("oilPrice", 10);
        define("spPrice", 4);
        $totalPrice=0;
        $totalPriceIncTax=0;

        //push to database
            if (!empty($tire) && !empty($oil)&& !empty($sp)) {
                $query = "INSERT INTO parts (tires, oil, spark_plugs, selection) VALUES ('$tire', '$oil', '$sp', '$selection')";
                mysqli_query($link,$query) or die(mysqli_error($link));
                
                //Setting up the counter
                $totalParts = $tire+$oil+$sp;
                //Setting Price
                $totalPrice = (($tire * totalPrice) + ($oil * oilPrice) + ($sp + spPrice));
                $totalPriceIncTax = (($tire * totalPrice) + ($oil * oilPrice) + ($sp + spPrice))*0.1;
            }else{
                echo "You did not order anything on the previous page!";
            }

        //Retrieve last purchase
        //SELECT TOP 1 * FROM parts ORDER BY id DESC
            $sqlGetLastPurchase = "SELECT * FROM parts ORDER BY id DESC LIMIT 1";
            //send sql command (string) to mysql server
            $result = mysqli_query($link, $sqlGetLastPurchase);

            if(mysqli_num_rows($result)>0){//if the number of retrieved rows from the server > 0
                echo " Calculating price...";
                while ($row = mysqli_fetch_assoc($result)){
                    echo "<br>Items Ordered: $totalParts";
                    echo "<br>Tires Number: $row[tires] Oil Changes: $row[oil] Spark Plugs Number: $row[spark_plugs] <br/>";
                    echo "<br>Subtotal: $totalPrice";
                    echo "<br>Total inc tax: $totalPriceIncTax";


                }
            }else{
                echo "Receipt not found...";
            }
        }
    ?>
    
</body>
</html>


