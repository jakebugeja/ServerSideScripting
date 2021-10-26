<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Intro to PHP</title>
  </head>
  <body>
    <?php
        echo 'Hello World';
        $myCountry = 'Malta';//string
        $year = 2021;//integer
        $summer = 2021;

        echo "<br>I live in $myCountry";
        echo "<br>Current year: $year";

        define ('VAT_RATE',0.18);
        $laptopPriceWithoutVAT = 100;
        $laptopVAT = VAT_RATE * $laptopPriceWithoutVAT;
        echo "The VAT on a laptop priced &euro: $laptopPriceWithoutVAT is $laptopVAT";
        //in php we use docs(.) to concentrate strings. (NOT+)
        echo "<br>Total price would be &euro:".($laptopPriceWithoutVAT+$laptopVAT);

    ?>
    <hr>
    <h2>Forms</h2>
    <div class="col-8 offset-2">
      <h3>VAT Calculator</h3>

      <?php
      //isset = check if some post data is sent
      if(isset($_POST['submit_btn'])){
        echo "The form was submitted";
        // $_POST = accessing the post data
        // $_POST is an array !
        $price = floatval($_POST['price']);//casting to float

        $priceVAT = VAT_RATE * $price;

        echo "<div class='alert alert-primary'>";
        echo "The VAT due on &euro: $price is &euro: $priceVAT";
        echo "<br>The total price would be &euro: ".($price +$priceVAT);
        echo "</div>";
      }else{//if no post data is sent 
        echo "<div class='alert alert-warning'>";
        echo "Please anter a price and press 'Calculate VAT'";
        echo "</div>";
      }
      ?>

      </hr>
      <form method="POST" action ="index.php">
        <input type="number"step="0.1" placeholder="Enter price" class="form-control" name="price"/>
        <input type="submit" value="Calculate VAT" class="btn btn-danger mt-4 w-100" name="submit_btn"/>
      </form>
    </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>