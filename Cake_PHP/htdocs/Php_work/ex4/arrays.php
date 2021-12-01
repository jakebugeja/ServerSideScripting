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
    <div class="container">
      <h1>PHP - Arrays</h1>
      <?php
        $fruits = array("apples","bananas","oranges");

        echo "I like to eat, eat, eat $fruits[0] and $fruits[1]!!!";
        echo "<hr>";
        var_dump($fruits);//debug code (shows data type)
        echo "<hr>";
        print_r($fruits);//debug code

        //$key => $value
        //Array using string to find the index of the array as an identifier
        $countries = array("mt"=>"Malta", "uk"=>"United Kingdom", "it"=>"Italy");

        //String concatination can be implmented in both ways: ({} or ..)
        echo "<hr>I live in {$countries['mt']} but i would like to visit ".$countries['uk']." this year!";
        echo "<br>";
        print_r($countries);

      echo "<h2>Superglobal Array - _SERVER</h2>";
      $user_ip = $_SERVER['REMOTE_ADDR'];
      $useragent = $_SERVER['HTTP_USER_AGENT'];

      echo "IP: $user_ip<br>User Agent: $useragent";
      ?>
    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
</html>